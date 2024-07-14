<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


#[Title('Profile - Epharmacy')]

class ProfilePage extends Component
{

    public function render()
    {
        $user_id=Auth::user()->id;
        $user=User::where('id',$user_id)->first();

        $orders = Order::where('client_id', $user_id)->with('order_delivery')->get();
        
        $addresses = Address::where('user_id', $user_id)->get();

        return view('livewire.profile-page' ,[
            
            'user' => $user ,
            'orders' => $orders,
            'addresses'=> $addresses
        ]);
    }
}
