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
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Tempo restante para abrir</h2>
                    <div class="grid grid-cols-4 gap-4 max-w-2xl mx-auto" x-data="countdown('{{ $capsule->opening_date }}')" x-init="init()">
                        <div class="bg-red-50 rounded-lg p-4">
                            <div x-text="timeLeft.days.toString().padStart(2, '0')" class="text-6xl font-bold text-red-600 mb-2">00</div>
                            <div class="text-sm text-gray-600">Dias</div>
                        </div>
                        <div class="bg-red-50 rounded-lg p-4">
                            <div x-text="timeLeft.hours.toString().padStart(2, '0')" class="text-6xl font-bold text-red-600 mb-2">00</div>
                            <div class="text-sm text-gray-600">Horas</div>
                        </div>
                        <div class="bg-red-50 rounded-lg p-4">
                            <div x-text="timeLeft.minutes.toString().padStart(2, '0')" class="text-6xl font-bold text-red-600 mb-2">00</div>
                            <div class="text-sm text-gray-600">Minutos</div>
                        </div>
                        <div class="bg-red-50 rounded-lg p-4">
                            <div x-text="timeLeft.seconds.toString().padStart(2, '0')" class="text-6xl font-bold text-red-600 mb-2">00</div>
                            <div class="text-sm text-gray-600">Segundos</div>
                        </div>
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

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('countdown', (targetDate) => ({
        timeLeft: {
            days: 0,
            hours: 0,
            minutes: 0,
            seconds: 0
        },
        targetDate: new Date(targetDate),
        timer: null,

        init() {
            this.updateCountdown();
            this.timer = setInterval(() => this.updateCountdown(), 1000);
        },

        updateCountdown() {
            const now = new Date();
            const distance = this.targetDate - now;

            if (distance < 0) {
                clearInterval(this.timer);
                window.location.reload();
                return;
            }

            this.timeLeft = {
                days: Math.floor(distance / (1000 * 60 * 60 * 24)),
                hours: Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
                minutes: Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
                seconds: Math.floor((distance % (1000 * 60)) / 1000)
            };
        }
    }));
});
</script>
@endpush

@endsection
