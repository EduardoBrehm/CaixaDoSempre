<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TextGeneratorController extends Controller
{
    public function generate(Request $request)
    {
        $request->validate([
            'theme' => 'required',
        ]);

        $theme = $request->input('theme');

        $generatedText = 'Texto gerado com o tema ' . $theme;

        return view('generated-text', compact('generatedText'));
    }
}
