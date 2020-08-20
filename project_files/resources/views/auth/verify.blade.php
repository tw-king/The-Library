@extends('layouts.master')

@section('content')
<div class="w3-container">
    <div class="libAdmin w3-card-4">
        <div class="w3-container w3-purple">
            <h3>
            {{ __('Verify Your Email Address') }}
            </h3>
        </div>

        <div class="libAdminForm">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="w3-btn w3-green w3-round-xlarge">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>
</div>
@endsection
