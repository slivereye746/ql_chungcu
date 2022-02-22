<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apartment Detail') }}
        </h2>
    </x-slot>

    
    
    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-4 ">
                <!--XXX-->
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <p class="block  mb-3">
                    Mã Căn Hộ: {{$apartment->id}} <br>  
                    Tên Căn Hộ: {{$apartment->name}} <br>
                    Tầng: {{$apartment->floor}} <br>
                    Giá: {{$apartment->price}} <br>
                    @if($apartment->customer_id == NULL)
                        Chủ sở hữu: Trống
                    @endif
                    </p>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" >Thông tin:</label> 
                        <textarea disabled class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" cols="50" rows="5" name="description" rows="3" placeholder="Apartment's Description">{{ $apartment->description }}</textarea>
                    </div>
                    <div class="max-w-7xl ml-auto py-6 sm:px-6 lg:px-8">
                        <a href="{{route('apartment/edit', ['id'=>$apartment->id])}}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-8 mt-4">Chỉnh sửa thông tin</a>
                        @if($apartment->customer_id != NULL)
                        <a href="{{route('apartment/add_customer', ['id'=>$apartment->id])}}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-auto mt-4">Thêm người ở</a>
                        @endif
                        
                        <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-2 rounded ml-auto mt-4" href="{{route('dashboard')}}">Thoát</a>
                    </div>

                </div>
        
            </div>
                <div class="p-6 bg-white border-b border-gray-200">
                <p class="text-lg"><strong>Danh sách người định cư trong căn hộ</strong></p>

                <div class="border-b border-gray-200 shadow">
                    <table class="min-w-full text-center">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-2 text-base text-gray-500">Id</th>
                                <th class="px-6 py-2 text-base text-gray-500">Họ và Tên</th>
                                <th class="px-6 py-2 text-base text-gray-500">CMND</th>
                                <th class="px-6 py-2 text-base text-gray-500">Số điện thoại</th>
                                <th class="px-6 py-2 text-base text-gray-500">Vai trò</th>
                                <th class="px-6 py-2 text-base text-gray-500"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                        @if( $owner!= NULL)
                            <tr class="whitespace-nowrap hover:bg-purple-100">
                                <td class="px-6 py-4 text-base text-gray-500"><a href="{{route('customer',['id'=>$owner->id])}}">
                                        {{$owner->id}}
                                    </a></td>
                                <td class="px-6 py-4">
                                    <div class="text-lg text-gray-900">
                                        <a href="{{route('customer',['id'=>$owner->id])}}">
                                            {{$owner->name}}
                                        </a>
                                    </div>                   
                                </td>
                                <td class="px-6 py-4 text-base text-gray-500">
                                    <a href="{{route('customer',['id'=>$owner->id])}}">
                                        {{$owner->cmnd}}
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-base text-gray-500">
                                    <a href="{{route('customer',['id'=>$owner->id])}}">
                                        {{$owner->phone}}
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-base text-gray-500">
                                    <a href="{{route('customer', ['id'=>$owner->id])}}" >Chủ sở hữu</a>
                                </td>
                                <td class="px-6 py-4 text-base text-gray-500">
                                   
                                </td>
                            </tr> 
                        @endif 
                        @foreach($customer as $a)
                        <tr class="whitespace-nowrap hover:bg-purple-100">
                            <td class="px-6 py-4 text-base text-gray-500"><a href="{{route('apartment',['id'=>$a->id])}}">
                                    {{$a->id}}
                                </a></td>
                            <td class="px-6 py-4">
                                <div class="text-lg text-gray-900">
                                    
                                        {{$a->name}}
                                    
                                </div>                   
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-lg text-gray-900">
                                   
                                        {{$a->cmnd}}
                                    
                                </div>                   
                            </td>
                            <td class="px-6 py-4 text-base text-gray-500">
                                
                                    {{$a->phone}}
                                
                            </td>
                            <td class="px-6 py-4 text-base text-gray-500">
                                Khách hàng thứ cấp
                            </td>
                            <td class="px-6 py-4 text-base text-gray-500">
                                <form method="POST" action="{{route('scd_delete')}}" onsubmit="return ConfirmDelete( this )">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="id" value="{{$a->id}}">
                                    <input type="hidden" name="apartment_id" value="{{$apartment->id}}">
                                    <button class="px-4 py-1 text-sm text-white bg-blue-400 rounded" type="submit">Delete</button>
                                </form>
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

</x-app-layout>