<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageResource;
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
        Page::updateOrCreate([
            'page_slug' => $this->cleanSlugs($request->page_slug),
        ], [
            'text_contents' => json_encode($request->text_contents),
            'name' => $request->name,
            'author' => auth()->user()->name,
        ]);
    }

    public function index(string|null $slug)
    {
        $resource = new PageResource(Page::findOrFail($slug));
        return view('index', ['page_meta' => [
            'name' => $resource['name'],
            'author' => $resource['author'],
        ], 'content' => json_decode($resource['text_contents'], true)]);
    }
    public function getAllPages()
    {
        return Page::select(['name', 'page_slug', 'text_contents', 'author', 'created_at'])->paginate(25);
    }
    public function checkSlug(Request $request)
    {
        return $request;
    }
}
