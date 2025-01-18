<?php

namespace App\Livewire;

use App\Models\Booking;
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
        $bookings = Booking::where('user_id', $userId)->simplePaginate(3);

        return view('livewire.orders-page', [
            'bookings' => $bookings
        ])->layout('layouts.app');
    }

    public function remove($id)
    {
        Booking::find($id)->delete();
        $this->mount();
    }
}
