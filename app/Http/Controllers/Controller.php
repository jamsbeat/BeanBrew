<?php

namespace App\Http\Controllers;

use App\Models\Booking;

abstract class Controller
{
    public function dashboard()
    {
        $bookings = Booking::all(); // Fetch bookings from the database
        return view('admin.dashboard')->with('bookings', $bookings);
    }
}
