<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;


use App\TripBooking;
use App\Contact;
use App\Departure;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\HomeService;
use App\Subscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token, x_csrftoken, X-XSRF-TOKEN');
class FrontEnquiryController extends Controller
{
    //

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }




    protected function res($data = [], $status = true, $message = '')
    {
        $data = [
            'payload' => $data,
            'status' => $status,
            'message' => $message
        ];
        return response()->json($data);
    }

    public function contact()
    {
        SEOMeta::setTitle('Contact Us');
        SEOMeta::setDescription('Have any issues ?No problem, Himalayan Trekkers head office is located at Thamel-26, Kathmandu, Nepal Tel +977-01-4414678. Feel very free to contact us.');
        SEOMeta::addKeyword(
            [
                'Contact us For tours & trek For Nepal Bhutan Tibet and India',

            ]
        );

        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addProperty('type', 'webpage');
        OpenGraph::setTitle('Contact Us');
        OpenGraph::setDescription('Have any issues ?No problem, Himalayan Trekkers head office is located at Thamel-26, Kathmandu, Nepal Tel +977-01-4414678. Feel very free to contact us.');

        OpenGraph::setUrl('https://himalayantrekkers.com/contact-us');
        OpenGraph::addImage('https://himalayantrekkers.com/images/himalayantrekkers.jpg');


        TwitterCard::setTitle('Contact Us');
        TwitterCard::setDescription('Have any issues ?No problem, Himalayan Trekkers head office is located at Thamel-26, Kathmandu, Nepal Tel +977-01-4414678. Feel very free to contact us.');


        return view('contactus');
    }

    public function postSubscribe(Request $request)
    {
        $v = Validator::make($request->all(), [
            'email' => 'required|min:2|max:50|email',

        ]);

        if ($v->fails()) {
            return $this->res($v->errors(), false, 'The email is required');
        }
        $data = $request->all();
        $result = $this->homeService->getSubscribeEmail($data['email']);


        if (!empty($result)) {
            return $this->res([], true, 'Your are already a subscriber!');

            // return redirect()->back()->back()->session()->flash('flash', 'Your are already subscribed into our newsletter');
        } else {
            if (Subscriber::create($request->except('_token'))) {
                Mail::send('front.mail.subscribe', $data, function ($message) use ($data) {
                    $message->from('himalayantrekkers@gmail.com', 'Himalayan Trekkers Subscription');
                    $message->to($data['email'])->subject('Newsletter Subscription');
                    $message->replyTo(setting('site.email'));
                });
                return $this->res([], true, 'Thanks For Subscribing, We will be posting!');
            }
        }
    }


    public function postContact(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|string',
            'email' => 'required|email',
            'phone' => 'required|max:255|string',
            'message' => 'required|max:500|string'


        ]);
        if ($validator->fails()) {
            return $this->res($validator->errors(), false, 'Something went wrong');
        }
        if (Contact::create($request->except('_token'))) {

            return $this->res([], true, 'Thanks You. We will be in your service asap');
        }
        // return $this->res([], true, 'Something went wrong. Please try again.');
    }



    public function fixeddeparture()
    {
        try {
            $query = request()->query('trip');
            $data = Crypt::decrypt($query);

            $departure = Departure::with('trip')->find($data);

            if ($departure->start_date <= date('Y-m-d')) {
                return redirect()->route('itinerary.index', ["slug" => $departure->trip->slug]);
            }

            return view('booknow', compact('departure'));
        } catch (\Throwable $th) {
            return $th;
            abort(404);
        }
    }

    public function inquirenow(Request $request)
    {
        $price = $request->price;
        $title = $request->title;
        return view('inquirenow', compact(['price', 'title']));
    }


    public function ampbooking(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255|string',
            'email' => 'required|email',
            'message' => 'required|max:500|string',
            'phone' => 'required|max:255|string',

        ]);
        $request['ipaddress'] = $request->getClientIp();
        if (TripBooking::create($request->except('_token'))) {
           return redirect()->route('thankyou')->with('flash', 'Thank you! A representative will contact you asap!');
        } else {
            return redirect()->back()->with('flash', 'Oops ! Something went wrong. Plz try again');
        }
    }


    public function ampbookinglg(Request $request)
    {

        $redirect_url = 'https://himalayantrekkers.com/thank-you';

        $this->validate($request, [
            'name' => 'required|max:255|string',
            'email' => 'required|email',
            'message' => 'required|max:500|string',
            'phone' => 'required|max:255|string',
			// 'persons' => 'required|max:100|numeric',
        ]);
        $request['ipaddress'] = $request->getClientIp();
        if (TripBooking::create($request->except('_token'))) {
            // return response()->json(null, 200);
            if (empty($redirect_url)) {
                header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
            } else {
                header("AMP-Redirect-To: " . $redirect_url);
                header("Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin");
            }
            echo json_encode(array('successmsg' => $request->name . ' My success message. [It will be displayed shortly(!) if with redirect]'));
            die();
        } else {
            return response()->json(null, 200);
        }
    }

    public function ampsubscribe(Request $request)
    {

        $redirect_url = 'https://himalayantrekkers.com/thank-you-for-subscribing';

        $this->validate($request, [
            'email' => 'required|email',

        ]);
        $data = $request->all();
        $result = $this->homeService->getSubscribeEmail($data['email']);
        if (!empty($result)) {
            return $this->res([], true, 'Your are already a subscriber!');
        }

        $request['ipaddress'] = $request->getClientIp();
        if (Subscriber::create($request->except('_token'))) {
            Mail::send('front.mail.subscribe', $data, function ($message) use ($data) {
                $message->from('himalayantrekkers@gmail.com', 'Himalayan Trekkers Subscription');
                $message->to($data['email'])->subject('Newsletter Subscription');
                $message->replyTo(setting('site.email'));
            });
            // return response()->json(null, 200);
            if (empty($redirect_url)) {
                header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
            } else {
                header("AMP-Redirect-To: " . $redirect_url);
                header("Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin");
            }
            echo json_encode(array('successmsg' => $request->name() . 'My success message. [It will be displayed shortly(!) if with redirect]'));
            die();
        } else {
            return response()->json(null, 200);
        }
    }



    public function thankyou()
    {
        return "thank you page";
    }



    public function postDeparture(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'required|max:255|string',
            'email' => 'required|email',
            'message' => 'required|max:500|string',
            'phone' => 'required|max:255|string',
            'country' => 'required|max:255|string',
            'persons' => 'required|max:100|numeric',
        ]);
        $request['ipaddress'] = $request->getClientIp();

        if (TripBooking::create($request->except('_token'))) {
            return redirect()->route('thankyou')->with('flash', 'Thank you! A representative will contact you asap!');
        } else {
            return redirect()->back()->with('flash', 'Oops ! Something went wrong. Plz try again');
        }
        return;
    }



    //itinerary
    /* backup
    public function getTrip($slug)
    {
        $trip = $this->homeService->getTripDetail($slug);

        if (!$trip) {
            return App::abort(404);
        } else {
            if (!$trip->itinerary) {
                $data['faqs'] = $trip->faq;
                $data['related_trips'] = $this->homeService->getRelatedTrips($trip['destination_id'], $trip['activity_id'], $trip['region_id'], $trip['id']);
                $data['departures'] = $trip->departure;
                $data['reviews'] = $trip->reviews;
                $data['aud'] = 100;
                $data['euro'] = 100;
                //   dd($data['abc']);

                return view('itinerary', $data)->with('detail', $trip);
            } else {
                $data['aud'] = 100;
                $data['euro'] = 100;
                //itin jodeko
                //   $data['highlights'] = json_decode($trip->itinerary->additional);


                $data['abc'] = json_decode($trip->itinerary->detail);
                //   dd($data['abc']);
                //   $data['equipment'] = json_decode($trip->itinerary->equipment);
                $data['faqs'] = json_decode($trip->itinerary->faqs);
                // dd($data['faqs']);
                $data['related_trips'] = $this->homeService->getRelatedTrips($trip['destination_id'], $trip['activity_id'], $trip['region_id'], $trip['id']);
                $data['departures'] = $trip->departure;
                $data['reviews'] = $trip->reviews;
                $data['map_image'] = $trip->itinerary->map_image;
                //   $data['first_map_image'] = $trip->itinerary->first_map_image;
                $data['hl'] = $trip->itinerary->highlights;
                $data['notes'] = $trip->itinerary->notes;

                $data['essential'] = $trip->itinerary->essential_info;
                // dd($data['hl']);
                $data['group_discount'] = json_decode($trip->itinerary->group_discount);
                return view('itinerary', $data)->with('detail', $trip);
            }
        }
    }
    */
}
