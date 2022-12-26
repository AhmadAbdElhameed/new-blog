<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'index'])->name("home");

Route::get('/post', function () {
    return view('post');
})->name("post");

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/about', function () {
    return view('about');
})->name("about");


require __DIR__.'/auth.php';











//****** Test Comments ******/
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Image;

// Route::get('/insert', function () {
//     // $comment = Comment::create(['the_comment' => 'FOR Swimming',
//     // 'post_id' => 2,
//     // 'user_id' => 1]);

//     // $comment = Comment::find(3);
//     // return $comment->post;
//     // $post = Post::find(1);
//     // return $post->comments;
//     $user = User::find(1);
//     return $user->comments;
// });
// Route::get('/show', function () {
//     $comment = Comment::find(3);
//     return $comment;
// });

//****** End Test Coments ******/

//******  Test Images ******/
Route::get('/createpost', function () {
    // $post = Post::create([
    //     'title' =>'This is image post',
    //     'slug'=> 'image slug',
    //     'excerpt'=> 'image excerpt',
    //     'body'=> 'image body',
    //     'user_id'=> 1,
    //     'category_id'=> Category::find(1)->id
    // ]);
    // $post -> image() -> create(['name' => 'random file',
    //                         'extension'=>'jpg',
    //                         'path'=>'/images/random_file.jpg']);


    // $user = User::find(1);
    // $user -> image() -> create(['name' => 'random file for user',
    //                         'extension'=>'jpg',
    //                         'path'=>'/images/random_file.jpg']);

    $image = Image::find(1);
    return $image -> imageable;


});

//****** End Test Images ******/



