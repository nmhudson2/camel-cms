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

    /**
     * Handles route generations or homepage redirection.
     * 
     * @return mixed|\redirect 
     */
    public function handle()
    {
        try {
            $controller = new PageController();
            return  $controller->generate($this->slug);
        } catch (ModelNotFoundException $e) {
            return redirect()->to(url("/"))->with($e->getMessage());
        }
    }
}
