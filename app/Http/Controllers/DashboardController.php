<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capsule;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $capsules = Capsule::where('user_id', Auth::id())
            ->with('photos')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard', compact('capsules'));
    }
}
