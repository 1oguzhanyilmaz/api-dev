@extends('layouts.app')

@section('content')
    <div class="mx-auto h-full flex justify-center items-center bg-gray-300">
        <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">

            <h1 class="text-white text-3xl pt-8">{{ __('Register') }}</h1>
            <div class="h-1 w-1/2 bg-blue-300 rounded-lg"></div>

            <form method="POST" action="{{ route('register') }}" class="pt-8">
                @csrf

                <div class="relative my-2">
                    <label for="name" class="absolute uppercase text-blue-500 text-xs font-bold pl-3 pt-2">Name</label>

                    <div class="">
                        <input id="name" type="text"
                               class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                               name="name" value="{{ old('name') }}" placeholder="Your name">

                        @error('name')
                        <span class="text-red-600 text-sm pt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="relative my-2">
                    <label for="email"
                           class="absolute uppercase text-blue-500 text-xs font-bold pl-3 pt-2">{{ __('E-Mail Address') }}</label>

                    <div class="">
                        <input id="email" type="email" placeholder="Your email" value="{{ old('email') }}"
                               class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                               name="email">

                        @error('email')
                        <span class="text-red-600 text-sm pt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="relative my-2">
                    <label for="password"
                           class="absolute uppercase text-blue-500 text-xs font-bold pl-3 pt-2">{{ __('Password') }}</label>

                    <div class="">
                        <input id="password" type="password" name="password" placeholder="Your password"
                               class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700">

                        @error('password')
                        <span class="text-red-600 text-sm pt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="relative my-2">
                    <label for="password-confirm" class="absolute uppercase text-blue-500 text-xs font-bold pl-3 pt-2">Re-enter
                        Password</label>

                    <div class="">
                        <input id="password-confirm" type="password" name="password_confirmation"
                               placeholder="Confirm password"
                               class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700">

                        @error('password')
                        <span class="text-red-600 text-sm pt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="my-2 pt-8">
                    <button type="submit"
                            class="w-full bg-gray-400 py-2 px-3 text-blue-800 text-left uppercase font-bold rounded text-gray-100">
                        {{ __('Register') }}
                    </button>
                </div>

                <div class="flex justify-between pt-8 text-white text-sm font-bold">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                    <a class="btn btn-link" href="{{ route('login') }}">
                        Login
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
