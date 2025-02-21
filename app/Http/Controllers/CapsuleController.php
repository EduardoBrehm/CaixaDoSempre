<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapsuleController extends Controller
{
    public function create()
    {
        return view('capsules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'opening_date' => 'required|date|after:today',
            'plan' => 'required|in:basic,intermediate',
        ]);

        if ($request->plan === 'basic') {
            $request->validate([
                'photo' => 'required|image|max:5120',
                'music' => 'required|file|mimes:mp3,wav|max:10240',
            ]);
        } else {
            $request->validate([
                'photos.*' => 'required|image|max:5120',
                'musics.*' => 'required|file|mimes:mp3,wav|max:10240',
                'counter_style' => 'required|in:classic,modern,romantic',
            ]);
        }

        return redirect()->route('dashboard')
            ->with('success', 'Cápsula criada com sucesso! Ela será aberta em ' . $request->opening_date);
    }
}
