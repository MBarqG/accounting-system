<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-zinc-600 text-black p-4 y-overflow-auto fixed h-screen">
            <a href="/" class="text-2xl font-bold">
                <h1 class="w-full py-2 px-4 mt-6 mb-6 text-center text-white text-2xl">Dashboard</h1>
            </a>
            <hr>
            <a href="{{ route('customer.create') }}"><button
                    class="w-full py-2 px-4 mt-10 mb-2 bg-slate-100 rounded"><img src="{{ asset('images/addC.png') }}"
                        class="h-8 pr-4 inline float-left">
                    <p class="float-left pt-1">Add Customer</p>
                </button></a>
            <a href="{{ route('payment.create') }}"><button class="w-full py-2 px-4 my-2 bg-slate-100 rounded"><img
                        src="{{ asset('images/addP.svg') }}" class="h-8 pr-4 inline float-left">
                    <p class="float-left pt-1">Add Payment</p>
                </button></a>
            <a href="{{ route('debt.create') }}"><button class="w-full py-2 px-4 my-2 bg-slate-100 rounded "><img
                        src="{{ asset('images/addO.png') }}" class="h-8 pr-4 inline float-left">
                    <p class="float-left pt-1">Add Order</p>
                </button></a>
            <a href="{{ route('charts.chart') }}"><button class="w-full py-2 px-4 my-2 bg-slate-100 rounded "><img
                        src="{{ asset('images/chartIcon.png') }}" class="h-8 pr-4 inline float-left">
                    <p class="float-left pt-1">View Charts</p>
                </button></a>
            <a href="{{ route('report.form') }}"><button class="w-full py-2 px-4 my-2 bg-slate-100 rounded "><img
                        src="{{ asset('images/ExportIcon.svg') }}" class="h-8 pr-4 inline float-left">
                    <p class="float-left pt-1">Export Report</p>
                </button></a>
        </aside>

        <!-- Main content -->
        <main id="mainContent" class="flex-1 bg-gray-100  ml-64 p-6 transition-all duration-300 y-overflow-auto">
            <!-- Hero -->
            <div class="flex justify-between items-center bg-white p-4 shadow">
                <a href="/" class="text-2xl font-bold">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 inline"> 
                </a>
                <div>
                    <form action="{{ route('search.customers') }}" method="GET" class="flex items-center">
                        <input type="text" name="search" placeholder="Search customers..."
                            class="border rounded py-2 px-4 w-96">
                        <button type="submit" class="flex items-center justify-center px-2">
                            <img src="{{ asset('images/searchIcon.png') }}" alt="search" class="h-8">
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main content section -->
            <div class="py-6">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
