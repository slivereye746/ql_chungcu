@inject('cs', 'App\Http\Controllers\CustomerController')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Detail') }}
        </h2>
    </x-slot>

    <div class="pt-8 pb-4 flex justify-center">
        <div class="max-w-7xl ml-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  w-50 max-w-xs">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=" flex flex-col">
                        <div class="w-52 h-52 rounded-full shadow-sm overflow-hidden bg-gray-200 m-auto">
                            @if(file_exists(public_path().'/images/user_profile/'.$customer->id.'.png')) 
                            <img class="object-cover h-52 w-full" src="/images/user_profile/{{$customer->id}}.png" /> 
                            @else
                            <img src="/images/source/noImg.jpg" /> 
                            @endif
                        </div>
                        
                        <p class="text-gray-800 text-base pt-4 font-bold m-auto">Id: {{$customer->id}} </p>
                    </div>
                    <div class=" rounded pt-6 pb-1">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Tên Khách Hàng </label>
                            <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >{{ $customer->name }}</div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Số điện thoại</label>
                            <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >{{ $customer->phone }}</div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                            @if($customer->email != NULL)
                                <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >{{ $customer->email }}</div>
                            @else
                                <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >Trống</div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="birthday">Ngày sinh</label>
                            <input disabled class="shadow appearance-none border-gray-200 rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" name="birthday" min="1900-01-01" max="2022-12-31" value="{{ $customer->birthday }}">
                        </div>     
                    </div>
                    <a href="{{route('customer/edit', ['id'=>$customer->id])}}" class="float-left px-5 py-1 ml-6 text-sm text-white bg-blue-600 rounded">Edit</a>
                    <form method="POST" action="{{route('customer_delete')}}" onsubmit="return ConfirmDelete( this )">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{$customer->id}}">
                        <button class="px-4 py-1 text-sm text-white bg-red-500 rounded mx-5" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mr-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  w-50 max-w-xs">
                <div class="px-8 bg-white border-b border-gray-200">
                    <div class=" rounded pt-1 pb-1 mb-4">
                        <div class="block text-gray-700 text-sm font-bold mb-2">
                            <p class="text-gray-800 text-base pt-4 font-bold m-auto">Danh sách căn hộ sở hữu</p>
                            <table class="table-auto w-full border-2 text-center mt-4">
                                <thead class="bg-gray-100">
                                    <tr>
                                    <th class="border px-4 py-2">Id</th>
                                    <th class="border px-4 py-2">Name</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-300">
                                @foreach($cs->getListApartment($customer->id) as $li)
                                    <tr>
                                        <td class="border px-4 py-2">{{$li->id}}</td>
                                        <td class="border px-4 py-2">{{$li->name}}</td>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-0 pb-12">
        
    </div>
</x-app-layout>