<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Enrol.ai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-900 min-h-screen">
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="font-bold text-2xl text-blue-600">
                        Enrol<span class="text-gray-900">.ai</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-gray-900 transition">Dashboard</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-12">
        @yield('content')
    </main>

    <footer class="bg-white border-t mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <p class="text-center text-gray-500 text-sm">
                © {{ date('Y') }} Enrol.ai - Transformando palavras em arte corporativa
            </p>
        </div>
    </footer>
</body>
</html>
