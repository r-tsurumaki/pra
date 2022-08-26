<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadTweetController extends Controller
{
    /*public function upload(Request $request)
{
$request->validate([
'image' => 'required|max:1024|mimes:jpg,jpeg,png,gif'
]);
$file_path = $request->image->store('images', 'public');
print("<img src='". asset("$file_path"). "' width='300'>");
print("<a href='upload_form'>画像投稿フォームに戻る</a>");
}*/
public function index()
{
//$upload_images = ::all();
return view('list_tweet');
}
}




