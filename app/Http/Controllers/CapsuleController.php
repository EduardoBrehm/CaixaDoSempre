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
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'opening_date' => 'required|date|after:today',
                'plan' => 'required|in:basic,intermediate',
                'photos' => 'required|array',
                'photos.*' => 'required|image|max:5120',
                'counter_style' => 'required_if:plan,intermediate|in:classic,modern,romantic',
                'music' => 'nullable|file|mimes:mp3,wav|max:10240',
            ]);

            if ($request->plan === 'basic' && count($request->file('photos')) > 1) {
                return redirect()->back()
                    ->withErrors(['photos' => 'O plano básico permite apenas 1 foto'])
                    ->withInput();
            }

            if ($request->plan === 'intermediate' && count($request->file('photos')) > 5) {
                return redirect()->back()
                    ->withErrors(['photos' => 'O plano intermediário permite no máximo 5 fotos'])
                    ->withInput();
            }

            $capsule = Capsule::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'description' => $request->description,
                'opening_date' => $request->opening_date,
                'plan' => $request->plan,
                'music' => $request->hasFile('music') ? $request->file('music')->store('capsule_musics', 'public') : null,
                'counter_style' => $request->counter_style ?? 'classic',
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
                ->with('error', 'Erro ao criar cápsula: ' . $e->getMessage())
                ->withInput();
        }
    }
}
