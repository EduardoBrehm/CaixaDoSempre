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
        
        // Garante que a data está no timezone correto
        $openingDate->setTimezone('America/Sao_Paulo');
        
        $canOpen = $now->greaterThanOrEqualTo($openingDate);
        
        return view('capsules.view', [
            'capsule' => $capsule,
            'canOpen' => $canOpen,
            'opening_date' => $openingDate->format('Y-m-d H:i:s')
        ]);
    }
}
