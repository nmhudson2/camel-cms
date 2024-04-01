<?php

namespace App\Livewire\Dashboard;

use App\Http\Controllers\PageController;
use Livewire\Component;

class PageTable extends Component
{
    public function render()
    {
        $Controller = new PageController;
        return view('livewire.dashboard.page-table', ['pages' => $Controller->index()]);
    }
}
