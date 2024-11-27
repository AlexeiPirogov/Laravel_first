<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));

        // $category = Category::find(1);
        // $tag = Tag::find(3);
        // dd($tag->posts);
        
        // $posts = Post::where('is_published', 0)->get();
        // $post = Post::where('is_published', 1)->first();
        // dump($posts);  
        // foreach ($posts as $post)
        // {
        //     dump($post->title);
        // }
        // dd($post);
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('categories', 'tags'));
        /* $postsArr = [
            [
                'title'=>'Title of new created post',
                'content'=>'some interesting content',
                'image'=>'imageble.img',
                'likes'=> 152,
                'is_published'=>1,
            ],
            [
                'title'=>'another Title of new created post',
                'content'=>'another some interesting content',
                'image'=>'another imageble.img',
                'likes'=> 15,
                'is_published'=>1,
            ],
            [
                'title'=>'Lorem title of new created post',
                'content'=>'Lorem another some interesting content',
                'image'=>'Lorem another imageble.img',
                'likes'=> 150,
                'is_published'=>0,
            ],
            [
                'title'=>'new created post',
                'content'=>' interesting content',
                'image'=>'imageble.img',
                'likes'=> 10,
                'is_published'=>0,
            ]
        ];
        Post::create([
            'title'=>'another Title of new created post',
            'content'=>'another some interesting content',
            'image'=>'another imageble.img',
            'likes'=> 15,
            'is_published'=>1,
        ]);
        $i=0;
        foreach($postsArr as $post)
        {
            Post::create($post);
            dump($i);$i++;
        }
           dd('created');*/
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        // dump($tags);
        // dd($data);
        $post = Post::create($data);
        
        $post->tags()->attach($tags);
        
        // foreach ($tags as $tag){
        //     PostTag::firstOrCreate([
        //         'tag_id' => $tag,
        //         'post_id' => $post->id,
        //     ]);
        // }
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.edit',compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show',$post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function restor()
    {
        $post = Post::withTrashed()->find(7);
        $post->restore();
        dd('restored');
    }

    public function firstOrCreate()
    {
        $anotherPost = [
            'title'=>'some Title of new created post',
            'content'=>'some some interesting content',
            'image'=>'some imageble.img',
            'likes'=> 15000,
            'is_published'=>1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'another Title of new created post'
        ],$anotherPost);
        dump($post->title,$post->content);
        dd('finished');
    }
    
    public function updateOrCreate()
    {
        $anotherPost = [
            'title'=>'another Title of new created post',
            'content'=>'another interesting content',
            'image'=>'another imageble.img',
            'likes'=> 1500,
            'is_published'=>0,
        ];
        $post = Post::updateOrCreate([
            'title' => 'another Title of new created post'
        ],$anotherPost);
        dump($post->title,$post->content);
        dd('finished updateOrCreate');}
}
