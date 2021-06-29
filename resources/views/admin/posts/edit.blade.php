<x-admin-master>
    @section('content')
        <h1>Edit A Post</h1>
        <form method="POST" action="{{route('post.update',$post->id)}}"  enctype="multipart/form-data">
        @csrf
        <h1>Edit A Post</h1>
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title</label>
            <input  type="text"
                    class="form-contol"
                    name="title"
                    id="title"
                    placeholder="Enter Title"
                    value="{{$post->title}}"
            >
        </div>
        <div class="form-group">
            <div><img height="100px" src="{{$post->post_image}}" alt=""></div>
            <label for="file">File</label>
            <input  type="file"
                    class="form-contol-file"
                    name="post_image"
                    id="post_image"

            >
        </div>
        <div class="form-group">
            <textarea name="body" id="body" cols="30" rows="10" >value="{{$post->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-admin-master>
