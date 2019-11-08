@extends('layouts.start')

@section('content')
<div class="w-full h-full flex justify-center items-center">
    <div class="w-200 flex mt-2 flex-col px-2">
      <div class="w-full flex justify-center">
        <img src=" {{ asset('assets/images/agni-logo.svg') }}" alt="" class=" h-full">
      </div>
      <div class="w-full flex justify-center mt-4 px-2">
        <p class="text-brand-500 text-2xl font-bold">{{ __('Login') }}</p>
      </div>
      <form method="POST" action="{{ route('login') }}" class="w-full flex flex-col mt-2 px-2" >
      @csrf
        <p class="py-2 text-lg font-bold text-brand-600">{{ __('Email') }}</p>
        <input id="email" type="email" class="w-full h-12 rounded border border-gray-400 px-2 placholder-brand-600" placeholder="Your email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback text-xs text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <p class="py-2 text-lg font-bold text-brand-600 mt-4">{{ __('Password') }}</p>
        <input id="password" type="password" class="w-full h-12 rounded border border-gray-400 px-2 placholder-brand-600" placeholder="Your password" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback text-xs text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-full flex justify-end">
          <a class="text-sm text-brand-500 mt-4 flex cursor-pointer font-semibold" href="{{ route('password.request') }}">
            <img src=" {{ asset('assets/icons/arrow-right.svg') }}" alt="" class="flex "> {{ __('FORGET PASSWORD') }}</a>
        </div>
        <div class="w-full flex justify-center mt-2">
          <button type="submit" class="w-36  bg-brand-500 p-3 rounded-full flex justify-center items-center cursor-pointer">
            <p class="text-white text-center ">{{ __('LOGIN') }}</p>
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
