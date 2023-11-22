<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'content', 'user_id', 'featured', 'category_id', 'views'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class)->with('user')->latest();
    }
    public function humanized_created_at()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
