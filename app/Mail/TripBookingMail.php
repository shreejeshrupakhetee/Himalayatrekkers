<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\TripBooking;

class TripBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	private $booking;

    public function __construct(TripBooking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    	$subject = $this->booking->departure_date ? 'Fixed Departure Booking' : 'Inquiry';
        return $this->from($this->booking->email)
                    ->subject($subject . ' From '. $this->booking->name)
                    ->replyTo($this->booking->email)
                    ->markdown('front.mail.trip-booking')->with([
                        'booking'=>$this->booking,'msg'=>$this->booking->message,
                        'cost'=>$this->booking->price
                    ]);
    }
}
