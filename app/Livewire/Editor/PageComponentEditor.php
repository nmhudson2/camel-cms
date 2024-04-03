<?php

namespace App\Livewire\Editor;

use App\Http\Controllers\PageController;
use Livewire\Component;

class PageComponentEditor extends Component
{
    public function render()
    {
        $controller = new PageController();
        if (request()->exists == 'true') {
            $page_data = $controller->index(request()->page_slug)[0];
            $text_contents = json_decode($page_data['text_contents'], true);
            return view('livewire.editor.page-component-editor', ['exists' => request()->exists, 'page_data' => $page_data, 'text_contents' => $text_contents]);
        } else {
            return view('livewire.editor.page-component-editor', ['exists' => request()->exists]);
        }
    }
}