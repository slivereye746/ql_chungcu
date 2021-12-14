@inject('cs', 'App\Http\Controllers\CustomerController')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Edit') }}
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
                    <form class=" rounded pt-6 pb-1 mb-4" method="post" action="{{route('customer/update')}}" enctype="multipart/form-data">
                        @method('PATCH')    
                        @csrf
                        
                        <input type="hidden" name="id" value="{{ $customer->id }}">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Tên Khách Hàng </label>
                            <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" value="{{ $customer->name }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Số điện thoại</label>
                            <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="phone" value="{{ $customer->phone }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                            @if($customer->email != NULL)
                                <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="email" value="{{$customer->email}}"></p>
                            @else
                                <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="email" placeholder="Nhập email"></p>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="birthday">Ngày sinh</label>
                            <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" name="birthday" min="1900-01-01" max="2022-12-31" value="{{ $customer->birthday }}">
                        </div>
                        <div class="mb-5">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="img">Chọn ảnh đại diện mới:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="img" accept="image/*"><br>
                        </div>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-12" type="submit">Submit</button>
                        <a class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded ml-auto mt-4" href="{{route('customers')}}">Cancel</a>
                        
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
        <div class="max-w-7xl mr-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  w-50 max-w-xs">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=" rounded pt-1 pb-1 mb-4">
                        <div class="block text-gray-700 text-sm font-bold mb-2">
                            <p class="text-gray-800 text-base pt-4 font-bold m-auto">Danh sách căn hộ sở hữu</p>
                            <table class="table-auto w-full border-2 text-centers">
                                <thead class="bg-gray-100">
                                    <tr>
                                    <th class="border px-4 py-2">Id</th>
                                    <th class="border px-4 py-2">Name</th>
                                    <th class="border px-4 py-2"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-300">
                                @foreach($cs->getListApartment($customer->id) as $li)
                                    <tr>
                                        <td class="border px-4 py-2">{{$li->id}}</td>
                                        <td class="border px-4 py-2">{{$li->name}}</td>
                                        <td class="border px-4 py-2">
                                            <form method="POST" action="{{route('customer/removeapartment')}}">
                                                @method('PATCH')
                                                @csrf
                                                <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                                <input type="hidden" name="apartment_id" value="{{$li->id}}">
                                                <button class="px-4 py-1 text-sm text-white bg-red-500 hover:bg-red-300 rounded" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="my-4">
                                <form method="POST" action="{{route('customer/modifyapartment')}}">
                                    @method('PATCH')
                                    @csrf
                                    <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="apartment">Chọn căn hộ trống:</label>
                                    <select id="pickapart" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="apartment">
                                        <option value="NULL">--Drop list--</option>
                                        @foreach($emptyapartment as $a)
                                        <option value="{{$a->id}}">{{$a->name}}</option>
                                        @endforeach
                                    </select> 
                                    <button class="px-4 py-2 my-3 text-sm text-white bg-purple-500 hover:bg-purple-300 rounded" type="submit">Thêm căn hộ</button>         
                                </form>        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>