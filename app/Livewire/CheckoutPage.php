<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use PHPUnit\Event\Code\Test;

#[Title('Checkout - Epharmacy')]

class CheckoutPage extends Component
{

    use LivewireAlert;

    public $address;
    public $payment_method;
    public $note;



    public function placeOrder()
    {
        $this->validate([
            'address' => 'required',
            'payment_method' => 'required',
        ]);

        $cartItems = CartManagement::getAllCartItemsFromCookie();

        $order = new Order();
        $order->client_id = Auth::user()->id;
        $order->status = 'New';
        $order->payment_method = $this->payment_method;
        $order->address_id = $this->address;
        $order->total_price = CartManagement::calculateGrandTotal($cartItems);
        $order->delivery_id = rand(6, 10);
        $order->note = $this->note;

        if(Auth::user()->status == 1){
            if ($order->save()) {
                $order->order_item()->createMany($cartItems);
                CartManagement::clearCartItemsFromCookie();
                $this->alert('success', 'Order Placed successfully', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                ]);
    
                return redirect()->route('bill', ['id' => $order->id]);
            }else{
                $this->alert('error', 'Order Placed Failed', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                   ]);

            }

        }else{
            $this->alert('error', 'Your account is suspended, please contact the administrator', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);

        }








        // dd($cartItems);  // التحقق من القيم
    }

    public function mount()
    {
        $cartItems = CartManagement::getAllCartItemsFromCookie();
        if (count($cartItems) == 0) {
            return redirect()->route('shop');
        }
    }


    public function render()
    {

        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $addresses = Address::where('user_id', $user_id)->get();
        $cartItems = CartManagement::getAllCartItemsFromCookie();
        $grandTotal = CartManagement::calculateGrandTotal($cartItems);

        return view('livewire.checkout-page', [
            'cartItems' => $cartItems,
            'grandTotal' => $grandTotal,
            'client' => $user,
            'addresses' => $addresses,
        ]);
    }
}
