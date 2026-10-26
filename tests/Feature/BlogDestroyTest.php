<?php

use App\Models\Blog;

test('a blog can be deleted', function () {
    $blog = Blog::factory()->create();

    $response = $this->post(route('blogs.destroy', $blog));

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/blogs');

    $this->assertDatabaseMissing('blogs', [
        'id' => $blog->id,
    ]);
});
