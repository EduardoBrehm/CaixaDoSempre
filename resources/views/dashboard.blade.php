@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
        <div class="p-8">
            <h2 class="text-3xl font-bold text-center mb-2">Gerador de Texto Profissional</h2>
            <p class="text-gray-600 text-center mb-8">
                Insira o tema principal e deixe nossa IA criar um texto eloquente e sofisticado
            </p>

            <form action="{{ url('/generate-text') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label for="theme" class="block text-sm font-medium text-gray-700">Tema do Texto:</label>
                    <input type="text" 
                           id="theme" 
                           name="theme" 
                           required 
                           class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                           placeholder="Ex: Análise de desempenho trimestral">
                </div>

                <div class="space-y-2">
                    <label for="type" class="block text-sm font-medium text-gray-700">Tipo de Texto:</label>
                    <select id="type" 
                            name="type" 
                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <option value="email">E-mail Corporativo</option>
                        <option value="report">Relatório Profissional</option>
                        <option value="academic">Texto Acadêmico</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="length" class="block text-sm font-medium text-gray-700">Extensão do Texto:</label>
                    <select id="length" 
                            name="length" 
                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <option value="short">Curto (1-2 parágrafos)</option>
                        <option value="medium">Médio (3-4 parágrafos)</option>
                        <option value="long">Longo (5+ parágrafos)</option>
                    </select>
                </div>

                <button type="submit" 
                        class="w-full bg-blue-600 text-white py-4 px-6 rounded-lg shadow-md hover:bg-blue-700 transition transform hover:scale-105 font-semibold text-lg">
                    Gerar Texto Impressionante
                </button>
            </form>
        </div>

        <div class="bg-gray-50 px-8 py-6 border-t">
            <h3 class="text-sm font-medium text-gray-500 mb-2">Dica Profissional:</h3>
            <p class="text-sm text-gray-600">
                Para melhores resultados, forneça um tema específico e escolha o tipo de texto mais adequado ao seu contexto.
                Nosso algoritmo ajustará automaticamente o tom e o vocabulário para criar o texto mais impressionante possível.
            </p>
        </div>
    </div>
</div>
@endsection