<?php

namespace App\Livewire\Editor;

use App\Http\Controllers\PageController;
use Livewire\Component;

class Toolbar extends Component
{
    public function render()
    {
        $Controller = new PageController;

        return view('livewire.editor.toolbar', ['page_meta' => $Controller->index('')]);
    }
}
