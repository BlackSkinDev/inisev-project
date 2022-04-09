@component('mail::message')
# Hey Wale

The body of your message.

@component('mail::button', ['url' => ''])
Read Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
