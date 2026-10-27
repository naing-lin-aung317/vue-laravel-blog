<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Blogs', [
            'blogs' => Blog::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('BlogCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $blog = new Blog;
        $blog->title = $validated['title'];
        $blog->description = $validated['description'];
        $blog->save();

        return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog): Response
    {
        return Inertia::render('BlogShow', [
            'blog' => $blog->load('user'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog): Response
    {
        return Inertia::render('BlogEdit', [
            'blog' => $blog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $blog->title = $validated['title'];
        $blog->description = $validated['description'];
        $blog->save();

        return redirect('/blogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();

        return redirect('/blogs');
    }
}
