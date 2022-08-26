<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadTweetController extends Controller
{
/*  public function upload(Request $request){
        $request->validate([
            'image' => 'required|max:1024|mimes:jpg,jpeg,png,gif'
        ]);
        $file_path = $request->image->store('images', 'public');
        print("<img src='". asset("$file_path"). "' width='300'>");
        print("<a href='upload_form'>画像投稿フォームに戻る</a>");
    }*/

    public function list(){
        //$upload_images = ::all();
        return view('list_tweet');
    }

    public function upload(){
        return view("upload_tweet");
    }

    public function complete(){
        return view("complete_tweeet");
    }

    public function edit(){
        return view("edit_tweet");
    }

    public function delete(){
        return view("delete_tweet");
    }
}




