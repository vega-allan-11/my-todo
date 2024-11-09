@props(['icon' => 'user', 'boxClass'=>'', 'iconClass' => '', 'textClass' => ''])
<div class="flex items-center gap-x-4 text-3xl {{$boxClass}}">
    <h1 class= 'text-xl sm:text-3xl font-bold {{$textClass}}' >
        {{$slot}}
    </h1>
    <i class="fa-solid fa-{{$icon}} {{$iconClass}}"></i>
</div>
