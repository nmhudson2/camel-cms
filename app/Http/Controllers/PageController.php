<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function store()
    {
        //write pages here
    }
    public function index()
    {
        return Page::select(['name', 'page_slug', 'text_contents', 'template', 'author'])->get()->toArray();
    }
}
