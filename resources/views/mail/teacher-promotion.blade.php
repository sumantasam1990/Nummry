@component('mail::message')
# Admin,

Teacher Promotion Data

Name: {{ $mailData['name'] }} <br>
Insta: {{ $mailData['insta'] }} <br>
Email: {{ $mailData['email'] }} <br>
Phone: {{ $mailData['phone'] }} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
