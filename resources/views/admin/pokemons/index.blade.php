<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Pokemons') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @if (session()->has('message'))
                    <div class="px-4 py-3 my-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md" role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <a href="{{ route('pokemons.create') }}" class="px-4 py-2 mx-4 my-3 font-bold text-white bg-blue-500 rounded btn btn-blue hover:bg-blue-700">
                    {{ __('Ajouter un pokemon') }}
                </a>
                <table class="w-full py-5 table-fixed">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="w-20 px-4 py-2">ID</th>
                        <th class="px-4 py-2">NOM</th>
                        <th class="px-4 py-2">PV</th>
                        <th class="px-4 py-2">POIDS</th>
                        <th class="px-4 py-2">TAILLE</th>
                        <th class="px-4 py-2">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pokemons as $key => $pokemon)
                        <tr>
                            <td class="w-20 px-4 py-2 text-center">{{ $key+1 }}</td>
                            <td class="px-4 py-2 text-center">{{ $pokemon->name }}</td>
                            <td class="px-4 py-2 text-center">{{ $pokemon->point }}</td>
                            <td class="px-4 py-2 text-center">{{ $pokemon->weight }}</td>
                            <td class="px-4 py-2 text-center">{{ $pokemon->height }}</td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('pokemons.edit', $pokemon->id) }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                    {{ __('Modifier') }}
                                </a>
                                <a class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700"  onclick="event.preventDefault();
                                                document.getElementById('del-pokemon-{{ $pokemon->id }}').submit();">
                                    {{ __('Supprimer') }}
                                </a>
                                <form action="{{route('pokemons.destroy', $pokemon->id)}}" method="POST" id="del-pokemon-{{$pokemon->id}}" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
