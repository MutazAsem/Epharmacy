<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('About - Epharmacy')]

class AboutPage extends Component
{
    

    public function render()
    {
        return view('livewire.about-page');
    }
}
