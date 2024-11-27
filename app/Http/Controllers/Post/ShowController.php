<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(FilterRequest $request, Post $post)
    {
        if ($request->is('api/*')){
            return new PostResource($post);
        }
        return view('post.show',compact('post'));
    }  
}