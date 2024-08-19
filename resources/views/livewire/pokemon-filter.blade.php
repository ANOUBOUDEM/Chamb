<div>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <input wire:model.live="search" class="shadow appearance-none border rounded-full w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Search...">
    </div>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <select wire:model.live="type" class="shadow appearance-none border rounded-full w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="All Types">All Types</option>
            @foreach($types as $type)
                <option value="{{ $type->name }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="grid grid-rows-1 md:grid-rows-2 lg:grid-rows-3 gap-4">
        @foreach($pokemons as $pokemon)
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
        @endforeach
        {{ $pokemons->links() }}
    </div>
</div>
