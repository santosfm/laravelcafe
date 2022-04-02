@component('mail::message')
# Hello,

Thanks for getting in touch. Your email is important. Will get in touch as soon as I can.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
