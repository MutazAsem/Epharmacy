<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Bill - Epharmacy')]

class BillPage extends Component
{

    public function render()
    {
        return view('livewire.bill-page');
    }
}
