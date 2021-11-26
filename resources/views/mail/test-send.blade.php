@component('mail::message')
# Configuration is successful

This is a test email. If you see this email, it means that your email service is configured correctly!

@component('mail::button', ['url' => config('app.app.url')])
Go Home
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
