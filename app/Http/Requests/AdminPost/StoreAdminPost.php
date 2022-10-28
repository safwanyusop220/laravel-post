<?php

namespace App\Http\Requests\AdminPost;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdminPost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'     => 'required',
            'thumbnail' => 'nullable|file',
            'slug'      => 'required|unique:posts,slug',
            'excerpt'   => 'required',
            'body'      => 'required',
            'category_id' => 'required|exists:categories,id'
//            'category_id'=> ['required', Rule::exists('categories', 'id')]
        ];
    }
}
