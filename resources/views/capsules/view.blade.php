@extends('layouts.app')

@section('title', $capsule->title . ' - CaixaDoSempre')

@section('content')
<div class="min-h-screen bg-pink-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $capsule->title }}</h1>
            
            @if($capsule->description)
                <p class="text-gray-600 mb-6">{{ $capsule->description }}</p>
            @endif

            @if(!$canOpen)
                <div class="text-center py-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-2">Tempo restante para abrir</h2>
                    <div class="text-4xl font-bold text-rose-600">
                        {{ $daysRemaining }} dias
                    </div>
                </div>
            @else
                <div class="text-center py-8">
                    <h2 class="text-2xl font-semibold text-rose-600">Esta cápsula já está disponível!</h2>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
