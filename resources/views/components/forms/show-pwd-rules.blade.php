<div x-data="{ showInfo: false }" @click="showInfo = !showInfo" >
    <i class="fa-solid fa-circle-info hover:text-slate-500 text-slate-600 cursor-pointer""></i>
    <label :class="showInfo ? 'hidden' : 'span'" class="cursor-pointer hover:underline hover:underline-offset-4">About Passwords</label>
    <ul :class="showInfo ? 'block' : 'hidden'" >
        <li>Min: 8 characters</li>
        <li>Min: 1 Uppercase Letter</li>
        <li>Min: 1 Lowercase Letter</li>
    </ul>
</div>