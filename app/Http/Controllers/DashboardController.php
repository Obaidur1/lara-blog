<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = $user->blogs()->latest()->paginate(6);
        return view('dashboard', compact('posts'));
    }
}
