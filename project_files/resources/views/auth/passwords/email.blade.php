@extends('layouts.master')

@section('content')
<div class="w3-container">
    <div class="libAdmin w3-card-4">
        <div class="w3-container w3-purple">
            <h3>
            {{ __('Reset Password') }}
            </h3>
        </div>

        <div class="libAdminForm">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
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

                <div class="w3-row mb-0">
                    <div class="w3-col s6">
                        <button type="submit" class="w3-btn w3-green w3-round-xlarge">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
