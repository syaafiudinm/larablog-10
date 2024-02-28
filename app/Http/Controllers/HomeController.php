<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            
            $usertype = Auth()->user()->usertype;

            if($usertype == 'user'){
                $post = Post::all();
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
        $post = Post::all();
        return view('home.homepage', compact('post'));
    }
}
