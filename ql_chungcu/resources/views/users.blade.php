<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh Sách Quản Trị Viên') }}
        </h2>
    </x-slot>

    <div class="pt-4 pb-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{route('register')}}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded ml-auto">Add</a>
        </div>
    </div>

    <div class="pt-4 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="border-b border-gray-200 shadow">
                    <table class="min-w-full text-center">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-2 text-base text-gray-500">Id</th>
                                <th class="px-6 py-2 text-base text-gray-500">Tên</th>
                                <th class="px-6 py-2 text-base text-gray-500">Email</th>
                                <th class="px-6 py-2 text-base text-gray-500">Ngày đăng ký</th>
                                <th class="px-6 py-2 text-base text-gray-500"></th>
                                <th class="px-6 py-2 text-base text-gray-500"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                        @foreach($users as $a)
                        <tr class="whitespace-nowrap hover:bg-purple-100">
                            <td class="px-6 py-4 text-base text-gray-500"><a href="{{route('apartment',['id'=>$a->id])}}">
                                    {{$a->id}}
                                </a></td>
                            <td class="px-6 py-4">
                                <div class="text-lg text-gray-900">
                                    <a href="{{route('user',['id'=>$a->id])}}">
                                        {{$a->name}}
                                    </a>
                                </div>                   
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-lg text-gray-900">
                                    <a href="{{route('user',['id'=>$a->id])}}">
                                        {{$a->email}}
                                    </a>
                                </div>                   
                            </td>
                            <td class="px-6 py-4 text-base text-gray-500">
                                <a href="{{route('user',['id'=>$a->id])}}">
                                    {{$a->created_at}}
                                </a>
                            </td>
                            @if ($a->id != 1)
                                <td class="px-6 py-4 text-base text-gray-500">
                                <a href="{{route('user/edit', ['id'=>$a->id])}}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a> </td>
                                <td class="px-6 py-4 text-base text-gray-500">
                                    <form method="POST" action="{{route('user_delete')}}">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="id" value="{{$a->id}}">
                                        <button class="px-4 py-1 text-sm text-white bg-red-500 rounded" type="submit">Delete</button>
                                    </form>
                                </td>
                            @else
                            <td class="px-6 py-4 text-base text-gray-500"></td>
                            <td class="px-6 py-4 text-base text-gray-500"></td>
                            @endif
                            
                            
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