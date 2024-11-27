@extends('layouts.admin') 

@section('content')
<div>
    <form action="{{route('admin.post.update', compact('post'))}}" method="post">
      @csrf
      @method('patch')
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{$post->title}}">
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" placeholder="Content" rows="3">{{$post->content}}</textarea>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="{{$post->image}}">
      </div>
      <div>
        <label for="category" class="form-label">Category</label>
        <select class="form-control" id="category" name="category_id">
          @foreach ($categories as $category)
          <option 
            {{$category->id === $post->category_id ? 'selected' : ''}}
            value="{{$category->id}}">{{$category->title}}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label for="tags" class="form-label">Tags</label>   
        <select class="form-select" id="tag" name="tags[]"multiple >
          @foreach ($tags as $tag)
            <option 
              @foreach($post->tags as $postTag)
              {{$tag->id === $postTag->id ? 'selected' : ''}}              
              @endforeach
            value="{{$tag->id}}">{{$tag->title}}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
@endsection