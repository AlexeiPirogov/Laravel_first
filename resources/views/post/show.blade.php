@extends('layouts.main') 
@section('content')
  <div>
      <div>
        {{$post->id}}. {{$post->title}}
      </div>
      <div><br>
        {{$post->content}}
      </div>
      <div>
        <a href="{{route('post.edit',$post->id)}}" class="btn btn-warning m-3">EDIT</a>
        <form action="{{route('post.delete',$post->id)}}" method="post">
          @csrf
          @method('delete')
          <input type="submit" class="btn btn-danger m-3" value="DELETE">
        </form> 
      </div>
      <div>
        <a href="{{route('post.index')}}" class="btn btn-primary mt-3">BACK</a>
      </div>
  </div>
@endsection