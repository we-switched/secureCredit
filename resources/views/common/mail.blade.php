@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}
We see you have applied for a {{$service}}.
Thank you for choosing Secure Credit!

We are reviewing your application and will get back to you shortly.

Sincerely,  
Secure Credit team.
@endcomponent