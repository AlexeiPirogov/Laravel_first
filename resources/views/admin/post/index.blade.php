@extends('layouts.admin')

@section('content')
<div>
    <div>
      <a href="{{route('admin.post.create')}}" class="btn m-3 btn-secondary">Add one</a>
    </div>
    @foreach($posts as $post)
      <div>
        <a href="{{route('admin.post.show', $post->id)}}">
          {{$post->id}}. {{$post->title}}
        </a>
      </div>
    @endforeach
    <div>
      {{$posts->withQueryString()->links()}}
    </div>
</div>
@endsection 