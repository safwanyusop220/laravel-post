<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPost\StoreAdminPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
           'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreAdminPost $request)
    {
        $post              = new Post();
        $post->user_id     = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->slug        = $request->slug;
        $post->title       = $request->title;
        $post->thumbnail   = request()->file('thumbnail')->store('thumbnails');
        $post->excerpt     = $request->excerpt;
        $post->body        = $request->body;
        $post->save();

        return redirect()->route('post.index')->with('success', __('Post successfully created.'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }



    public function update(Request $request, Post $post)
    {
        $attributes = $this->validatePost($post);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);
        return redirect()->back()->with('success','Post updated successfully!');


    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Delete!');
    }

    /**
     * @param Post $post
     * @return array
     */
    public function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
         return request()->validate([
            'title'      => 'required',
             'thumbnail' => ['nullable', 'file'],
            'slug'       => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt'    => 'required',
            'body'       => 'required',
//            'category_id'=> ['required', Rule::exists('categories', 'id')]
        ]);

    }

}
