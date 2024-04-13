<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageResource;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

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
            'name' => e($request->name),
            'author' => auth()->user()->name,
        ]);
    }

    public function index(?string $slug)
    {
        return Page::select('name', 'author', 'page_slug', 'text_contents')->where('page_slug', $slug)->get()->toArray();
    }

    public function generate(?string $slug)
    {
        $resource = new PageResource(Page::findOrFail($slug));
        if (View::exists('index')) {
            return view('index', ['page_meta' => [
                'name' => $resource['name'],
                'author' => $resource['author'],
            ], 'content' => json_decode($resource['text_contents'], true)]);
        }
        $GLOBALS['page'] = ['page_meta' => [
            'name' => $resource['name'],
            'author' => $resource['author'],
        ], 'content' => json_decode($resource['text_contents'], true)];

        return require public_path('includes/themes/' . env('ACTIVE_THEME') . '/index.php');
    }

    public function getAllPages()
    {
        return Page::select(['name', 'page_slug', 'text_contents', 'author', 'created_at'])->paginate(25);
    }

    public function checkSlug(Request $request)
    {
        return $request;
    }

    public function deletePage(string $slug)
    {
        Page::select()->where('page_slug', $slug)->delete();
    }
}
