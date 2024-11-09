@props(['divClass' => '', 'type' => 'text', 'name' => '', 'placeholder' => '', 'icon' => 'user', 'iconClass' => '', 'inputClass' => '', 'value' => null])

<div class="relative {{$divClass}}">
    <i class="fa-solid fa-{{$icon}} {{$iconClass}} absolute -translate-y-1/2 top-1/2 left-3 text-slate-400"></i>
    <input type="{{$type}}" class=" border border-gray-300 pl-9 py-2 rounded-md  focus:outline-gray-400  focus:ring-0 {{$inputClass}}" name="{{$name}}" placeholder="{{$placeholder}}" value="{{old($name, $value)}}" >
</div>
