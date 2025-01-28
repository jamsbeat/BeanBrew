<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class OrdersPage extends Component
{
    use WithPagination;
    public function mount()
    {

    }

    public function render()
    {
        $userId = Auth::id();
        $bookings = Booking::where('user_id', $userId)->latest()->paginate(3);
        $orders = Order::all();

        return view('livewire.orders-page', [
            'bookings' => $bookings,
            'orders' => $orders,
        ])->layout('layouts.app');
    }

    public function remove($id)
    {
        Booking::find($id)->delete();
        $this->mount();
    }


}
