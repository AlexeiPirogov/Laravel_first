<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <title>Laravel.project</title>
</head>
<body>
    <div    class = "container">
    <div    class = "row">
    <nav    class = "navbar navbar-expand-lg bg-body-tertiary">
    <div    class = "container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{route('main.index')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('post.index')}}">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('about.index')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact.index')}}">Contact</a>
        </li>

        @can('view', auth()->user())
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.post.index')}}">Admin</a>
        </li>
        @endcan
      </ul>
    </div>
    </div>
    </nav>
    </div>
        @yield('content')
    </div>

</body>
</html>