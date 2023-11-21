@extends("layouts.app")
@section('content')
<form enctype="multipart/form-data" class="p-4" action="{{ route("processUpload") }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="chatbot_name" class="form-label">Chatbot Name</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
    </div>
    <div class="mb-3">
        <label for="image_url" class="form-label">Image</label>
        <input class="form-control" type="file" id="formFile">
      </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
        <label for="chatbot_description">Chatbot Description</label>
    </div>
    <div class="mb-3">
        <label for="chatbot_webhook_url" class="form-label">Webhook URL</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
        <p class="text-red-400">*this is the url where we listen to your bot responses</p>
    </div>
    <div class="mb-3">
        <label for="req_url" class="form-label">Req URL</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
        <p class="text-red-400">*this is the url where we sent request to your bot </p>
    </div>
    <button type="submit" class="btn btn-neutral">Submit</button>

</form>
@endsection



