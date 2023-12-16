@extends("layouts.app")
@section('content')
<form enctype="multipart/form-data" class="p-4" action="{{ route("processUpload") }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="chatbot_name" class="form-label">Chatbot Name</label>
        <input name="chatbot_name" type="text" class="form-control" id="formGroupExampleInput" placeholder="The name of the chatbot">
    </div>
    <div class="mb-3">
        <label for="image_url" class="form-label">Image</label>
        <input class="form-control" type="file" id="formFile" name="image">
      </div>
    <div class="form-floating mb-3">
        <textarea name="chatbot_description" class="form-control" placeholder="Describe the bot briefly" id="floatingTextarea"></textarea>
        <label for="chatbot_description">Chatbot Description</label>
    </div>
    <div class="mb-3">
        <label for="chatbot_webhook_url" class="form-label">Webhook URL</label>
        <input name="chatbot_webhook_url" type="text" class="form-control" id="formGroupExampleInput2" placeholder="The endpoint where your bot will receive messages">
        <p class="text-red-400">*this is the url where we send messages to your bot</p>
    </div>
    <div class="mb-3">
        <label for="req_url" class="form-label">Origin Domain</label>
        <input name="req_url" type="text" class="form-control" id="formGroupExampleInput2" placeholder="The origin domain, the domain of your bot which its requests originate from">
        <p class="text-red-400">*this is the domain where your bot requests originate from</p>
    </div>
    <button type="submit" class="btn btn-neutral">Submit</button>

</form>
@endsection



