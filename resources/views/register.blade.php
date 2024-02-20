@extends('layouts.home')
@section('title', 'ユーザ登録')
@include('layouts.head')
@section('content')

    <h1 class="title_reglog">ユーザ登録</h1>
    <div class="reglog_menu">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            
            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="reglog_under">
                <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="dec_button">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

@endsection
