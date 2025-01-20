<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class AdminController extends Controller
{
    /**
     * Display the admin.blade.php dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected $booking;

    public function index(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth::user()->user_type;
            if ($usertype == 'user') {
                return redirect('/');
            } elseif ($usertype == 'admin') {
                $view = $request->route()->getName();
                return view('admin.' . $view);
            } else {
                return redirect()->back();
            }
        }

        return redirect()->route('login');
    }

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function dashboard()
    {
        $bookings = $this->booking->all();
        return view('admin.dashboard')->with('bookings', $bookings);
    }

    public function editProducts()
    {
        return view('admin.edit-products');
    }
}
