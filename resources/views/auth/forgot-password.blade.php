@extends('layouts.auth')

@section('title', 'Forgot password')
@section('header')
<x-auth.title icon="pen" iconClass="text-yellow-500" boxClass="mt-4 mb-10 justify-center">
    My ToDo
</x-auth.title>
@endsection

@section('content')
    <x-box boxClass="sm:w-4/6 md:w-4/12 lg:w-4/12 xl:w-4/12 2xl:w-1/4  sm:m-auto ">
        <x-auth.about textClass="text-center mb-5">
            Recover your password
        </x-auth.about>

        <form action="{{route('password-request.store')}}" method="POST">
            @csrf
            <div class=" mb-3">
                <x-forms.general-input  placeholder="Email" name="email" type="email" inputClass="w-full" icon="envelope" />
            </div>
            <x-forms.error-message name="email" class="mb-2" />
            <x-button.primary type="submit" buttonClass="w-full">
                Send a link to email
            </x-button.primary>

        </form>
    </x-box>
@endsection

