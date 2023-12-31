<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

// Requests
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;

// Helpers
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $formData = $request->validated();

        $coverImagePath = null;
        if (isset($formData['cover_img'])) {
            $coverImagePath = Storage::put('uploads/images', $formData['cover_img']);
        }

        $post = Post::create([
            'title' => $formData['title'],
            'slug' => str()->slug($formData['title']),
            'content' => $formData['content'],
            'category_id' => $formData['category_id'],
            'cover_img' => $coverImagePath
        ]);

        if (isset($formData['tags'])) {
            foreach ($formData['tags'] as $tagId) {
                                                //  post_id  |  tag_id
                                                // ----------+---------
                $post->tags()->attach($tagId);  // $post->id |  $tagId
            }
        }

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $formData = $request->validated();

        $coverImagePath = $post->cover_img;
        if (isset($formData['cover_img'])) {
            if ($post->cover_img) {
                Storage::delete($post->cover_img);
            }

            $coverImagePath = Storage::put('uploads/images', $formData['cover_img']);
        }
        else if (isset($formData['remove_cover_img'])) {
            if ($post->cover_img) {
                Storage::delete($post->cover_img);
            }

            $coverImagePath = null;
        }

        $post->update([
            'title' => $formData['title'],
            'slug' => str()->slug($formData['title']),
            'content' => $formData['content'],
            'category_id' => $formData['category_id'],
            'cover_img' => $coverImagePath,
        ]);

        if (isset($formData['tags'])) {
            $post->tags()->sync($formData['tags']);
        }
        else {
            $post->tags()->detach();
        }

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->cover_img) {
            Storage::delete($post->cover_img);
        }

        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
