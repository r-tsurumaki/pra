<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

class UploadTweetController extends Controller
{
    public function list(){
        $list = Tweet::all();
        return view('list_tweet', compact('list'));
    }

    public function upload(Request $request){
        $request -> validate([
            "image_path" => "mimes:jpg, jpeg, png, gif",
            "text" => "required|max:255"
        ]);
        $tweet = new Tweet();

        $tweet->user_id = Auth::id();
        $tweet->text = $request->text;

        if( !empty($request -> image) ){
            $file_path = $request -> image -> store("images", "public");
            $tweet->image_path = $file_path;
        }

        /* データベースに保存 */
        $tweet->save();
        return redirect("/list_tweet");
    }

    public function complete(){
        return view("complete_tweeet");
    }

    public function edit(Request $request){
        $tweet = Tweet::find($request -> id);
        if($request -> mode == "update"){
            $tweet -> text = $request -> text;
            $tweet -> image_path = $request -> image -> store("images", "public");
            $tweet -> save();
            return redirect("list_tweet");
        }
        return view("edit_tweet", compact("tweet"));
    }

    public function delete(Request $request){
        $tweet_to_delete = Tweet::find($request->id);

        $tweet_to_delete->delete();

        return redirect('list_tweet');
    }
}
