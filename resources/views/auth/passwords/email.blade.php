@extends('layouts.start')

@section('content')
<div class="w-full h-full flex justify-center items-center">
    <div class="w-200 flex mt-4 flex-col px-2">
      <div class="w-full flex justify-center">
        <img src="{{ asset('assets/images/agni-logo.svg') }}" alt="" class=" h-full">
      </div>
      <div class="w-full flex justify-center mt-4 px-2">
        <p class="text-brand-500 text-2xl font-bold" >{{ __('Forget Password') }}</p>
      </div>
      <p class="text-lg leading-relaxed text-center mt-5 px-2">{{ __('Enter your email and we will send you a link to reset your password. this link is valid for 24h.') }} </p>
        @if (session('status'))
            <div class="alert alert-success w-full text-xs text-red-500" role="alert">
                {{ session('status') }}
            </div>
        @endif
      <form method="POST" action="{{ route('password.email') }}" class="w-full flex flex-col mt-3 px-2" >
      @csrf
        <p class="py-2 text-lg font-bold text-brand-600">{{ __('Email') }}</p>
        <input id="email" type="email" class="w-full h-12 rounded border border-gray-400 px-2 placholder-brand-600 @error('email') is-invalid @enderror" placeholder="Your email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback text-xs text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="w-full flex justify-center mt-8">
          <button type="submit" class="w-36  bg-brand-500 p-3 rounded-full flex justify-center items-center cursor-pointer" >
            <p class="text-white text-center ">{{ __('SUBMIT') }}</p>
          </button>
        </div>
        <div  class="w-full flex justify-center mt-1">
          <a href="{{ route('login') }}" class="text-brand-500 mt-4 text-center flex cursor-pointer font-semibold"><img src=" {{ asset('assets/icons/arrow-right.svg') }}" alt="" class="flex "> {{ __('GO BACK TO LOGIN') }}</a>
        </div>
      </form>
    </div>
  </div>

@endsection
