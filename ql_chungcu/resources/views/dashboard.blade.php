@inject('customer', 'App\Http\Controllers\CustomerController')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="border-b border-gray-200 shadow">
                    <table class="min-w-full text-center">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-2 text-base text-gray-500">Id</th>
                                <th class="px-6 py-2 text-base text-gray-500">Tên Căn Hộ</th>
                                <th class="px-6 py-2 text-base text-gray-500">Chủ Căn Hộ</th>
                                <th class="px-6 py-2 text-base text-gray-500">Thông Tin</th>
                                <th class="px-6 py-2 text-base text-gray-500">Tầng</th>
                                <th class="px-6 py-2 text-base text-gray-500"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                        @foreach($apartment as $a)
                        <tr class="whitespace-nowrap hover:bg-purple-100">
                            <td class="px-6 py-4 text-base text-gray-500"><a href="{{route('apartment',['id'=>$a->id])}}">
                                    {{$a->id}}
                                </a></td>
                            <td class="px-6 py-4">
                                <div class="text-lg text-gray-900">
                                    <a href="{{route('apartment',['id'=>$a->id])}}">
                                        {{$a->name}}
                                    </a>
                                </div>                   
                            </td>
                            @if($a->customer_id != NULL)
                            <td class="px-6 py-4 text-base text-gray-500">
                                <a href="{{route('apartment',['id'=>$a->id])}}">
                                {{ $customer->findCustomerName($a->customer_id)}}   
                                </a>
                            </td>
                            @else
                            <td class="px-6 py-4 text-base text-gray-500">
                                <a href="{{route('apartment',['id'=>$a->id])}}">
                                    Trống
                                </a>
                            </td>
                            @endif
                            <td class="px-6 py-4 text-base text-gray-500">
                                <a href="{{route('apartment',['id'=>$a->id])}}">
                                    {{$a->description}}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-base text-gray-500">
                                <a href="{{route('apartment',['id'=>$a->id])}}">
                                    {{$a->floor}}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-base text-gray-500">
                                <a href="{{route('apartment/edit', ['id'=>$a->id])}}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
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
