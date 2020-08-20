@extends('layouts.master')

@section('content')
<div class="w3-container">
    <div class="libAdmin w3-card-4">
        <div class="w3-container w3-purple">
            <h3>
            {{ __('Confirm Password') }}
            </h3>
        </div>

        <div class="libAdminForm">
            {{ __('Please confirm your password before continuing.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

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

                <div class="w3-row mb-0">
                    <div class="w3-col s6">
                        <button type="submit" class="w3-btn w3-green">
                            {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="w3-btn w3-green w3-round-xlarge" href="{{ route('password.request') }}">
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
