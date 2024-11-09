<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Cargar Chart.js desde CDN -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>
<body class="flex flex-col h-screen select-none">
<section class="flex justify-between grow" x-data="{ showHamburger: false }">
    <div class="flex gap-x-5 w-full">
        <nav class="sidebar">
            <section :class="showHamburger ? 'shadow-md h-full' : ''" class="p-3">
                <i 
                @click="showHamburger = !showHamburger" 
                class="fa-solid fa-bars mb-4 sm:text-xl hover:text-slate-500 cursor-pointer"></i>

                <div class="flex flex-col gap-y-4 *:p-2 *:rounded-md" :class="showHamburger ? 'block' : 'hidden'" >
                    <a href="{{route('home')}}" class="{{request()->routeIs('home') ? 'bg-slate-300 font-bold' : 'hover:bg-slate-100'}}">Home</a>
                    <a href="{{route('tasks')}}" class="{{request()->routeIs('tasks') ? 'bg-slate-300 font-bold' : 'hover:bg-slate-100'}}">Tasks</a>
                    <a href="{{route('statistics')}}" class="{{request()->routeIs('statistics') ? 'bg-slate-300 font-bold' : 'hover:bg-slate-100'}}">Statistics</a>
                </div>
            </section>
        </nav>
        <div class="p-3 w-full">
            @yield('content')
        </div>
</div>
    <div class=" relative flex place-self-start flex-col p-3" x-data="{ showProfileOptions: false }">
        <div @click="showProfileOptions = !showProfileOptions" class="place-self-end rounded-full py-2 px-4 bg-red-50 cursor-pointer">
            {{ strtoupper(substr(Auth::user()->fname, 0, 1))}}
        </div>
        <div class="absolute top-14 right-5 shadow-md p-3 flex flex-col gap-y-3 w-60 bg-white *:p-2 *:rounded-md" :class="showProfileOptions ? 'block' : 'hidden'">
            <p class="truncate hover:bg-slate-200">{{Auth::user()->email}}</p>
            <a href="{{route('profile')}}" class="hover:bg-slate-200 cursor-pointer">Profile</a>
            <hr style="padding:0;">
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="w-full text-left hover:bg-slate-200 rounded-md p-2" type="submit">Logout</button>
            </form>
            
        </div>
    </div>
</section>
@include('layouts.footer')
@livewireScripts
</body>
</html>