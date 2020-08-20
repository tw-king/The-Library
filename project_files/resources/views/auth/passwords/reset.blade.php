@extends('layouts.master')

@section('content')
<div class="container">
    <div class="libAdmin w3-card-4">
        <div class="w3-container w3-purple">
            <h3>
                {{ __('Reset Password') }}
            </h3>
        </div>

        <div class="libAdminForm">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="w3-row rowSpacing">
                    <label for="email" class="w3-col s3 m2">{{ __('E-Mail Address') }}</label>

                    <div class="w3-col s6">
                        <input id="email" type="email" class="w3-input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                        <input id="password" type="password" class="w3-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="w3-row rowSpacing">
                    <label for="password-confirm" class="w3-col s3 m2">{{ __('Confirm Password') }}</label>

                    <div class="w3-col s6">
                        <input id="password-confirm" type="password" class="w3-input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="w3-row rowSpacing">
                    <div class="w3-col s6">
                        <button type="submit" class="w3-btn w3-green w3-round-xlarge">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
