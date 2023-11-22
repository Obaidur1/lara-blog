<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogView;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Pest\Arch\Objects\FunctionDescription;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $blogs = Blog::all();
        return view('blog.blogs', compact('blogs'));
    }
    public function show($slug)
    {
        $post = Blog::with(['user', 'category', 'comment',])->where('slug', $slug)->first();
        $cookie_name = 'Blog_' . $post->id;
        if (Cookie::get($cookie_name) == '') {
            Cookie::queue($cookie_name, '1', 360);
            $post->increment('views');
        }
        $related_posts = Blog::where('category_id', $post->category_id)->where('id', '!=', $post->id)->limit(3)->get();
        $latest_posts = Blog::latest()->limit(6)->get();
        return view('blog.post_details', compact('post', 'related_posts', 'latest_posts'));
    }
    public function create()
    {
        return view('blog.create_post');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'content' => 'required',
            'featured' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);
        $user = Auth::user();
        $image_name = Str::uuid()->toString() . '.' . $request->file('featured')->extension();
        $image_path = $request->file('featured')->storeAs('images', $image_name, 'public');
        Blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'slug' => Str::slug($request->input('slug')),
            'user_id' => $user->id,
            'featured' => $image_path,
            'category_id' => $request->input('category_id')

        ]);
        return redirect()->route('dashboard');
    }
    public function edit(Request $request, $id)
    {
        $post = Blog::find($id);
        if (!$post) {
            return abort(404);
        }
        if ($request->user()->id != $post->user_id) {
            return abort(403, 'Damn son its not your post!');
        }
        $categories = Category::all();
        return view('blog.edit_post', compact('post', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $post = Blog::find($id);
        if ($request->user()->id == $post->user_id) {
            $post->update([
                'title' => $request->input('title'),
                'slug' => $request->input('slug'),
                'content' => $request->input('content'),
                'category_id' => $request->input('category_id')
            ]);
            if ($request->hasFile('featured')) {
                $image_name = Str::uuid()->toString() . '.' . $request->file('featured')->extension();
                $image_path = $request->file('featured')->storeAs('images', $image_name, 'public');

                if ($post->featured) {
                    Storage::disk('public')->delete($post->featured);
                }
                $post->update(['featured' => $image_path]);
            }
        } else {
            return abort(403, 'Hehe you are not lucky bro!');
        }
        return redirect()->route('dashboard');
    }
    public function destroy(Request $request, $id)
    {
        $post = Blog::find($id);
        if (!$post) {
            return abort(404);
        }
        if ($request->user()->id != $post->user_id) {
            return abort(403, 'Why bro? Be a good person');
        }
        if ($post->featured) {
            Storage::disk('public')->delete($post->featured);
        }
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Post deleted Successfully');
    }
}
