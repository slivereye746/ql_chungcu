<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">


            <!-- Page Heading -->
            <header class="bg-white shadow">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-base text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-base text-black-900 dark:text-black-500 underline">Log in</a>
                        <!-- normal register button.... nah we didn't use it here
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                         -->
                        
                    @endauth
                </div>
            @endif
            </header>

            <!-- Page Content -->
            <main>
            <div class="pt-12 pb-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                        <form class=" rounded pt-6 pb-1 mb-4" method="post" action="{{route('report_add')}}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <p class="text-center font-bold text-xl">Form Thông Tin</p>
                        <input type="hidden" name="id" value="NULL">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-base font-bold mb-2" for="title">Yêu cầu của bạn:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="title">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-base font-bold mb-2" for="report_info">Nội dung cụ thể:</label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-40" name="report_info"></textarea>
                        </div><br>
                        <hr><br>
                        <p class="text-red-800">Vui lòng điền đúng thông tin cá nhân để tiến hành gửi phản ánh đế ban quản lý!</p> <br>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-base font-bold mb-2" for="reporter">Tên khách hàng</label>
                            <input class="shadow appearance-none border rounded w-full pb-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="reporter" placeholder="Nguyễn Văn A">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-base font-bold mb-2" for="cmnd">Số CMND</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="cmnd">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-base font-bold mb-2" for="phone">Số điện thoại</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="phone">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-base font-bold mb-2" for="email">Email</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="email">
                        </div>
                        
                        <div class="mb-1 justify-self-center">
                            <button class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded ml-auto mt-4" type="submit">Submit</button>
                            <a class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded ml-auto mt-4" href="/">Cancel</a>
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
                    <div>
                        <div class=" bg-green-300 p-3">
                            <ul class="list-disc list-inside">
                                {{ $mess }}
                            </ul>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
            </main>
        </div>
    </body>
</html>
