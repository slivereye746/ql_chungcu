@inject('cs', 'App\Http\Controllers\CustomerController')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Detail') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-50 max-w-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="block text-lg mb-3">
                    Mã Báo Cáo: {{$report->id}} <br>  
                    Tên Báo Cáo: {{$report->title}} <br>
                    Người Báo Cáo: {{$report->reporter}} <br>
                    Số CMND: {{$report->cmnd}} <br>
                    Email: {{$report->email}} <br>
                    Số điện thoại: {{$report->phone}}
                    </p>
                    <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" >Thông tin:</label> 
                    <textarea disabled class="form-control block w-full px-3 py-1.5 text-lg font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" cols="50" rows="12" name="description" rows="3" placeholder="Apartment's Description">{{ $report->report_info }}</textarea>
                    </div>
                    <div class="max-w-7xl ml-auto py-6 sm:px-6 lg:px-8">
                        <form method="POST" action="{{route('report_delete')}}" onsubmit="return ConfirmDelete( this )">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{$report->id}}">
                                <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-auto" type="submit">Delete</button>
                        </form>
                        <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-2 rounded ml-auto" href="{{route('reports')}}">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>