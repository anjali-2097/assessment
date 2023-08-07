@extends('app')
@section('content')
    <div class="container mt-5">
<form method="POST" action="{{ route('store-post') }}">
    @csrf
    {{method_field('PATCH')}}
    @include('posts.form')
</form>
</div>
@endsection