@extends('layouts.dashboard')
@section('title', 'Specific Task')
@section('content')
    <x-dashboard.about icon="marker" iconClass="text-blue-400">
        Tasks
    </x-dashboard.about>

    <a href="{{route('tasks')}}">
        <x-button.primary buttonClass="mt-5 font-bold">
            Back To tasks
        </x-button.primary>
    </a>

    <x-box boxClass="mt-8">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-y-5">
                <div class="flex items-center gap-x-2">
                    <label class="font-bold text-nowrap" for="title">Task Name:</label>
                    <input id="title" name="title" value="{{ $task->title }}" type="text" class="w-full p-2 focus:outline-gray-300">
                </div>

                <div class="flex items-center gap-x-2">
                    <label class="font-bold text-nowrap" for="description">Description:</label>
                    <input id="description" name="description" value="{{ $task->description }}" type="text" class="w-full p-2 focus:outline-gray-300">
                </div>

                <div class="flex items-center gap-x-2">
                    <label class="font-bold text-nowrap" for="due_date">Due Date:</label>
                    <input id="due_date" name="due_date" value="{{ $task->due_date }}" type="date" class="p-2 focus:outline-gray-300">
                </div>

                <div class="flex items-center gap-x-2">
                    <label class="font-bold text-nowrap" for="status">Status:</label>

                    <select id="status" name="is_completed" class="p-3 bg-white rounded-md disabled:bg-white focus:outline-gray-300">
                        <option value="1" {{ $task->is_completed ? 'selected' : '' }}>Completed</option>
                        <option value="0" {{ !$task->is_completed ? 'selected' : '' }}>Not Yet</option>
                    </select>
                </div>
                
                <!-- Agrupamos ambos formularios en un div flex para alinearlos horizontalmente -->
                <div class="flex gap-x-4">
                    <button type="submit">
                        <i class="cursor-pointer fa-solid fa-rotate text-orange-300"></i>
                    </button>
                </form> <!-- Cerramos el primer formulario aquí -->
                
                <!-- Segundo formulario alineado al lado del primero -->
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <i class="fa-solid fa-trash cursor-pointer text-red-500"></i>
                    </button>
                </form>
            </div>
        </div>
    </x-box>
    
@endsection
