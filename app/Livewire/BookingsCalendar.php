<?php

namespace App\Livewire;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Omnia\LivewireCalendar\LivewireCalendar;

class BookingsCalendar extends LivewireCalendar
{

    public function events(): Collection
    {
        return Booking::query()
            ->whereDate('scheduled_at', '>=', $this->gridStartsAt)
            ->whereDate('scheduled_at', '<=', $this->gridEndsAt)
            ->get()
            ->map(function (Booking $booking) {
                return [
                    'id' => $booking->id,
                    'title' => $booking->title,
                    'description' => $booking->notes,
                    'date' => $booking->date,
                ];
            });
    }

}
