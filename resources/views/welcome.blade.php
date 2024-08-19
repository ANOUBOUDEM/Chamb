<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pokedex</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>

    <div class="mx-auto max-w-7xl mt-3 rounded-lg px-4 py-6 sm:px-6 lg:px-8 bg-orange-600">
        <div>
            <header class="bg-white shadow">
                <div class=>
                    <h1 class="text-3xl font-bold bg-orange-600 tracking-tight text-white">Pokedex</h1>
                </div>
            </header>
            <main>
                @livewire('pokemon-filter')
            </main>
        </div>
    </div>

    </body>
</html>
