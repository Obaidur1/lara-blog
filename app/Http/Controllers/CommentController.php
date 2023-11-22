<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

use function Pest\Laravel\json;
use function PHPUnit\Framework\assertFalse;

use Exception;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        try {
            // throw new Exception("exception for testing");
            $user_id = $request->input('user_id');
            $blog_id = $request->input('blog_id');
            $content = $request->input('content');
            Comment::create([
                'user_id' => $user_id,
                'blog_id' => $blog_id,
                'content' => $content
            ]);

            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['success' => false, "error" => $e], 500);
        }
    }
}
