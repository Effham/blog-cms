<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Session;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function show(Post $post)

    {
        return view('blog-post',compact('post'));
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store()
    {
        $inputs = request()->validate
        (
            [
                'title'=>'required|min:8|max:255',
                'post_image'=>'mimes:jpeg,jpg,png,gif|required|max:10000',
                'body'=>'required'
            ]
        );
        if(request('post_image'))
        {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);
        session()->flash('post-created-message',$inputs['title'].'was created');
        return redirect()->route('post.index');
    }
    public function index()
    {
        $posts = auth()->user()->posts()->paginate(1);
        return view('admin.posts.index',compact('posts'));
    }
    public function edit(Post $post)
    {
        $this->authorize('view',$post);
        return view('admin.posts.edit',compact('post'));
    }
    public function update(Post $post)
    {
        $inputs = request()->validate
        (
            [
                'title'=>'required|min:8|max:255',
                'post_image'=>'file',
                'body'=>'required'
            ]
        );
        if(request('post_image'))
        {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        $this->authorize('update',$post);
        $post->save();
        session()->flash('post-updated-message',$post->title .'was UPDATED');
        return redirect()->route('post.index');
    }
    public function destroy(Post $post , Request $request)
    {
        $this->authorize('delete',$post);
        $post->delete();
        $request->session()->flash('message', $post->title .' was deleted');
        return back();
    }
}
