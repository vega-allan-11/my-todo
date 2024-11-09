@extends('layouts.dashboard')
@section('title', 'General tasks')
@section('content')
    <x-dashboard.about icon="marker" iconClass="text-blue-400">
        Tasks
    </x-dashboard.about>

    <x-dashboard.success name="success" class="my-5 min-[900px]:w-1/4" />

    <div x-data="{ addingNewTask: false }" class="mt-5">

        <form action="{{ route('tasks') }}" method="GET"
            class="mb-2 flex flex-col gap-y-3 min-[900px]:justify-between min-[900px]:flex-row">

            <div class="flex flex-col items-start gap-3 min-[575px]:flex-row">


                <!-- Campo de búsqueda -->
                <x-forms.general-input icon="magnifying-glass" placeholder="Search" name="search" divClass="mb-2"
                    :value="request('search')" />

                <!-- Botón de búsqueda -->
                <x-button.primary type="submit" buttonClass="font-bold bg-orange-400 hover:bg-orange-500">
                    Search
                </x-button.primary>

                <div @click="addingNewTask = true">
                    <x-button.primary @click="addingNewTask = true" buttonClass="font-bold flex items-center gap-x-2">
                        <span>New Task</span>
                        <i class="fa-solid fa-circle-plus cursor-pointer"></i>
                    </x-button.primary>
                </div>
            </div>

            <div class="min-[330px]:flex-row">

                <!-- Filtro de estado -->
                <select name="filter" class="p-2 rounded-full bg-white border cursor-pointer hover:bg-slate-50"
                    onchange="this.form.submit()">
                    <option value="" {{ request('filter') === null ? 'selected' : '' }}>Filter by</option>
                    <option value="1" {{ request('filter') === '1' ? 'selected' : '' }}>Completed</option>
                    <option value="0" {{ request('filter') === '0' ? 'selected' : '' }}>Not Yet</option>
                </select>

                <!-- Ordenamiento -->
                <select name="order" class="p-2 rounded-full bg-white border cursor-pointer hover:bg-slate-50"
                    onchange="this.form.submit()">
                    <option value="" {{ request('order') === null ? 'selected' : '' }}>Order by</option>
                    <optgroup label="Ascending">
                        <option value="asc_title" {{ request('order') === 'asc_title' ? 'selected' : '' }}>Title</option>
                        <option value="asc_due_date" {{ request('order') === 'asc_due_date' ? 'selected' : '' }}>Due Date
                        </option>
                    </optgroup>
                    <optgroup label="Descending">
                        <option value="des_title" {{ request('order') === 'des_title' ? 'selected' : '' }}>Title</option>
                        <option value="des_due_date" {{ request('order') === 'des_due_date' ? 'selected' : '' }}>Due Date
                        </option>
                    </optgroup>
                </select>

            </div>

        </form>


        <x-forms.error-message name="title" />
        <div class="overflow-x-auto">
            <table class="border-collapse w-full mb-10">
                <thead>
                    <tr class="bg-slate-100 *:p-3 *:text-left">
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fila de nueva tarea (visible solo cuando `addingNewTask` es true) -->
                    <tr x-show="addingNewTask" x-data="{ title: '', description: '', due_date: '', is_completed: 0 }">
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                            <td class="border-b ">
                                <input x-model="title" name="title" type="text"
                                    class="p-3 w-full focus:outline-gray-300" placeholder="New task title">
                            </td>
                            <td class="border-b">
                                <input x-model="description" name="description" type="text"
                                    class="p-3 w-full focus:outline-gray-300" placeholder="Description">
                            </td>
                            <td class="border-b">
                                <input x-model="due_date" name="due_date" type="date" class="p-3 focus:outline-gray-300">
                            </td>
                            <td class="border-b">
                                <select x-model="is_completed" name="is_completed"
                                    class="p-3 bg-white rounded-md focus:outline-gray-300">
                                    <option value="0">Not Yet</option>
                                    <option value="1">Completed</option>
                                </select>
                            </td>
                            <td class="border-b">
                                <!-- Botón de guardar (enviar el formulario) -->
                                <button type="submit" @click="addingNewTask = false">
                                    <i class="fa-solid fa-check text-green-500"></i>
                                </button>
                            </td>
                            <td class="border-b">
                                <!-- Botón de cancelar -->
                                <button type="button" @click="addingNewTask = false">
                                    <i class="fa-solid fa-times text-red-500"></i>
                                </button>
                            </td>
                            <td class="border-b"></td>
                        </form>
                    </tr>

                    <!-- Mostrar las tareas filtradas -->
                    @foreach ($tasks as $task)
                        <tr x-data="{ isEditing: false }">
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td class="border-b">
                                    <input name="title" value="{{ $task->title }}" type="text"
                                        class="p-3 w-full disabled:bg-white focus:outline-gray-300">
                                </td>
                                <td class="border-b">
                                    <input name="description" value="{{ $task->description }}" type="text"
                                        class="p-3 w-full disabled:bg-white focus:outline-gray-300">
                                </td>
                                <td class="border-b">
                                    <input name="due_date" value="{{ $task->due_date }}" type="date"
                                        class="p-3 disabled:bg-white focus:outline-gray-300">
                                </td>
                                <td class="border-b">
                                    <select name="is_completed"
                                        class="p-3 bg-white rounded-md disabled:bg-white focus:outline-gray-300">
                                        <option value="1" {{ $task->is_completed ? 'selected' : '' }}>Completed
                                        </option>
                                        <option value="0" {{ !$task->is_completed ? 'selected' : '' }}>Not Yet
                                        </option>
                                    </select>
                                </td>
                                <td class="border-b">
                                    <!-- Botón de edición -->
                                    <button type="submit">
                                        <i class="cursor-pointer fa-solid fa-rotate text-orange-300"></i>
                                    </button>
                                </td>
                                <td class="border-b">
                                    <!-- Botón de edición -->
                                    <a href="{{ route('tasks.showSpecific', $task->id) }}" id="{{ $task->id }}">
                                        <i class="cursor-pointer fa-solid fa-up-right-from-square text-slate-800"></i>
                                    </a>
                                </td>
                            </form>
                            <td class="border-b">
                                <!-- Formulario de eliminación -->
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="filter" value="{{ request('filter') }}">
                                    <input type="hidden" name="order" value="{{ request('order') }}">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <input type="hidden" name="page" value="{{ request('page') }}">
                                    <!-- Agregar el número de página actual -->
                                    <button type="submit">
                                        <i class="fa-solid fa-trash cursor-pointer text-red-500"></i>
                                    </button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tasks->links() }}
        </div>
    </div>
@endsection
