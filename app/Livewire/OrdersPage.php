<?php

namespace App\Livewire;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrdersPage extends Component
{
    public $bookings;

    public function mount()
    {
        $userId = Auth::id();
        $this->bookings = Booking::where('user_id', $userId)->get();
    }

    public function render()
    {
        return view('livewire.orders-page', ['bookings' => $this->bookings])->layout('layouts.app');
    }

    public function remove($id)
    {
        Booking::find($id)->delete();
        $this->mount();
    }
}
