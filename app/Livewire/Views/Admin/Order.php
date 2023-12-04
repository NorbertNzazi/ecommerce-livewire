<?php

namespace App\Livewire\Views\Admin;

use App\Models\Order as ModelsOrder;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Order extends Component
{
    public $order;

    public function mount($id)
    {
        //
        $this->order = ModelsOrder::find(Crypt::decrypt($id));
    }

    public function exportOrder()
    {
        //
        return redirect()->route('export-pdf', ['id' => $this->order->order_id]);
    }

    public function render()
    {
        return view('livewire.views.admin.order');
    }
}
