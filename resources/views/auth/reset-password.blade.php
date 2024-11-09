@extends('layouts.auth')

@section('title', 'Reset Password')
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

        <form action="{{route('password.update')}}" method="POST">
            @csrf
            <div class="flex flex-col gap-y-5 mb-3">
                <input type="hidden" name="token" value="{{ $token }}">
                <x-forms.general-input  placeholder="Email" name="email" type="email" inputClass="w-full" icon="envelope" />
                <x-forms.error-message name="email" />
                <x-forms.show-pwd-rules />
                <x-forms.pwd-input  placeholder="New password" name="password" inputClass="w-full" />
                <x-forms.error-message name="password" />
                <x-forms.pwd-input  placeholder="Confirm password" name="password_confirmation" inputClass="w-full" />
                <x-forms.error-message name="password_confirmation" />

            </div>

            <x-button.primary type="submit" buttonClass="w-full">
                Reset Password
            </x-button.primary>

        </form>


    </x-box>
@endsection

