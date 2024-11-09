@props(['name', 'class'=>''])
@error($name)
    <p class="text-red-500 {{$class}}">{{ $message }}</p>
@enderror