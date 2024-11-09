@extends('layouts.auth')

@section('title', 'Sign Up')
@section('header')
<x-auth.title icon="pen" iconClass="text-yellow-500" boxClass="mt-4 mb-10 justify-center">
    My ToDo
</x-auth.title>
@endsection

@section('content')
    <x-box boxClass="sm:w-4/6 md:w-4/12 lg:w-4/12 xl:w-4/12 2xl:w-1/4  sm:m-auto ">
        <x-auth.about textClass="text-center mb-5">
            Sign Up
        </x-auth.about>

        <form action="{{route('register.store')}}" method="POST">
            @csrf
            <div class=" flex flex-col gap-y-6 mb-3">
                <x-forms.general-input  placeholder="First Name" name="fname" inputClass="w-full" />
                <x-forms.error-message name="fname" />
                <x-forms.general-input  placeholder="Last Name" name="lname" inputClass="w-full" />
                <x-forms.error-message name="lname" />
                <x-forms.general-input  placeholder="Email" name="email" inputClass="w-full" icon="envelope" />
                <x-forms.error-message name="email" />
                <x-forms.show-pwd-rules />
                <x-forms.pwd-input  placeholder="Password" name="password" inputClass="w-full" />
                <x-forms.error-message name="password" />
                <x-forms.pwd-input  placeholder="Confirm Password" name="password_confirmation" inputClass="w-full" />
                <x-forms.error-message name="password_confirmation" />
            </div>

            <x-button.primary type="submit" buttonClass="w-full">
                Register
            </x-button.primary>

        </form>

        <p class=" mt-3">Already have an account? <a href="{{route('login')}}" class="text-blue-600 hover:underline underline-offset-4">Login</a></p>

    </x-box>
@endsection

