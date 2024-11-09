@props(['icon' => 'user', 'boxClass'=>'', 'iconClass' => '', 'textClass' => ''])
<div class="flex items-center gap-x-4 {{$boxClass}}">
    <i class="fa-solid fa-{{$icon}} {{$iconClass}} text-xl sm:text-2xl"></i>
    <h1 class= 'text-xl sm:text-2xl font-bold {{$textClass}}' >
        {{$slot}}
    </h1>
</div>
