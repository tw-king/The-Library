@extends('layouts.master')

@section('content')
<div class="w3-container">
    <div class="libAdmin w3-card-4">
        <div class="w3-container w3-purple">
            <h3>
            {{ __('Login') }}
            </h3>
        </div>

        <div class="libAdminForm">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="w3-row rowSpacing">
                    <label for="email" class="w3-col s3 m2">{{ __('E-Mail Address') }}</label>

                    <div class="w3-col s6">
                        <input id="email" type="email" class="w3-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="w3-row rowSpacing">
                    <label for="password" class="w3-col s3 m2">{{ __('Password') }}</label>

                    <div class="w3-col s6">
                        <input id="password" type="password" class="w3-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="w3-row rowSpacing">
                    <div class="w3-col s6">
                        <input class="w3-check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="w3-row">
                    <div class="w3-col s6">
                        <button type="submit" class="w3-btn w3-green w3-round-xlarge">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
