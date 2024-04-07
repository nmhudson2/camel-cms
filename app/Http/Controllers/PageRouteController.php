<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PageRouteController extends Controller
{
    public $theme;
    public $slug;
    public function __construct(string $slug)
    {
        $this->theme = env('ACTIVE_THEME', 'default');
        $this->slug = $slug;
    }

    public function handle()
    {
        try {
            $controller = new PageController();
        } catch (ModelNotFoundException $e) {
            return redirect()->to('homepage')->with($e->getMessage());
        }
        return $controller->index($this->slug);
    }
}


    // Todo: Offload to PageRoutController
    // TOdo: remove page class, add funcitons to PRC
    // if (!$slug) {
    //     $page = new Page('homepage');
    //     return $page->render();
    // }
    // $page = new Page($slug);
    // return $page->render();