@extends('app')
@section('content')
    <div class="container mt-5">
<form method="POST" action="{{ route('store-post') }}">
    @csrf
    @include('posts.form')
</form>
</div>
@endsection