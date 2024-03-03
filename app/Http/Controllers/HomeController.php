<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){

            $post = Post::where('post_status','=','active')->get();
            $usertype = Auth()->user()->usertype;

            if($usertype == 'user'){
                return view('home.homepage', compact('post'));
            }

            else if($usertype == 'admin'){
                return view('admin.adminhome');
            }

            else{
                return redirect()->back();
            }
            

        }
    }

    public function post(){
        return view('post');
    }

    public function homepage(){
        $post = Post::where('post_status','=','active')->get();
        return view('home.homepage', compact('post'));
    }

    public function post_details(int $id){
        $post = Post::findOrFail($id);

        return view('home.post_details', compact('post'));
    }

    public function create_post(){
        return view('home.create_post');
    }

    public function user_post(Request $request){

        $user = Auth()->user();

        $userid = $user->id;
        $username = $user->name;
        $usertype = $user->usertype;


        $post = new Post;
        
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $userid;
        $post->name = $username;
        $post->usertype = $usertype;
        $post->post_status = 'pending';

        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);
    
            $post->image = $imagename; 
        }

        $post->save();

        Alert::success('Done!', 'your Post created successfully');

        return redirect()->back();
    }

    public function my_post(){
        $user = Auth::user();

        $userid = $user->id;

        $data = Post::where('user_id','=',$userid)->get();

        return view('home.my_post', compact('data'));
    }

    public function my_post_del(int $id){
        $data = Post::findOrFail($id);

        Alert::confirmDelete('are you sure want to delete this Post?');
        $data->delete();

        return redirect()->back()->with('message', 'post deleted successfully');
    }

    public function update_mypost(int $id){
        $data = Post::findOrFail($id);

        return view('home.update_post', compact('data'));
    }

    public function update_mypost_data(Request $request, int $id){
        $data = Post::findOrFail($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);
    
            $data->image = $imagename;  

            $data->save();

            return redirect()->back()->with('message', 'your post updated successfully');
        }
    }
}
