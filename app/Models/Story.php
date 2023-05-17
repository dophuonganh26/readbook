<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $table = "stories";
    protected $fillable = [
        'author',
        'parent_category_id',
        'category_id',
        'image',
        'short_description',
        'status',
        'user_id',
        'reason',
        'name',
        'release',
    ];
}
