@component('mail::message')
# Hi {{ $mailData['name'] }}

{{ $mailData['s_name'] }} is inviting you to join Nummry.com. Please click below "Accept Invitation" button to accept the invitation.

@component('mail::button', ['url' => $mailData['url']])
Accept Invitation
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
