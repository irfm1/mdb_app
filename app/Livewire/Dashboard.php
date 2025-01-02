<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    //check if user has a perfil
    public function mount()
    {
        if (Auth::check() && !Auth::user()->perfil) {
            return redirect()->route('register')->with('error', 'Você precisa criar um perfil antes de acessar esta página.');
        }
    }

    public $tab = 'home'; // Aba ativa por padrão

    public function switchTab($tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {

        return view('livewire.dashboard');
    }
}
