<?php

use App\Models\Blog;
use Inertia\Testing\AssertableInertia as Assert;

test('edit page is displayed for an existing blog', function () {
    $blog = Blog::factory()->create();

    $response = $this->get(route('blogs.edit', $blog));

    $response->assertOk();

    $response->assertInertia(fn (Assert $page) => $page
        ->component('BlogEdit')
        ->has('blog', fn (Assert $prop) => $prop
            ->where('id', $blog->id)
            ->where('title', $blog->title)
            ->where('description', $blog->description)
            ->etc(),
        ),
    );
});

test('a blog can be updated', function () {
    $blog = Blog::factory()->create();

    $response = $this->post(route('blogs.update', $blog), [
        'title' => 'Updated title',
        'description' => 'Updated description',
    ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/blogs');

    $blog->refresh();

    expect($blog->title)->toBe('Updated title');
    expect($blog->description)->toBe('Updated description');
});

test('a blog cannot be updated with an empty payload', function () {
    $blog = Blog::factory()->create([
        'title' => 'Original title',
        'description' => 'Original description',
    ]);

    $response = $this->from(route('blogs.edit', $blog))->post(route('blogs.update', $blog), [
        'title' => '',
        'description' => '',
    ]);

    $response
        ->assertSessionHasErrors(['title', 'description'])
        ->assertRedirect(route('blogs.edit', $blog));

    $blog->refresh();

    expect($blog->title)->toBe('Original title');
    expect($blog->description)->toBe('Original description');
});
