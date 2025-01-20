<?php

namespace App\Livewire;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class BookingsList extends Component
{
    use WithPagination;

    public $search = '';

    public function mount()
    {

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $bookings = Booking::where('location', 'like', '%'.$this->search.'%')
            ->orWhere('id', 'like', '%'.$this->search.'%')
            ->latest()
            ->paginate(5);

        return view('livewire.bookings-list', [
            'bookings' => $bookings,
        ]);
    }

    public function remove($id)
    {
        Booking::find($id)->delete();
        $this->mount();
    }
}
