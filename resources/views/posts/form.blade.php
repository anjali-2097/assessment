<div class="form-group mb-3">
    <input type="text" placeholder="Title" id="title" class="form-control" name="title" value="@if(isset($post->title)){{$post->title}}@endif"
        autofocus>
    @if ($errors->has('title'))
    <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
</div>
<div class="form-group mb-3">
    <textarea placeholder="Description" id="description" class="form-control" name="description">@if(isset($post->description)){{$post->description}}@endif</textarea>
    @if ($errors->has('description'))
    <span class="text-danger">{{ $errors->first('description') }}</span>
    @endif
</div>

<div class="d-grid mx-auto mb-3">
    <button type="submit" class="btn btn-dark btn-block">{{isset($post)?'Edit':'Add'}} Post</button>
</div>
<div class="d-grid mx-auto text-center">
    <a class="" href="{{ route('manage-post') }}">Back</a>
</div>