<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm Khách Hàng Thứ Cấp') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 w-full max-w-xs">
                    <form class=" rounded pt-6 pb-1 mb-4" method="post" action="{{route('customerscd_addconfirm')}}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="id" value="NULL">
                        <input type="hidden" name="apartment_id" value="{{ $apartment_id }}">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Tên khách hàng</label>
                            <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" placeholder="Nguyễn Văn A">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="birthday">Ngày sinh</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" name="birthday" min="1900-01-01" max="2022-12-31">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="cmnd">Số CMND</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="cmnd">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Số điện thoại</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="phone">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="email">
                        </div>
                        <div class="mb-1 justify-self-center">
                            <button class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded ml-auto mt-4" type="submit">Submit</button>
                            <a class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded ml-auto mt-4" href="{{route('dashboard')}}">Cancel</a>
                        </div>
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
    </div>
</x-app-layout>
