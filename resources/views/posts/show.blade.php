@extends('app')
@section('content')
<main class="posts-form mt-5">
    <div class="cotainer">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <a href="{{route('create-post')}}" class="btn btn-secondary btn"> Add Post </a>
        </div>
        <table id="example" class="table table-striped mx-auto" style="width:100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @unless ($posts->isEmpty())
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->created_at}}</td>
                </tr>
                @endforeach  
                @else
                <tr class="border-gray-300">
                  <td
                      class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                  >
                  No Listings Found                      
                  </td>               
              </tr>
              @endunless
                
            </tbody>
           
        </table>
    </div>
</main>
@endsection