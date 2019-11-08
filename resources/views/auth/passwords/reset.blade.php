@extends('layouts.start')

@section('content')
<div class="w-full h-full flex justify-center items-center">
    <div class="w-200 flex mt-4 flex-col px-2">
      <div class="w-full flex justify-center">
          <img src="{{ asset('assets/images/agni-logo.svg') }}" alt="" class=" h-full">
      </div>
      <div class="w-full flex justify-center mt-4 px-2">
        <p class="text-brand-500 text-2xl font-bold" >{{ __('New Password') }}</p>
      </div>
      <p class="text-lg leading-relaxed text-center mt-5 px-2" >{{ __('Enter your new password. Your password will be changed when you click on save.') }}</p>
      <form method="POST" action="{{ route('password.update') }}" class="w-full flex flex-col mt-3 px-2" >
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <p class="py-2 text-lg font-bold text-brand-600">{{ __('Email') }}</p>
        <input id="email" type="hidden" class="w-full h-12 rounded border border-gray-400 px-2 placholder-brand-600 @error('email') is-invalid @enderror" placeholder="Your email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback text-xs text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <p class="py-2 text-lg font-bold text-brand-600">{{ __('New Password') }}</p>
        <input  class="w-full h-12 rounded border border-gray-400 px-2 placholder-brand-600 @error('password') is-invalid @enderror" placeholder="New Password" id="password" type="password" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback text-xs text-red-500" role="alert">
             {{ $message }}
            </span>
        @enderror
        <p class="py-2 text-lg font-bold text-brand-600">{{ __('Confirm Password') }}</p>
        <input class="w-full h-12 rounded border border-gray-400 px-2 placholder-brand-600 @error('password') is-invalid @enderror" placeholder="Confirm Password" required autocomplete="new-password" id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">
        <div class="w-full flex justify-center mt-8">
          <button type="submit" class="w-36  bg-brand-500 p-3 rounded-full flex justify-center items-center cursor-pointer" >
            <p class="text-white text-center ">{{ __('save') }}</p>
          </button>
        </div>
        <div class="w-full flex justify-center mt-1">
          <a href="{{ route('login') }}" class=" text-brand-500 mt-4 text-center flex cursor-pointer font-semibold"><img src="{{ asset('assets/icons/arrow-right.svg') }}" alt="" class="flex "> {{ __('GO BACK TO LOGIN') }}</a>
        </div>
      </form>
    </div>
  </div>
@endsection
