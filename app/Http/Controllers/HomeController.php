<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request, $category = null)
    {
        if ($category) {
            $category_id = Category::where('name', $category)->first()->id;
            $posts = Blog::with('category')->where('category_id', $category_id)->paginate(6);
        } else {
            $posts = Blog::with('category')->latest()->paginate(6);
            // $posts = DB::table('blogs')->join('categories', 'blogs.category_id', '=', 'categories.id')->get();
        }
        return view('blog.homepage', compact('posts'));
    }
}
