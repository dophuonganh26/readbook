<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterViewLog extends Model
{
    use HasFactory;

    protected $table = "chapter_view_logs";
    protected $fillable = [
        'chapter_id',
    ];
}
