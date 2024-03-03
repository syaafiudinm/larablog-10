<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    Public function welcome_page(){
        Auth()->user();
        return view('admin.welcome_page');
    }

    public function post_page(){
        Auth()->user();
        return view('admin.post_page');
    }

    public function add_post(Request $request){

        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->user_type;


        $post = new Post;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $userid;
        $post->name = $name;
        $post->usertype = $usertype;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);
    
            $post->image = $imagename;  
        }

        $post->save();

        return redirect()->back()->with('message', 'post added successfully');

        
    }

    public function show_post(){
        $post = Post::all();

        return view('admin.show_post', compact('post'));
    }

    public function delete_post(int $id){
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->back()->with('message', 'post deleted successfully');
    }

    public function edit_page(int $id){
        $post = Post::findOrFail($id);

        return view('admin.edit_page', compact('post'));
    }

    public function update_post(Request $request, int $id){
        $data = Post::findOrFail($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);
    
            $data->image = $imagename;  

            $data->save();

            return redirect()->back()->with('message', 'post updated successfully');
        }
    }
}
