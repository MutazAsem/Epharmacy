<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Title('Profile - Epharmacy')]

class ProfilePage extends Component
{

    use LivewireAlert;

    public $addresses;
    

    public function deleteAddress($id)
    {
        $address = Address::find($id);
        if ($address) {
            $address->delete();
            // إعادة تحميل العناوين
            $this->addresses = Address::all();

            $this->alert('error', 'Address Deleted', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
               ]);
        }
    }

    public function render()
    {
        $user_id=Auth::user()->id;
        $user=User::where('id',$user_id)->first();

        $orders = Order::where('client_id', $user_id)->with('order_delivery')->with('order_address')->get();
        
        $this->addresses = Address::where('user_id', $user_id)->get();

        return view('livewire.profile-page' ,[
            
            'user' => $user ,
            'orders' => $orders,
            'addresses'=> $this->addresses,
        ]);
    }
}
