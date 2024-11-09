@if($errors->any())
<div class="bg-red-500 text-white p-4 rounded mb-4 font-bold">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif