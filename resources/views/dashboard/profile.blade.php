@extends('layouts.dashboard')
@section('title', 'Profile')
@section('content')
<x-dashboard.about icon="user" iconClass="text-blue-500">
    Manage Profile
</x-dashboard.about>
@yield('content')

<x-box boxClass="flex flex-col gap-y-3 general-info my-5 lg:w-1/2 lg:m-auto">
    <h2 class="text-lg">General Information</h2>
    <hr>
    <x-dashboard.success name="generalInfo" class=""/>

    <p class="italic">Update your general information</p>

    <form action="{{ route('profile.update-general-info') }}" method="POST">
        @method('PUT')
        @csrf
        <div class="flex flex-col gap-y-2 mb-3">
            <label for="fname">First Name</label>
            <x-forms.general-input value="{{auth()->user()->fname}}"  placeholder="First Name" name="fname" inputClass="w-full" />
        </div>
    
        <div class="flex flex-col gap-y-2 mb-3">
            <label for="lname">Last Name</label>
            <x-forms.general-input value="{{auth()->user()->lname}}"  placeholder="Last Name" name="lname" inputClass="w-full" />
        </div>

        <div class="flex flex-col gap-y-2 mb-3">
            <label for="email">Email</label>
            <x-forms.general-input type="email" value="{{auth()->user()->email}}"  icon="envelope" placeholder="Last Name" name="email" inputClass="w-full" />
        </div>



        <x-button.primary type="submit" buttonClass="bg-black hover:bg-black text-white focus:ring-4 focus:ring-slate-900">
            Save
        </x-button.primary>
    </form>

</x-box>

<x-box boxClass="flex flex-col gap-y-3 general-info mb-5 lg:w-1/2 lg:m-auto">
    <h2 class="text-lg">Update Password</h2>
    <hr>
    <x-dashboard.success name="pwd" class=""/>

    <p class="italic">Set a new password</p>

    <form action="{{ route('profile.update-password') }}" method="POST">
        @method('PUT')
        @csrf
    
        <div class="flex flex-col gap-y-2 mb-3">
            <label for="current_password">Current Password</label>
            <x-forms.pwd-input name="current_password" inputClass="w-full" />
        </div>
        <x-forms.error-message name="current_password" />

    
        <div class="flex flex-col gap-y-2 mb-3">
            <label for="password">New Password</label>
            <x-forms.pwd-input name="password" inputClass="w-full" />
        </div>

    
        <div class="flex flex-col gap-y-2 mb-3">
            <label for="password_confirmation">Confirm Password</label>
            <x-forms.pwd-input name="password_confirmation" inputClass="w-full" />
        </div>

        <x-forms.error-message name="password" />


    
        <x-button.primary type="submit" buttonClass="bg-black hover:bg-black text-white focus:ring-4 focus:ring-slate-900">
            Save
        </x-button.primary>
    </form>
    

</x-box>

<x-box boxClass="flex flex-col gap-y-3 general-info mb-5 lg:w-1/2 lg:m-auto">
    <h2 class="text-lg">Delete Account</h2>
    <hr>
    <p>Once your account is deleted, all of its resources and data will be permanently deleted. This action cannot be undone.</p>

    <form action="{{ route('profile.delete') }}" method="POST">
        @method('DELETE')
        @csrf
        <x-button.primary type="submit" buttonClass="bg-red-600 hover:bg-red-700 text-white focus:ring-4 focus:ring-red-900">
            Delete Account
        </x-button.primary>
    </form>

</x-box>

@endsection