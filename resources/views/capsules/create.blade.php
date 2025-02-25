@extends('layouts.app')

@section('title', 'Criar Nova Cápsula - CaixaDoSempre')

@section('content')
<div class="min-h-screen bg-pink-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Seleção de Plano -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Escolha seu plano</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Plano Básico -->
                <div class="bg-white rounded-lg shadow-lg p-6 border-2 cursor-pointer transition-all duration-200 hover:border-rose-500" 
                     onclick="selectPlan('basic')"
                     id="basic-plan">
                    <h3 class="text-xl font-semibold text-gray-900">Plano Básico</h3>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-gray-900">R$ 29,90</span>
                        <span class="text-gray-500">/ano</span>
                    </div>
                    <ul class="mt-6 space-y-4">
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="ml-3 text-gray-700">1 foto do casal</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="ml-3 text-gray-700">1 música de fundo</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="ml-3 text-gray-700">Contador regressivo simples</span>
                        </li>
                    </ul>
                </div>

                <!-- Plano Intermediário -->
                <div class="bg-white rounded-lg shadow-lg p-6 border-2 cursor-pointer transition-all duration-200 hover:border-rose-500"
                     onclick="selectPlan('intermediate')"
                     id="intermediate-plan">
                    <div class="absolute top-0 right-0 px-3 py-1 bg-rose-500 text-white rounded-bl-lg rounded-tr-lg text-sm">
                        Popular
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Plano Intermediário</h3>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-gray-900">R$ 49,90</span>
                        <span class="text-gray-500">/ano</span>
                    </div>
                    <ul class="mt-6 space-y-4">
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="ml-3 text-gray-700">5 fotos do casal</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="ml-3 text-gray-700">3 músicas de fundo</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="ml-3 text-gray-700">Contador personalizado</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Formulário Dinâmico -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Criar Nova Cápsula</h2>
            
            <form action="{{ route('capsules.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="plan" id="selected-plan" value="basic">

                <!-- Campos comuns -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Título da Cápsula</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500">
                </div>

                <div class="mt-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500"></textarea>
                </div>

                <div class="mt-4">
                    <label for="opening_date" class="block text-sm font-medium text-gray-700">Data de Abertura</label>
                    <input type="date" name="opening_date" id="opening_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500">
                </div>

                <!-- Campos do Plano Básico -->
                <div id="basic-fields">
                    <div class="space-y-6">
                        <div>
                            <label for="photo" class="block text-sm font-medium text-gray-700">Foto do Casal</label>
                            <input type="file" name="photos[]" id="photo" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                        </div>

                        <div>
                            <label for="music" class="block text-sm font-medium text-gray-700">Música de Fundo</label>
                            <input type="file" name="music" id="music" accept="audio/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                        </div>
                    </div>
                </div>

                <!-- Campos do Plano Intermediário -->
                <div id="intermediate-fields" class="hidden space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fotos do Casal (até 5)</label>
                        <div class="mt-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                            @for ($i = 1; $i <= 5; $i++)
                            <div>
                                <input type="file" name="photos[]" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                            </div>
                            @endfor
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Músicas de Fundo (até 3)</label>
                        <div class="mt-1 space-y-4">
                            @for ($i = 1; $i <= 3; $i++)
                            <div>
                                <input type="file" name="musics[]" accept="audio/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                            </div>
                            @endfor
                        </div>
                    </div>

                    <div>
                        <label for="counter_style" class="block text-sm font-medium text-gray-700">Estilo do Contador</label>
                        <select name="counter_style" id="counter_style" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500">
                            <option value="classic">Clássico</option>
                            <option value="modern">Moderno</option>
                            <option value="romantic">Romântico</option>
                        </select>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-rose-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                            Criar Cápsula
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function selectPlan(plan) {
    // Atualiza o input hidden
    document.getElementById('selected-plan').value = plan;
    
    // Remove a seleção anterior
    document.getElementById('basic-plan').classList.remove('border-rose-500');
    document.getElementById('intermediate-plan').classList.remove('border-rose-500');
    
    // Adiciona a seleção ao plano escolhido
    document.getElementById(plan + '-plan').classList.add('border-rose-500');
    
    // Esconde todos os campos específicos
    document.getElementById('basic-fields').classList.add('hidden');
    document.getElementById('intermediate-fields').classList.add('hidden');
    
    // Mostra os campos do plano selecionado
    document.getElementById(plan + '-fields').classList.remove('hidden');
}
</script>
@endpush
@endsection