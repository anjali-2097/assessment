@extends('app')
@section('content')
<main class="posts-form mt-5">
    <div class="cotainer">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            @auth
            <a href="{{route('create-post')}}" class="btn btn-secondary btn"> Add Post </a>
            @endauth
        </div>
        <table id="example" class="table table-striped mx-auto" style="width:100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @isset ($posts)
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->created_at}}</td>
                    
                    <td class="d-flex"><a href="{{route('view-post',$post->id)}}" class="btn btn-btn btn-primary btn active mr-3">View</a>
                        @auth
                        @if($post->user_id==auth()->user()->id)
                        <form method="POST" action="/delete-post/{{$post->id}}">
                            @csrf
                            @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn active mr-3" role="button" aria-pressed="true">Delete</button>
                    @endauth
                </td>
               
                </form>
                @endif
                </tr>
                @endforeach                  
              @endisset
                @empty($posts)
                <tr class="border-gray-300">
                    <td>
                    No Posts Found                      
                    </td>               
                </tr> 
                @endempty
            </tbody>
           
        </table>
    </div>
</main>
@endsection