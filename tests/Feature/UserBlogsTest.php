<?php

use App\Models\Blog;
use App\Models\Nrc;
use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;

test('a user blog page includes the loaded nrc', function () {
    $user = User::factory()->create();

    Nrc::factory()->for($user)->create([
        'township' => 'Yangon',
        'number' => '123456',
    ]);

    $blog = Blog::factory()->for($user)->create();

    $response = $this->get(route('users.blogs', $user));

    $response->assertOk();

    $response->assertInertia(fn (Assert $page) => $page
        ->component('Blogs')
        ->has('user', fn (Assert $prop) => $prop
            ->where('id', $user->id)
            ->where('name', $user->name)
            ->has('nrc', fn (Assert $nrc) => $nrc
                ->where('township', 'Yangon')
                ->where('number', '123456')
                ->etc())
            ->etc())
        ->has('blogs', 1)
        ->where('blogs.0.id', $blog->id),
    );
});

test('the blog index is displayed without a user', function () {
    Blog::factory()->create();

    $response = $this->get(route('blogs'));

    $response->assertOk();

    $response->assertInertia(fn (Assert $page) => $page
        ->component('Blogs')
        ->missing('user')
        ->has('blogs', 1),
    );
});
