<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Bill - Epharmacy')]

class BillPage extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {

        $bill = Order::where('id', $this->id)->with('order_delivery')->with('order_address')->with('client_order')->firstOrFail();

        $items = OrderItem::where('order_id', $this->id)->with('order_product_item')->with('order_measurement_unit')->get();

        return view('livewire.bill-page', [
            'bill' => $bill,
            'items' => $items,
        ]);
    }
}
