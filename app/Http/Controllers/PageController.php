<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function cleanSlugs(string $slug)
    {
        $slug = str_replace('/', '', $slug);
        $slug = str_replace(',', '', $slug);
        $slug = str_replace('.', '', $slug);
        $slug = str_replace(' ', '-', $slug);
        e($slug);
        return $slug;
    }
    public function store(Request $request)
    {
        Page::create([
            'page_slug' => $this->cleanSlugs($request->page_slug),
            'text_contents' => json_encode($request->text_contents),
            'name' => $request->name,
            'author' => auth()->user()->name,
        ]);
    }
    public function index(string|null $slug)
    {
        return Page::select(['name', 'page_slug', 'text_contents',  'author'])->where('page_slug', $slug)->get()->toArray();
    }
    public function getAllPages()
    {
        return Page::select(['name', 'page_slug', 'text_contents', 'author', 'created_at'])->get()->toArray();
    }
    public function checkSlug(Request $request)
    {
        return $request;
    }
}
