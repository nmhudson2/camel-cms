<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'pages';

    protected $fillable = [
        'author',
        'name',
        'page_slug',
        'text_contents',
        'template',
        'last_edited_at'
    ];

    protected $hidden = [
        'created_at'
    ];
}
