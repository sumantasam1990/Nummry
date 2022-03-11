@component('mail::message')
# Admin,

{{ $mailData['msg'] }}

Child's Name: {{ $mailData['name'] }}
Email: {{ $mailData['email'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
