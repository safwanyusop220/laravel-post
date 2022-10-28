<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
//        DB::listen(function ($query){
//            logger($query->sql, $query->bindings);
//        });

//        $this->authorize('admin');
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString(),
            'categories' => Category::all()
        ]);
    }
//    public function show(Post $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }

    public function addComment()
    {

    }

    protected function getPosts()
    {
        return Post::latest()->filter()->get();
    }

}
