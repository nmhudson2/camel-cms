<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function store(Request $request)
    {
        Page::create([
            'page_slug' => $request->page_slug,
            'text_contents' => json_encode($request->text_contents),
            'template' => $request->template,
            'name' => $request->name,
            'last_edited_at' => Carbon::now(),
            'author' => auth()->user()->name,
        ]);
    }
    public function index(string $slug)
    {
        return Page::select(['name', 'page_slug', 'text_contents', 'template', 'author'])->where('page_slug', $slug)->get()->toArray();
    }
    public function checkSlug(Request $request)
    {
        return $request;
    }
}
