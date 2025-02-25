<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Photos;
use App\Models\Capsule;
use Illuminate\Support\Facades\Auth;

class CapsuleController extends Controller
{
    public function create()
    {
        return view('capsules.create');
    }

    public function store(Request $request)
    {
        try {   
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'opening_date' => 'required|date|after:today',
        //     'plan' => 'required|in:basic,intermediate',
        // ]);

        // if ($request->plan === 'basic') {
        //     $request->validate([
        //         'photos' => 'required|array|max:1',
        //         'photos.*' => 'required|image|max:5120',
        //     ]);
        // } else {
        //     $request->validate([
        //         'photos' => 'required|array',
        //         'photos.*' => 'required|image|max:5120',
        //         'music' => 'required|file|mimes:mp3,wav|max:10240',
        //         'counter_style' => 'required|in:classic,modern,romantic',
        //     ]);
        // }

            $capsule = Capsule::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'opening_date' => $request->opening_date,
                'plan' => $request->plan,
                'music' => $request->music,
                'counter_style' => $request->counter_style,
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    try {
                        $fileName = uniqid('capsule_') . '_' . time() . '.' . $photo->getClientOriginalExtension();
                        $path = $photo->storeAs('capsule_photos', $fileName, 'public');
                        
                        Photos::create([
                            'capsule_id' => $capsule->id,
                            'name' => $fileName,
                            'path' => $path
                        ]);
                    } catch (\Exception $e) {
                        continue;
                    }
                }
            }

            return redirect()->route('dashboard')
                ->with('success', 'Cápsula criada com sucesso! Ela será aberta em ' . $request->opening_date);

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Erro ao criar cápsula: ' . $e->getMessage());
        }
    }
}
