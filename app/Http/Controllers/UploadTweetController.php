<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tweet;
use App\Models\Good;
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
            "text" => "required"
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

    public function edit(Request $request){
        $tweet = Tweet::find($request -> id);
        if($request -> mode == "update"){
            $request -> validate([
                "image_path" => "mimes:jpg, jpeg, png, gif",
            ]);
            $tweet -> text = $request -> text;
            if( !is_null($request->image_path) ){
                $tweet -> image_path = $request -> image_path -> store("images", "public");
            }
            $tweet -> save();
            return redirect("/list_tweet");
        }


        if( Auth::id() == $tweet->user_id ){
            return view("edit_tweet", compact("tweet"));
        }

        return redirect("/list_tweet");
    }

    public function delete(Request $request){
        $tweet = Tweet::find($request -> id);
        if( Auth::id() == $tweet->user_id ){
            $tweet_to_delete = Tweet::find($request->id);
            $tweet_to_delete->delete();
        }

        return redirect('/list_tweet');
    }

    public function good(Request $request){
        $good_check = Good::where("tweet_id", "=", $request->tweet_id)->where("user_id", "=", Auth::id())->first();
        if( is_null($good_check) ){
            $new_good = new Good();
            $new_good -> tweet_id = $request -> tweet_id;
            $new_good -> user_id = Auth::id();
            $new_good -> check = True;
            $new_good -> save();

            $tweet_good = Tweet::find($request->tweet_id);
            $tweet_good -> good += 1;
            $tweet_good -> save();
        }else if($good_check -> check == True){
            $good_check -> check = False;
            $good_check -> save();

            $tweet_good = Tweet::find($request->tweet_id);
            $tweet_good -> good -= 1;
            $tweet_good -> save();
        }else{
            $good_check -> check = True;
            $good_check -> save();

            $tweet_good = Tweet::find($request->tweet_id);
            $tweet_good -> good += 1;
            $tweet_good -> save();
        }

        return redirect("/list_tweet");
    }
}
