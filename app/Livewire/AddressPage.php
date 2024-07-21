<?php

namespace App\Livewire;

use App\Enums\CityEnum;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Address - Epharmacy')]

class AddressPage extends Component
{
    use LivewireAlert;

    public $name;
    public $description;
    public $city;
    public $addressLink;

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'city' => 'required',
            'addressLink' => 'required',
        ]);


        $address = new Address();
        $address->name = $this->name;
        $address->description = $this->description;
        $address->city = $this->city;
        $address->address_link = $this->addressLink;
        $address->user_id = Auth::user()->id;

        if($address->save()){

            $this->alert('success', 'New Address created successfully', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);

            return redirect()->route('profile');
        }

    }


    public function render()
    {
        $cities = CityEnum::cases();
        return view('livewire.address-page',[
            'cities' => $cities,
        ]);
    }
}
