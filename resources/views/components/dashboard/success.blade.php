@props(['name' => '', 'class' => ''])

@if(session($name))
<div 
    x-data="{ show: true }" 
    x-show="show" 
    class="animate-bounce flex justify-between items-center font-bold bg-green-400 text-white p-4 rounded mb-4 {{$class}}"
    x-init="setTimeout(() => show = false, 5000)"
    >
    <p>{{ session($name) }}</p>
    <i @click="show = false" class="fa-solid fa-circle-xmark text-xl cursor-pointer"></i>

</div>
@endif
<!--    x-init="setTimeout(() => show = false, 5000)"
-->