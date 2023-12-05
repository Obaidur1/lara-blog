<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index()
    {
        $user_count = DB::table('users')->where('user_role', 'user')->count();
        $post_count = DB::table('blogs')->count();
        $author_count = DB::table('users')->where('user_role', 'author')->count();
        $view_count = DB::table('blogs')->sum('views');
        return view('admin.overview', compact('user_count', 'post_count', 'author_count', 'view_count'));
    }
    function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    function blogs()
    {
        $blogs = Blog::with('user', 'category')->get();
        return view('admin.blogs', compact('blogs'));
    }
}
