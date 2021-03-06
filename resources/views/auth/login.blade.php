@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="wrapper fadeInDown">
                <div id="formContent">
                    <!-- Tabs Titles -->

                    <!-- Icon -->
                    <div class="fadeIn first m-1">
                        <img src="{{asset('images/logoMajada.png')}}" id="icon" alt="User Icon" />
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="email" id="email" class="fadeIn third @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <input id="password" type="password" class="fadeIn third @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">
                        <button type="submit" class="btn btn-1">
                            {{ __('Login') }}
                        </button>
                        <!-- Remind Passowrd and Register -->
                        <div class="" id="formFooter">
                            <a class="underlineHover p-3" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            <a class="underlineHover p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection