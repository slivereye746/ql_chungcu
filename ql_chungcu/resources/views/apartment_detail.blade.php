@inject('customer', 'App\Http\Controllers\CustomerController')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apartment Detail') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-50 max-w-xs">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="block  mb-3">
                    Mã Căn Hộ: {{$apartment->id}} <br>  
                    Tên Căn Hộ: {{$apartment->name}} <br>
                    Tầng: {{$apartment->floor}} <br>
                    Giá: {{$apartment->price}} <br>
                    Chủ sở hữu: 
                    @if($apartment->customer_id != NULL)
                        Chủ sở hữu: {{ $customer->findCustomerName($apartment->customer_id)}} ({{$apartment->customer_id}})
                    @else 
                        Trống
                    @endif
                    </p>
                    <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" >Thông tin:</label> 
                    <textarea disabled class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" cols="50" rows="5" name="description" rows="3" placeholder="Apartment's Description">{{ $apartment->description }}</textarea>
                    </div>
                    <div class="max-w-7xl ml-auto py-6 sm:px-6 lg:px-8">
                    <a href="{{route('apartment/edit', ['id'=>$apartment->id])}}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-8 mt-4">Edit</a>
                    <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-2 rounded ml-auto mt-4" href="{{route('dashboard')}}">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</x-app-layout>