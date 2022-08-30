<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UploadTweetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//下記urlは後で消す
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


//tweet関係のurl
Route::get("/list_tweet", [UploadTweetController::class, "list"])->middleware(["auth"])->name("list");

Route::get('/upload_tweet', function(){
    return view("upload_tweet");
})->middleware(["auth"])->name("upload");

Route::post('/upload_tweet', [UploadTweetController::class, "upload"])->middleware(["auth"])->name("upload");

Route::post("/complete_tweet", [UploadTweetController::class, "complete"])->middleware(["auth"]);

Route::post("/edit_tweet", [UploadTweetController::class, "edit"])->middleware(["auth"]);

Route::post("/delete_tweet", [UploadTweetController::class, "delete"])->middleware(["auth"]);

Route::post("/good_tweet", [UploadTweetController::class, "good"])->middleware(["auth"]);

require __DIR__.'/auth.php';
