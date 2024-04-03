<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'pages';

    protected $primaryKey = 'page_slug';
    public $incrementing = false;

    protected $fillable = [
        'author',
        'name',
        'page_slug',
        'text_contents',
        'last_edited_at'
    ];
}