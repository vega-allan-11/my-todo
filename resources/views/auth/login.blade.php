@extends('layouts.auth')

@section('title', 'Login')
@section('header')
<x-auth.title icon="pen" iconClass="text-yellow-500" boxClass="mt-4 mb-10 justify-center">
    My ToDo
</x-auth.title>
@endsection

@section('content')
    <x-box boxClass="sm:w-4/6 md:w-4/12 lg:w-4/12 xl:w-4/12 2xl:w-1/4  sm:m-auto ">
        <x-auth.about textClass="text-center mb-5">
            Login
        </x-auth.about>

        <form action="{{route('login.store')}}" method="POST">
            @csrf
            <div class=" flex flex-col gap-y-6 mb-3">
                <x-forms.general-input  placeholder="Email" name="email" type="email" inputClass="w-full" icon="envelope" />
                <x-forms.pwd-input  placeholder="Password" name="password" inputClass="w-full" />
            </div>

            <x-forms.error-message name="email" />

            <x-button.primary type="submit" buttonClass="w-full">
                Login
            </x-button.primary>
        </form>

        <p class=" mt-3">Don't have an account? <a href="{{route('register.show')}}" class="text-blue-600 hover:underline underline-offset-4">Sign Up</a></p>
        <a href="{{route('password-request.show')}}" class="text-blue-600 hover:underline underline-offset-4">Recover your password</a>


    </x-box>
@endsection

