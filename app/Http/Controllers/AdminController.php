<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display the admin.blade.php dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->user_type;
            if ($usertype == 'user') {
                return redirect('/');
            } elseif($usertype == 'admin') {
                return view('admin.dashboard');
            } else {
                return redirect()->back();
            }
        }
    }
}
