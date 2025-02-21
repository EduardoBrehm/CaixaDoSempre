@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Dashboard</h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-red-600 hover:text-red-500">
                    Sair
                </button>
            </form>
        </div>

        <div class="border-t border-gray-200 pt-4">
            <p class="text-gray-600">
                Bem-vindo(a), {{ Auth::user()->name }}!
            </p>
        </div>
    </div>
</div>
@endsection