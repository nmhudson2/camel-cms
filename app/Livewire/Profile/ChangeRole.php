<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;

class ChangeRole extends Component
{
    public User $user;

    public $role = '';

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function updateRole()
    {
        $this->user->update($this->only(['role']));
        session()->flash('Role Changed', 'Your role has been updated');

        return redirect()->to('dashboard');
    }

    public function render()
    {
        return view('livewire.profile.change-role');
    }
}
