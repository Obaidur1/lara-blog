<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'user_id', 'blog_id'];
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    public function formatted_created_at()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
