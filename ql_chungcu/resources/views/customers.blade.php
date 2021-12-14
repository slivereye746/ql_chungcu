<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh sách khách hàng') }}
        </h2>
    </x-slot>

    <div class="pt-4 pb-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{route('customer_add')}}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded ml-auto">Add</a>
        </div>
    </div>

    <div class="pt-4 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="border-b border-gray-200 shadow">
                    <table class="min-w-full text-center">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-2 text-base text-gray-500">Id</th>
                                <th class="px-6 py-2 text-base text-gray-500">Tên Khách Hàng</th>
                                <th class="px-6 py-2 text-base text-gray-500">Số điện thoại</th>
                                <th class="px-6 py-2 text-base text-gray-500">Email</th>
                                <th class="px-6 py-2 text-base text-gray-500">Ngày đăng ký</th>
                                <th class="px-6 py-2 text-base text-gray-500"></th>
                                <th class="px-6 py-2 text-base text-gray-500"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                        @foreach($customers as $a)
                        <tr class="whitespace-nowrap hover:bg-purple-100">
                            <td class="px-2 py-4 text-base text-gray-500"><a href="{{route('customer',['id'=>$a->id])}}">
                                    {{$a->id}}
                                </a></td>
                            <td class="px-7 py-4">
                                <div class="text-lg text-gray-900">
                                    <a href="{{route('customer',['id'=>$a->id])}}">
                                        {{$a->name}}
                                    </a>
                                </div>                   
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-lg text-gray-900">
                                    <a href="{{route('customer',['id'=>$a->id])}}">
                                        {{$a->phone}}
                                    </a>
                                </div>                   
                            </td>
                            <td class="px-6 py-4 text-base text-gray-500">
                                <a href="{{route('customer',['id'=>$a->id])}}">
                                    {{$a->email}}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-base text-gray-500">
                                <a href="{{route('customer',['id'=>$a->id])}}">
                                    {{$a->created_at}}
                                </a>
                            </td>
                            <td class="px-0 py-4 text-base text-gray-500">
                                <a href="{{route('customer/edit', ['id'=>$a->id])}}" class="px-4 py-1 text-sm text-white bg-blue-600 rounded">Edit</a>
                            </td>
                            <td class="px-0 py-4 text-base text-gray-500">
                            <form method="POST" action="{{route('customer_delete')}}" onsubmit="return ConfirmDelete( this )">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$a->id}}">
                                <button class="px-4 py-1 text-sm text-white bg-red-500 rounded" type="submit">Delete</button>
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
