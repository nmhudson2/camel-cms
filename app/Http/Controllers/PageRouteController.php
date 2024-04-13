<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

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
            return  $controller->generate($this->slug);
        } catch (ModelNotFoundException $e) {
            return redirect()->to('homepage')->with($e->getMessage());
        }
    }
}
