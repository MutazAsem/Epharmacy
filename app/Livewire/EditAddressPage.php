<?php

namespace App\Livewire;

use App\Enums\CityEnum;
use App\Models\Address;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Address - Epharmacy')]


class EditAddressPage extends Component
{
    use LivewireAlert;


    public $id;
    public $name;
    public $description;
    public $city;
    public $addressLink;

    public function mount($id){
        $this->id = $id;

        $address = Address::find($this->id);
        if ($address) {
            $this->name = $address->name;
            $this->description = $address->description;
            $this->city = $address->city;
            $this->addressLink = $address->address_link;
        }
    }

    public function updateAddress()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'city' => 'required',
            'addressLink' => 'required',
        ]);

        $address = Address::find($this->id);
        if ($address) {
            $address->name = $this->name;
            $address->description = $this->description;
            $address->city = $this->city;
            $address->address_link = $this->addressLink;
            if($address->save()){

                $this->alert('success', 'Address Updated successfully', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                ]);
    
                return redirect()->route('profile');

            }
            

        }
    }


    public function render()
    {

        $address = Address::where('id',$this->id)->firstOrFail();
        $cities = CityEnum::cases();

        return view('livewire.edit-address-page',[
            'address' => $address,
            'cities' => $cities,
        ]);
    }
}
