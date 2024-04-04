<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class SiteSettings extends Component
{
    public $templates = [];
    public function getAllTemplates()
    {
        $templates = array_diff(scandir(app()->environmentPath() . '/includes/themes', SCANDIR_SORT_DESCENDING), ['.', '..']);
        $this->templates = $templates;
    }

    public function render()
    {
        $this->getAllTemplates();
        return view('livewire.dashboard.site-settings', ['templates' => $this->templates]);
    }
}