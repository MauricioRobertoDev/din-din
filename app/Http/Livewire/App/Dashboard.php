<?php

declare(strict_types=1);

namespace App\Http\Livewire\App;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.app.dashboard');
    }
}
