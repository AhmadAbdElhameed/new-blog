<?php

use Illuminate\Support\Facades\Route;

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


//****** Test Comments ******/
// use App\Models\Comment;
// use App\Models\User;
// use App\Models\Post;

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


Route::get('/', function () {
    return view('home');
})->name("home");

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
