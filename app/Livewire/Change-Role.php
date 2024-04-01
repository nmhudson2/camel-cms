<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class ChangeRole extends Component
{

    public function updateRole()
    {
        return User::update(['role']);
    }
    public function render()
    {
        return view('livewire.profile.change-role');
    }

}
