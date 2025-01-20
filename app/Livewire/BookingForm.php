<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class BookingForm extends Component
{
    public $location = '';
    public $people = '';
    public $booking_date = '';
    public $booking_time = '';

    public function save()
    {

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'location' => $this->location,
            'people' => $this->people,
            'date' => $this->booking_date,
            'time' => $this->booking_time,
        ]);

        $this->dispatch('bookingAdded');

        $this->redirect('/');


    }

    public function render()
    {
        return view('livewire.booking-form');
    }

}
