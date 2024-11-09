@props(['divClass' => '', 'name' => '', 'placeholder' => '', 'iconClass' => '', 'inputClass' => ''])

<div x-data="{ showPassword: false }" class="relative {{$divClass}}">
    <!-- change between input type (text or password) -->
    <input 
        :type="showPassword ? 'text' : 'password'" 
        class="border border-gray-300 pl-9 py-2 rounded-md focus:outline-gray-400 focus:ring-0 {{$inputClass}}" 
        name="{{$name}}" 
        placeholder="{{$placeholder}}">

    <!-- open/close eye - show/hidde password-->
    <i 
        @click="showPassword = !showPassword" 
        :class="showPassword ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'" 
        class="{{$iconClass}} absolute -translate-y-1/2 top-1/2 left-3 cursor-pointer text-slate-400">
    </i>
</div>
