<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
class CategoryController extends Controller
{
    public function index(){
        // view all categories in the blog
        return view ("categories.index",[
            'categories' => Category::withCount('posts')->get()]);
    }

    public function show(Category $category){

        $recent_posts = Post::latest()->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count','desc')->take(10)->get();
        $tags = Tag::latest()->take(10)->get();


        return view('categories.show' , [
            'category'=>$category,
            'posts'=>$category->posts()->paginate(10),
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
}
