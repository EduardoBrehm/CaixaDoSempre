<?php

namespace App\Http\Controllers;

use App\Models\Capsule;
use Carbon\Carbon;

class CapsuleViewController extends Controller
{
    public function show(Capsule $capsule)
    {
        $now = Carbon::now();
        $openingDate = Carbon::parse($capsule->opening_date);
        
        $canOpen = $now->greaterThanOrEqualTo($openingDate);
        $daysRemaining = $now->diffInDays($openingDate, false);
        
        return view('capsules.view', compact('capsule', 'canOpen', 'daysRemaining'));
    }
}
