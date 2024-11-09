@extends('layouts.dashboard')
@section('title', 'Home')
@section('content')
    <x-dashboard.about icon="rocket" iconClass="text-blue-500">
        Home
    </x-dashboard.about>
    @yield('content')
    <section class="w-full lg:w-3/4">


        <section class="completed">
            <h2 class="text-lg mt-5">Recently Completed</h2>

            @if ($completedTasks->isEmpty())
                <x-box boxClass="mb-5 w-full">
                    <p class="font-bold">You don't have completed task yet</p>
                </x-box>
            @else
                @foreach ($completedTasks as $task)
                    <x-box boxClass="mb-5 w-full">
                        <div class="flex items-center gap-x-3">
                            <i class="box fa-solid fa-circle-check text-green-500"></i>
                            <p>{{ $task->title }}</p>
                        </div>
                        <p class="font-semibold text-slate-400">{{ $task->due_date ? $task->due_date : 'No due date' }}</p>
                    </x-box>
                @endforeach
            @endif
        </section>

        <hr>
        <section class="completed">
            <h2 class="text-lg mt-5">Not completed yet</h2>
            @if ($incompleteTasks->isEmpty())
                <x-box boxClass="mb-5 w-full">
                    <p class="font-bold">You don't have completed task yet</p>
                </x-box>
            @else
                @foreach ($incompleteTasks as $task)
                    <x-box boxClass="mb-5 w-full">
                        <div class="flex items-center gap-x-3">
                            <i class="box fa-solid fa-circle-check text-green-500"></i>
                            <p>{{ $task->title }}</p>
                        </div>
                        <p class="text-red-500 font-semibold">{{ $task->due_date ? $task->due_date : 'No due date' }}</p>
                    </x-box>
                @endforeach
            @endif
        </section>
    </section>

@endsection
