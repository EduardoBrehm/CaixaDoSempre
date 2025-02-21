@extends('layouts.app')

@section('title', 'Login - CaixaDoSempre')

@section('content')
<div class="min-h-screen bg-pink-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">
                Bem-vindo(a) de volta!
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Continue criando memórias especiais com seu amor
            </p>
        </div>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow-lg sm:rounded-lg sm:px-10 border-2 border-rose-100">
            <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        E-mail
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required 
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 
                            focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm">
                    </div>
                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Senha
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 
                            focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm">
                    </div>
                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" 
                            class="h-4 w-4 text-rose-600 focus:ring-rose-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            Lembrar de mim
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-rose-600 hover:text-rose-500">
                            Esqueceu sua senha?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                        Entrar
                    </button>
                </div>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">
                            Ainda não tem uma conta?
                        </span>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('register') }}" class="w-full flex justify-center py-2 px-4 border border-rose-300 rounded-md shadow-sm text-sm font-medium text-rose-600 bg-white hover:bg-rose-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                        Criar nova conta
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Decoração -->
    <div class="absolute top-0 right-0 -mt-12 -mr-12 pointer-events-none opacity-10">
        <svg class="w-96 h-96 text-rose-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
        </svg>
    </div>
    <div class="absolute bottom-0 left-0 -mb-12 -ml-12 pointer-events-none opacity-10">
        <svg class="w-96 h-96 text-rose-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
        </svg>
    </div>
</div>
@endsection
