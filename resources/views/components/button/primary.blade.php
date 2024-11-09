@props(['type' => 'button', 'buttonClass' => ''])
<button type="{{$type}}" class="rounded-md bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-500 text-white px-4 py-2 {{$buttonClass}}">
{{$slot}}
</button>