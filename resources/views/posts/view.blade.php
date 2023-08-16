@extends('app')
@section('content')
<main class="posts-form mt-5">
    <div class="cotainer">
        <div class="card text-center">
            <div class="card-header">
              Posted By: @auth @if(auth()->user()->name==$post->username) You @else {{$post->username}} @endif @endauth @guest {{$post->username}} @endguest
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->description}}</p>
              <a href="{{route('manage-post')}}" class="btn btn-primary">Go Back</a>
            </div>
            <div class="card-footer text-muted">
                {{$post->created_at}}
            </div>
          </div>
    </div>
</main>
@endsection