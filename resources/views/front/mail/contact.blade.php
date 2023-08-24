@component('mail::message')

#Himalayan Trekkers Contact Form Inquiry <br>

@php
$type = $enquiry->subject;
if ($type == 1) {
    $type = 'Enquiry';
} else if ($type == 2){
    $type = 'Suggestion';
} else {
    $type = 'Feedback';
}

@endphp

<b>Subject : {{ $type }}</b> <br>

<b>From:</b> {{$enquiry->name}} <br>
<b>Email:</b> {{ $enquiry->email }} <br>
<b>Country:</b> {{ $enquiry->country }} <br>
<b>Phone:</b> {{ $enquiry->phone }} <br>
<b>Message:</b> {{ $enquiry->message }} <br><br>




Thanks,<br>
Developer
<!-- {{ config('app.name') }} -->
@endcomponent

