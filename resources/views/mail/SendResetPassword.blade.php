@component('mail::message')
# Reset Password

Click on the button to reset your password.

@component('mail::button', ['url' => route('resetToken',$token) ])
Reset Password
@endcomponent

If you haven't requested for password reset, ignore this email.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
