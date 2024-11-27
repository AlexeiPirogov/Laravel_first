<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class EditController extends BaseController
{
    public function __invoke(Post $post)
    {
        $tags       = Tag::all();
        $categories = Category::all();
        return view('post.edit',compact('post', 'categories', 'tags'));
    } 
}