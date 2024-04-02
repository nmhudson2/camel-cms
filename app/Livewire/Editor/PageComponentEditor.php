<?php

namespace App\Livewire\Editor;

use App\Http\Controllers\PageController;
use Livewire\Component;

class PageComponentEditor extends Component
{
    public function render()
    {
        $controller = new PageController();
        return view('livewire.editor.page-component-editor', ['exists' => request()->exists, 'page_data' => $controller->index(request()->page_slug)]);
    }
}
