@component('mail::message')
# Welcome To {{ config('app.name') }}

<p>Hello {{ $user->name }}</p>
Click on the button below to verify your email.

@component('mail::button', ['url' => route('verifyEmail',$user->verify_token)])
Verify Email
@endcomponent

This mail has been sent to registered email <i>{{ $user->email }}</i>.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
