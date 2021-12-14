<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Edit') }}
        </h2>
    </x-slot>

    <div class="pt-8 pb-4 flex justify-center">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  w-50 max-w-xs">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=" flex flex-col">
                        
                        <p class="text-gray-800 text-base pt-4 font-bold m-auto">Id: {{$user->id}} </p>
                    </div>
                    <form class=" rounded pt-6 pb-1 mb-4" method="post" action="{{route('user/update')}}" enctype="multipart/form-data">
                        @method('PATCH')    
                        @csrf
                        
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Tên </label>
                            <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                            <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="email" value="{{$user->email}}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                            <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" value="">
                        </div>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-6" type="submit">Submit</button>
                        <a class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded ml-auto mt-4" href="{{route('users')}}">Cancel</a>
                        
                    </form>
                    <div>
                        @if ($errors->any())
                        <div class=" bg-green-300 p-3">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>