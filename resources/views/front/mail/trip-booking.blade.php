@component('mail::message')

#Package Inquiry Booking Email <br>

{{-- <b style="color: #e1a70b;">{{$booking->subject}}</b> <br> --}}


<b>Title:</b> {{$booking->user_title}} <br>
<b>From:</b> {{$booking->name}} <br>
<b>Email:</b> {{$booking->email}} <br>
<b>Phone:</b> {{$booking->phone}} <br>
<b>Country:</b> {{$booking->country}} <br>
{{-- <b>Address:</b> {{$booking->address}} <br> --}}
{{-- <b>Address:</b> {{$booking->address}} <br> --}}
<b>Price:</b> {{$booking->cost}} <br>
<b>Trip Name:</b> {{$booking->trip_name}} <br>
<b>No. of Person:</b> {{$booking->persons}} <br>
@if ($booking->departure_date)
    <b>Departure Date:</b> {{$booking->departure_date}} <br>
@endif
{{--<b>Payment Mode:</b> {{$booking->payment_mode}} <br>--}}
<b>Ip Address:</b> <a href="http://www.ip2location.com/demo/{{$booking->ipaddress}}" target="_blank">{{$booking->ipaddress}}</a><br>
<b>Message:</b><br>{{$msg}} <br><br>



Thanks<br>

<!-- {{ config('app.name') }} -->
@endcomponent
