<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Pokemon') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @if (session()->has('message'))
                    <div class="px-4 py-3 my-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md"
                         role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <a href="{{ route('pokemons.index') }}" class="px-4 py-2 mx-4 my-3 mt-3 font-bold text-white
                bg-blue-500 rounded hover:bg-blue-700">{{ __('Pokemons') }}</a>
                <div class="mt-5 mb-4 ml-5">
                    <form action="{{ route('pokemons.update', $pokemon->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Name') }}</label>
                                <div class="mt-2">
                                    <input type="text" value="{{ $pokemon->name }}" name="name" id="name" autocomplete="name" class="block w-full
                                    rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                     placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                     sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="point" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Point') }}</label>
                                <div class="mt-2">
                                    <input type="text" value="{{ $pokemon->point }}" name="point" id="point" autocomplete="point" class="block w-full rounded-md border-0
                                     py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                      focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="weight" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Weight') }}</label>
                                <div class="mt-2">
                                    <input type="text" value="{{ $pokemon->weight }}" name="weight" id="weight" autocomplete="weight" class="block w-full rounded-md border-0
                                    py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                     focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="height" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Height') }}</label>
                                <div class="mt-2">
                                    <input type="text" value="{{ $pokemon->height }}" name="height" id="height" autocomplete="height" class="block w-full rounded-md border-0 py-1.5
                                    text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                     focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="type_id" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Types') }}</label>
                                <div class="mt-2">
                                    <select name="type_id[]" id="type_id" multiple required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="type_id" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Image') }}</label>
                                <div class="mt-2">
                                    <input type="file" value="{{ $pokemon->image }}" name="image" id="image" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>


                        </div>
                        <div class="flex items-center justify-end mt-6 gap-x-6">
                            <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm
                            hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                            focus-visible:outline-indigo-600">
                                {{ __('Modifier le pokemon') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
