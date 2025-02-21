@extends('layouts.app')

@section('title', 'Texto Gerado')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
        <div class="p-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold">Seu Texto Está Pronto</h2>
                <button onclick="copyText()" class="text-blue-600 hover:text-blue-800 transition flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                    </svg>
                    Copiar Texto
                </button>
            </div>

            <div id="generated-text" class="prose max-w-none mb-8 p-6 bg-gray-50 rounded-lg border border-gray-200">
                {!! nl2br(e($generatedText)) !!}
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ url('/dashboard') }}" 
                   class="flex-1 inline-flex justify-center items-center px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Gerar Novo Texto
                </a>
                <button onclick="window.print()" 
                        class="flex-1 inline-flex justify-center items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
                    </svg>
                    Imprimir Texto
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function copyText() {
    const text = document.getElementById('generated-text').innerText;
    navigator.clipboard.writeText(text).then(() => {
        alert('Texto copiado para a área de transferência!');
    }).catch(err => {
        console.error('Erro ao copiar texto:', err);
    });
}
</script>
@endsection