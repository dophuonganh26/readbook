<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookieUserChapter extends Model
{
    use HasFactory;

    protected $table = 'cookie_user_chapter';

    protected $fillable = [
        'user_token',
        'chapter_id',
        'story_id',
    ];
}
