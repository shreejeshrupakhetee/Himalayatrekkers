@component('mail::message')

#{{setting('site.title')}} From Enquiry Email <br>


<b>Subject / Package Name: {{$enquiry->subject}}</b> <br>

<b>From:</b> {{$enquiry->name}} <br>
<b>Email:</b> {{ $enquiry->email }} <br>
<b>Phone:</b> {{ $enquiry->phone }} <br>
<b>Message:</b> {{ $enquiry->message }} <br><br>




Thanks,<br>
Raju
<!-- {{ config('app.name') }} -->
@endcomponent

