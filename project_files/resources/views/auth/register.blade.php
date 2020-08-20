@extends('layouts.master')

@section('content')
<div class="container">
    <div class="libAdmin w3-card-4">
        <div class="w3-container w3-purple">
            <h3>
                {{ __('Register') }}
            </h3>
        </div>

        <div class="libAdminForm">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="w3-row rowSpacing">
                    <label for="name" class="w3-col s3 m3">{{ __('Name') }}</label>

                    <div class="w3-col s6">
                        <input id="name" type="text" class="w3-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="w3-row rowSpacing">
                    <label for="email" class="w3-col s3 m3">{{ __('E-Mail Address') }}</label>

                    <div class="w3-col s6">
                        <input id="email" type="email" class="w3-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="w3-row rowSpacing">
                    <label for="password" class="w3-col s3 m3">{{ __('Password') }}</label>

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
                    <label for="password-confirm" class="w3-col s3 m3">{{ __('Confirm Password') }}</label>

                    <div class="w3-col s6">
                        <input id="password-confirm" type="password" class="w3-input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="w3-row rowSpacing">
                    <div class="w3-col s3 m2">
                        <input class="w3-check" type="checkbox" name="is_librarian" id="is_librarian" value="1"> Librarian?
                    </div>
                </div>


                <div class="w3-row">
                    <div class="w3-col s3 m2">
                        <button type="submit" class="w3-btn w3-green w3-round-xlarge">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
