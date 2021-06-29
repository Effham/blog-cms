<x-admin-master>
    @section('content')
        <h1>Create A Post</h1>
        <form method="POST" action="{{route('post.store')}}"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input  type="text"
                    class="form-contol"
                    name="title"
                    id="title"
                    placeholder="Enter Title"
            >
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input  type="file"
                    class="form-contol-file"
                    name="post_image"
                    id="post_image"
            >
        </div>
        <div class="form-group">
            <textarea name="body" id="body" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>
