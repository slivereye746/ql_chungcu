<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh sách Báo Cáo') }}
        </h2>
    </x-slot>

    <div class="pt-4 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="border-b border-gray-200 shadow">
                    <table class="min-w-full text-center">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-2 text-base text-gray-500">Id</th>
                                <th class="px-6 py-2 text-base text-gray-500">Title</th>
                                <th class="px-6 py-2 text-base text-gray-500">Người Báo Cáo</th>
                                <th class="px-6 py-2 text-base text-gray-500">Số điện thoại</th>
                                <th class="px-6 py-2 text-base text-gray-500"></th>
                                <th class="px-6 py-2 text-base text-gray-500"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                        @foreach($reports as $r)
                        <tr class="whitespace-nowrap hover:bg-purple-100">
                            <td class="px-2 py-4 text-base text-gray-500"><a href="{{route('report_info',['id'=>$r->id])}}">
                                    {{$r->id}}
                                </a></td>
                            <td class="px-7 py-4">
                                <div class="text-lg text-gray-900">
                                    <a href="{{route('report_info',['id'=>$r->id])}}">
                                        {{$r->title}}
                                    </a>
                                </div>                   
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-lg text-gray-900">
                                    <a href="{{route('report_info',['id'=>$r->id])}}">
                                        {{$r->reporter}}
                                    </a>
                                </div>                   
                            </td>
                            <td class="px-6 py-4 text-base text-gray-500">
                                <a href="{{route('report_info',['id'=>$r->id])}}">
                                    {{$r->phone}}
                                </a>
                            </td>
                            <td class="px-0 py-4 text-base text-gray-500">
                                <a href="{{route('report_info', ['id'=>$r->id])}}" class="px-4 py-1 text-sm text-white bg-blue-600 rounded">View</a>
                            </td>
                            <td class="px-0 py-4 text-base text-gray-500">
                            <form method="POST" action="{{route('report_delete')}}" onsubmit="return ConfirmDelete( this )">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$r->id}}">
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
