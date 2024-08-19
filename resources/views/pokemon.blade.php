<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pokedex</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 bg-orange-600">
    <div>
        <header class="bg-white shadow">
            <div class=>
                <a href="{{ route('home') }}" class="text-3xl font-bold bg-orange-600 tracking-tight text-white">Pokedex</a>
            </div>
        </header>
        <main>
            <div>
                <div class="grid grid-rows-1 md:grid-rows-2 lg:grid-rows-3 gap-4">
                    <div class="max-w-sm w-full lg:max-w-full lg:flex">
                        <img class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                             src="{{ asset($pokemon->image) }}"/>
                        <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                                <a href="{{ route('pokemon', $pokemon->id) }}" class="text-orange-400 font-bold text-xl mb-2">{{ $pokemon->name }}</a>
                                <p class="text-gray-700 text-base">{{ $pokemon->description }}</p>
                            </div>
                            <div class="flex items-center">
                                <div class="text-sm">
                                    @foreach($pokemon->types as $type)
                                        <p class="ext-gray-900 leading-none">{{ $type->name }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

</body>
</html>
