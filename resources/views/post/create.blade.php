@extends('layouts.main') 
@section('content')
  <div>
    <form action="{{route('post.store')}}" method="post">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input 
        value="{{old('title')}}"
        type="text" class="form-control" name="title" id="title" placeholder="Title">
        @error('title')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" placeholder="Content" rows="3">{{old('content')}}</textarea>
        @error('content')
        <p class="text-danger">{{$message}}</p>
        @enderror</div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input 
        value="{{old('image')}}"
        type="text" class="form-control" name="image" id="image" placeholder="Image">
        @error('image')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group"> 
        <label for="category">Category</label>
        <select class="form-control" id="category" name="category_id">
          @foreach($categories as $category)
          <option 
            {{ old('category_id') == $category->id ? ' selected' : ''}}
            
            value="{{$category->id}}">{{$category->title}}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label for="tags" class="form-label">Tags</label>   
        <select class="form-select" id="tag" name="tags[]"multiple >
          @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->title}}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
  </div>
@endsection