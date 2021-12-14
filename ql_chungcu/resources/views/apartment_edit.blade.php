<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apartment Edit') }}
        </h2>
    </x-slot>  

    <div class="pt-12 pb-4  flex justify-center">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-50 max-w-xs">
                <div class="p-6 bg-white border-b border-gray-200">
                <p class="block text-gray-700 text-sm font-bold mb-3" >Mã Căn Hộ: {{$apartment->id}} <br>
                    Tầng: {{$apartment->floor}}<br>
                    Chủ sở hữu: 
                    @if($owner != NULL)
                    {{$owner->name}} (id: {{$apartment->id}})</p>
                    @else
                    Căn hộ trống</p>
                    @endif
                    <form method="post" action="/apartment/update/{{ $apartment->id }}">
                        @method('PATCH')    
                        @csrf
                        
                        <input type="hidden" name="id" value="{{ $apartment->id }}">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Tên Căn Hộ</label>
                            <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" value="{{ $apartment->name }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Giá trị</label>
                            @if($apartment->price != NULL)
                            <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="price" value="{{$apartment->price}}">
                            @else
                            <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="price" placeholder="Nhập giá trị căn hộ">
                            @endif
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                            <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" cols="50" rows="5" name="description" rows="3" placeholder="Apartment's Description">{{ $apartment->description }}</textarea>
                        </div>
                        <div class="ml-11">
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-auto" type="submit">Submit</button>
                        <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-auto mt-4" href="{{route('dashboard')}}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>