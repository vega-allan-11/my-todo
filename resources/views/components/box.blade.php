@props(['boxClass' => ''])

<div class="shadow-md border p-5 {{$boxClass}}">
    {{$slot}}
</div>