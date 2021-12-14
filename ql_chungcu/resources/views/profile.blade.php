<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    

    <div class="pt-12 pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Id: {{Auth::id()}} <br>
                    Name : {{Auth::user()->email}}
                </div>
            </div>
        </div>
    </div>
    <div class="pt-0 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded ml-auto">Edit</button>
        @if (Auth::id()!=NULL)
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Delete</button>
        @endif
        </div>
    </div>
</x-app-layout>