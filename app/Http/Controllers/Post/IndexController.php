<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;
 
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        // $posts = Post::all();
        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);
     
        if ($request->is('api/*')){
            return PostResource::collection($posts);
        }
        return view('post.index', compact('posts'));
    }    
}