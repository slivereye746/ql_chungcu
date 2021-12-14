@inject('cs', 'App\Http\Controllers\userController')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Detail') }}
        </h2>
    </x-slot>

    <div class="pt-8 pb-4 flex justify-center">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  w-50 max-w-xs">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=" flex flex-col">
                        <p class="text-gray-800 text-base pt-4 font-bold m-auto">Id: {{$user->id}} </p>
                    </div>
                    <div class=" rounded pt-6 pb-1">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Tên </label>
                            <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >{{ $user->name }}</div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                                <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >{{ $user->email }}</div>
                        </div>
                    </div>
                    <a href="{{route('user/edit', ['id'=>$user->id])}}" class="float-left px-5 py-1 m-auto ml-6 text-sm text-white bg-blue-600 rounded">Edit</a>
                    <form method="POST" action="{{route('user_delete')}}" onsubmit="return ConfirmDelete( this )">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button class="px-4 py-1 m-auto text-sm text-white bg-red-500 rounded mx-5" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-0 pb-12">
        
    </div>
</x-app-layout>