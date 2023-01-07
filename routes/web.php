<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\AdminPostsController;
use App\Http\Controllers\AdminControllers\TinyMCEController;

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

Route::get('/posts/{post:slug}',[PostsController::class,'show'])->name("posts.show");
Route::post('/posts/{post:slug}',[PostsController::class,'addComment'])->name("posts.add_comment");

Route::get('/contact', [ContactController::class , 'create'])->name("contact.create");
Route::post('/contact', [ContactController::class , 'store'])->name("contact.store");

Route::get('/about', AboutController::class)->name("about");

Route::get('/categories/{category:slug}',[CategoryController::class,'show'])->name("categories.show");
Route::get('/categories',[CategoryController::class,'index'])->name("categories.index");
///  /tags/{tag:slug}  === SHOULD BE /tags/{tag:name}
Route::get('/tags/{tag:name}',[TagController::class,'show'])->name("tags.show");


// Admin Dashboard
//Route::get('/admin',[DashboardController::class,'index'])->name("admin.index");

Route::prefix('admin')->name('admin.')->middleware(['auth','isadmin'])->group(function(){

    Route::get('/',[DashboardController::class,'index'])->name("index");

    Route::resource('posts',AdminPostsController::class);
    Route::post('upload_tinymce_image',[TinyMCEController::class,'upload_tinymce_image'])->name('upload_tinymce_image');
});





require __DIR__.'/auth.php';













//****** Test Comments ******/
// use App\Models\Comment;
// use App\Models\User;
// use App\Models\Post;
// use App\Models\Category;
// use App\Models\Image;

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



