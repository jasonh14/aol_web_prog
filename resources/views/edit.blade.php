@extends('layouts.app')
@section('content')
    <form enctype="multipart/form-data" class="p-4" action="{{ route('store.profile') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_name" class="form-label">User Name</label>
            <input name="user_name" type="text" class="form-control" id="formGroupExampleInput"
                placeholder="Example input placeholder">
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Upload Image</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>

        <button type="submit" class="btn btn-neutral">Submit</button>

    </form>
@endsection
