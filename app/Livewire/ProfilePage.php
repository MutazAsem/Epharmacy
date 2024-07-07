<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Profile - Epharmacy')]

class ProfilePage extends Component
{

    public function render()
    {
        return view('livewire.profile-page');
    }
}
