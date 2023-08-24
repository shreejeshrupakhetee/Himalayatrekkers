<?php

namespace App\Http\Controllers;

use App\Rules\Captcha;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use App\FrontPackage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use App\Http\Services\HomeService;
use App\Region;

use App\Review;
use App\Slider;
use App\Teamtag;

use App\Testimonial;
use App\TravelStyle;
use App\Trending;
use App\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use TCG\Voyager\Facades\Voyager;

use TCG\Voyager\Models\Post;

header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token, x_csrftoken, X-XSRF-TOKEN');
class FrontEndController extends Controller
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


    public function index()
    {

        SEOMeta::setTitle(setting('site.title'));
        SEOMeta::setDescription(setting('site.description'));
        SEOMeta::addKeyword(
            [
                'tour to nepal, bhutan tibet india, multicountry tour to nepal bhutan tibet india',

            ]
        );
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::setTitle(setting('site.title'));
        OpenGraph::setDescription(setting('site.description'));

        OpenGraph::setUrl('https://himalayantrekkers.com/');
        OpenGraph::addImage('https://himalayantrekkers.com/images/himalayantrekkers.jpg');
        TwitterCard::setTitle(setting('site.title'));
        TwitterCard::setDescription(setting('site.description'));


        // $packages = FrontPackage::findOrFail(1);
    	$packages = Cache::remember("frontpackages", Carbon::parse('5 days'), function () {
            return FrontPackage::findOrFail(1);
        });
    
        $featured_trips =  json_decode($packages->featured, true);
        $bestsellers =  json_decode($packages->bestsellers, true);
        $multicountries =  json_decode($packages->multicountry, true);
        $climbings =  json_decode($packages->climbing, true);
        $daytrips =  json_decode($packages->daytrips, true);

       $result1 = $this->getHomeTreks($featured_trips, 'featured');
        $result2 = $this->getHomeTreks($bestsellers, 'bestsellers');
        $result3 = $this->getHomeTreks($multicountries, 'multicountries');
        $result4 = $this->getHomeTreks($climbings, 'climbings');
        $result5 = $this->getHomeTreks($daytrips, 'daytrips');



        // dd($result5);

        $sliders = $this->getFeaturedSliders();

        $testimonials =
            $this->getFeaturedTestimonials(8);

        return view('welcome', compact('sliders', 'result1', 'result2', 'result3', 'result4', 'result5', 'testimonials'));
    }


    public function newTrip($slug)
    {
        $trip = Cache::rememberForever('trip.' . $slug, function () use ($slug) {
            return  $this->homeService->getTripDetail($slug);
        });

        if (!$trip) {
            return App::abort(404);
        } else {
			$data['departures'] = $trip->departures;
            SEOMeta::setTitle($trip->meta_title);
            SEOMeta::setDescription($trip->meta_description);
            SEOMeta::addMeta('article:modified_time', $trip->updated_at->toW3CString(), 'property');
            SEOMeta::addKeyword($trip->meta_keywords);
            OpenGraph::setDescription($trip->meta_description);
            OpenGraph::setTitle($trip->meta_title);
            OpenGraph::setUrl('https://himalayantrekkers.com/itinerary/' . $trip->slug);
            OpenGraph::addProperty('type', 'article');
            OpenGraph::addProperty('locale', 'en-US');
            if ($trip->pano == '1') {
                OpenGraph::addImage(Voyager::image($trip->image), ['height' => 668, 'width' => 1800]);
            }
            OpenGraph::addImage(Voyager::image($trip->image));

            TwitterCard::setTitle($trip->meta_title);
            TwitterCard::setDescription($trip->meta_metadescription);

            $relatedtours_step =  json_decode($trip->relatedtours, true);
            $relatedtreks_step =  json_decode($trip->relatedtreks, true);
            $relatedreads_step =  json_decode($trip->relatedreads, true);


            if ($relatedtours_step) {
                $result1 = $this->getFrontTreks($relatedtours_step, 5);
            } else {
                $result1 = [];
            }



            if ($relatedtreks_step) {
                $result2 = $this->getFrontTreks($relatedtreks_step, 5);
            } else {
                $result2 = [];
            }
            if ($relatedreads_step) {
                $result3 = $this->getFrontBlogs($relatedreads_step, 5);
            } else {
                $result3 = [];
            }



            if (!$trip->itinerary) {

                $data['faqs'] = $trip->faq;

                $data['reviews'] = $trip->reviews;

                return view('newtrip', $data)
                    ->with('detail', $trip)
                    ->with('result1', $result1)
                    ->with('result2', $result2)
                    ->with('result3', $result3);
            } else {

                //itin jodeko


                $data['abc'] = json_decode($trip->itinerary->detail);

                $data['faqs'] = json_decode($trip->itinerary->faqs);


                $data['reviews'] = $trip->reviews;
                $data['map_image'] = $trip->itinerary->map_image;

                $data['hl'] = $trip->itinerary->highlights;
                $data['notes'] = $trip->itinerary->notes;

                $data['essential'] = $trip->itinerary->essential_info;

                $data['group_discount'] = json_decode($trip->itinerary->group_discount);



                return view('newtrip', $data)
                    ->with('detail', $trip)
                    ->with('result1', $result1)
                    ->with('result2', $result2)
                    ->with('result3', $result3);;
            }
        }
    }

    public function frontsearch(Request $request)
    {
        $v = Validator::make($request->all(), [
            'q' => 'required|min:2|max:50',

        ]);
        $query = $request->q;
        if ($request->q == '') {
            return redirect()->back();
        }

        $databaseUsers = Trip::where('title', 'LIKE', '%' . $request->q . '%')->limit(10)->get();

        $resultUsers = [];
        foreach ($databaseUsers as $key => $row) {
            $user = [

                'title' => $row->title,
                'image' => Voyager::image($row->thumbnail('cropped')),
                'duration' => $row->duration,
                'slug' => $row->slug,
            ];
            array_push($resultUsers, $user);
        }
        return json_encode(array(
            "data" => $resultUsers,


        ));
    }




















    public function regions()
    {
        return view('trekkinginnepal');
    }

    public function allreviews()
    {
        // return view('allreviews');
        $get = ['title','created_at', 'person_name', 'trip_id', 'description', 'image'];
        $allreviews = Review::with(['tripId'])->where('publish', 1)->get($get);
        return view('allreviews', compact('allreviews'));
    }

    public function aboutus()
    {
        SEOMeta::setTitle('Team Profile | About Us');
        SEOMeta::setDescription('Himalayan Trekkers is the leading trek & tour operator providing an extra ordinary service for Nepal, Bhutan, Tibet and India with 500+ packages.');
        SEOMeta::addKeyword(
            [
                'about team members of himalayan trekkers',
                'treks and tour in nepal',
                'treks and tour in bhutan',
                'treks and tour in tibet',
                'treks and tour in india'


            ]
        );

        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::setTitle('Team Profile | About Us');
        OpenGraph::setDescription('Himalayan Trekkers is the leading trek & tour operator providing an extra ordinary service for Nepal, Bhutan, Tibet and India with 500+ packages.');

        OpenGraph::setUrl('https://himalayantrekkers.com/about-us');
        OpenGraph::addImage('/images/himalayantrekkers.jpg');


        TwitterCard::setTitle('Team Profile | About Us');
        TwitterCard::setDescription('Himalayan Trekkers is the leading trek & tour operator providing an extra ordinary service for Nepal, Bhutan, Tibet and India with 500+ packages.');

        $teamtags = Teamtag::with('teams')->get();
        return view('aboutus', compact('teamtags'));
    }

    public function reviews($id)
    {

        $post = Trip::where('id', $id)->first();
        if (!$post) {
            return  App::abort(404);
        }
        // $imagepath = Voyager::image();
        $post_id = $post->id;
        $result = Review::where('trip_id', $post_id)->paginate(5, ['id', 'title', 'person_name', 'rating', 'image', 'description', 'country'])->toArray();
        $result['items'] = $result['data'];
        $result['next'] = $result['next_page_url'];
        unset($result['data']);
        return $result;

        // dd($result);


    }







    public function ampsearch(Request $request)
    {
        $status = true;
        $query = $request->q;
        if ($request->q == '') {
            return redirect()->back();
        }
        $databaseUsers = Trip::where('publish', 1)->where('title', 'LIKE', '%' . $request->q . '%')->limit(10)->get();
        $resultUsers = [];
        foreach ($databaseUsers as $key => $row) {
            $user = [
                'name' => $row->title,
                'slug' => $row->slug,
                'image' => Voyager::image($row->image),
                'duration' => $row->duration,

            ];
            array_push($resultUsers, $user);
        }
        return response()->json([
            'items' => $resultUsers
        ], 200);
    }





    public function getPage(Request $request, $slug = null)
    {

        if (!$slug) {
            $slug = $request->segments()[0];
        }

        $data = $this->homeService->getPageDetail($slug);
        if (!$data) {
            return App::abort(404);
        }
        SEOMeta::setTitle($data->metatitle);
        SEOMeta::setDescription($data->metadisc);
        SEOMeta::addMeta('article:modified_time', $data->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($data->metakey);
        OpenGraph::setTitle($data->meta_title);
        OpenGraph::setDescription($data->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/' . $data->slug);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage('/images/himalayantrekkers.jpg');
        TwitterCard::setTitle($data->metatitle);
        TwitterCard::setDescription($data->metadisc);

        try {
            return view('pages.general' . $slug, $data);
        } catch (\Exception $e) {
            return view('pages.general', $data);
        }
    }



    public function search(Request $request)
    {
        // dd($request->all());
        $status = true;
        $query = $request->q;
        if ($request->q == '') {
            return redirect()->back();
        }
        $databaseUsers = Trip::where('publish', 1)->where('title', 'LIKE', '%' . $request->q . '%')->limit(10)->get();


        $resultUsers = [];
        foreach ($databaseUsers as $key => $row) {
            $user = [
                'id' => $row->id,
                'name' => $row->title,
                'slug' => $row->slug,

            ];
            array_push($resultUsers, $user);
        }
        return json_encode(array(
            "items" => $resultUsers,


        ));
    }




    public function getDestinations()
    {

        return view('countries');
    }
    public function getActivities()
    {

        return view('activities');
    }


    public function getTravelstyles()
    {
        return view('travelstyles');
    }

    public function legal()
    {
        SEOMeta::setTitle('Legal Documents');
        SEOMeta::setDescription('Himalanyan Trekkers is a recognised travel planner company headquarted in Nepal. So, feel safe to book with us.');
        SEOMeta::addKeyword(
            [
                'legal documents of Himalayan Trekkers',

            ]
        );

        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::setTitle('Legal Documents');
        OpenGraph::setDescription('Himalanyan Trekkers is a recognised travel planner company headquarted in Nepal. So, feel safe to book with us.');

        OpenGraph::setUrl('https://himalayantrekkers.com/legal-documents');
        OpenGraph::addImage('/images/himalayantrekkers.jpg');


        TwitterCard::setTitle('Legal Documents');
        TwitterCard::setDescription('Himalanyan Trekkers is a recognised travel planner company headquarted in Nepal. So, feel safe to book with us.');


        return view('legal');
    }


    //singleactivity
    public function singleactivity($actSlug)
    {
        $activity = $this->homeService->getActivityDetail($actSlug);
        // dd($activity);
        if (!$activity) {
            return App::abort(404);
        }
        SEOMeta::setTitle($activity->metatitle);
        SEOMeta::setDescription($activity->metadisc);
        SEOMeta::addMeta('article:modified_time', $activity->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($activity->metakey);
        OpenGraph::setTitle($activity->metatitle);
        OpenGraph::setDescription($activity->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/activities/' . $activity->slug);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($activity->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($activity->metatitle);
        TwitterCard::setDescription($activity->metadisc);

        return view('singleactivity')
            ->with('detail', $activity);
    }
    //singleregion
    public function singleregion($regSlug)
    {

        $region = Cache::rememberForever('region.' . $regSlug, function () use ($regSlug) {
            return Region::where('slug', $regSlug)->with([
                'trips' => function ($q) {
                    $q->select('id', 'region_id', 'title', 'slug', 'image', 'duration', 'price', 'discount')->with('reviews');
                },
            ])->firstOrFail();
        });



        if (!$region) {
            return App::abort(404);
        }
        SEOMeta::setTitle($region->metatitle);
        SEOMeta::setDescription($region->metadisc);
        SEOMeta::addMeta('article:modified_time', $region->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($region->metakey);
        OpenGraph::setTitle($region->meta_title);
        OpenGraph::setDescription($region->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/trekking-in-nepal/' . $region->slug);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($region->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($region->metatitle);
        TwitterCard::setDescription($region->metadisc);


        return view('singleregion')
            ->with('detail', $region);
    }


    //singletravelstyle
    public function singletravel($travelSlug)
    {
        $travelstyle = Cache::rememberForever('region.' . $travelSlug, function () use ($travelSlug) {
            return TravelStyle::where('slug', $travelSlug)->with([
                'trips' => function ($q) {
                    $q->select('trip_id', 'title', 'slug', 'image', 'duration', 'price', 'discount');
                },
            ])->firstOrFail();
        });

        // $travelstyle = Cache::rememberForever('region.' . $travelSlug, function () use ($travelSlug) {
        //     return TravelStyle::where('slug', $travelSlug)->with('trips')->first();
        // });

        //        print_r($travelstyle); exit;
        if (!$travelstyle) {
            return App::abort(404);
        } else {
            SEOMeta::setTitle($travelstyle->metatitle);
            SEOMeta::setDescription($travelstyle->metadisc);
            SEOMeta::addMeta('article:modified_time', $travelstyle->updated_at->toW3CString(), 'property');
            SEOMeta::addKeyword($travelstyle->metakey);
            OpenGraph::setTitle($travelstyle->meta_title);
            OpenGraph::setDescription($travelstyle->metadisc);
            OpenGraph::setUrl('https://himalayantrekkers.com/travelstyle/' . $travelstyle->slug);
            OpenGraph::addProperty('type', 'article');
            OpenGraph::addProperty('locale', 'en-US');
            OpenGraph::addImage(Voyager::image($travelstyle->image), ['height' => 668, 'width' => 1366]);
            TwitterCard::setTitle($travelstyle->metatitle);
            TwitterCard::setDescription($travelstyle->metadisc);

            $data = $this->homeService->getTravelData($travelstyle['id']);
            //    print_r($data);exit;
            return view('singletravelstyle', $data)->with('detail', $travelstyle);
        }
    }

    public function faqs()
    {
        SEOMeta::setTitle('Frequently Asked Questions Nepal Bhutan Tibet India');
        SEOMeta::setDescription('Have any question in mind. Himalaya Trekkers has bunch of questions answered already Didnt, find one? Just message us and we will follow up');
        SEOMeta::addKeyword(
            [
                'frequently asked qeustions, faqs for nepal bhutan tibet and india',

            ]
        );

        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::setTitle('Frequently Asked Questions Nepal Bhutan Tibet India');
        OpenGraph::setDescription('Have any question in mind. Himalaya Trekkers has bunch of questions answered already Didnt, find one? Just message us and we will follow up');

        OpenGraph::setUrl('https://himalayantrekkers.com/faqs');
        OpenGraph::addImage('/images/himalayantrekkers.jpg');


        TwitterCard::setTitle('Frequently Asked Questions Nepal Bhutan Tibet India');
        TwitterCard::setDescription('Have any question in mind. Himalaya Trekkers has bunch of questions answered already Didnt, find one? Just message us and we will follow up');

        return view('faqs');
    }






    // public function getTrip($slug)
    // {


    //     $trip = Cache::rememberForever('itin.' . $slug, function () use ($slug) {
    //         return  $this->homeService->getTripDetail($slug);
    //     });

    //     if (!$trip) {
    //         return App::abort(404);
    //     } else {

    //         SEOMeta::setTitle($trip->meta_title);
    //         SEOMeta::setDescription($trip->meta_description);
    //         SEOMeta::addMeta('article:modified_time', $trip->updated_at->toW3CString(), 'property');
    //         SEOMeta::addKeyword($trip->meta_keywords);
    //         OpenGraph::setDescription($trip->meta_description);
    //         OpenGraph::setTitle($trip->meta_title);
    //         OpenGraph::setUrl('https://himalayantrekkers.com/itinerary/' . $trip->slug);
    //         OpenGraph::addProperty('type', 'article');
    //         OpenGraph::addProperty('locale', 'en-US');
    //         if ($trip->pano == '1') {
    //             OpenGraph::addImage(Voyager::image($trip->image), ['height' => 668, 'width' => 1800]);
    //         }
    //         OpenGraph::addImage(Voyager::image($trip->image));

    //         TwitterCard::setTitle($trip->meta_title);
    //         TwitterCard::setDescription($trip->meta_metadescription);


    //         if (!$trip->itinerary) {

    //             $data['faqs'] = $trip->faq;
    //             $data['departures'] = $trip->departure;
    //             $data['reviews'] = $trip->reviews;

    //             return view('itinerary', $data)
    //                 ->with('detail', $trip);
    //         } else {

    //             //itin jodeko
    //             $data['abc'] = json_decode($trip->itinerary->detail);
    //             $data['faqs'] = json_decode($trip->itinerary->faqs);
    //             $data['departures'] = $trip->departure;
    //             $data['reviews'] = $trip->reviews;
    //             $data['map_image'] = $trip->itinerary->map_image;

    //             $data['hl'] = $trip->itinerary->highlights;
    //             $data['notes'] = $trip->itinerary->notes;

    //             $data['essential'] = $trip->itinerary->essential_info;

    //             $data['group_discount'] = json_decode($trip->itinerary->group_discount);



    //             return view('itinerary', $data)
    //                 ->with('detail', $trip);
    //         }
    //     }
    // }



    public function getFeaturedTestimonials($count)
    {
        return Cache::remember('first.testimonials', Carbon::parse('5 days'), function () use ($count) {
            $get = ['id', 'name', 'content', 'country', 'image'];
            return Testimonial::limit($count)->orderBy('id', 'DESC')->get($get);
        });
    }


    public function getFrontTreks($ids, $limit = 6)
    {

            $get = ['id', 'title', 'duration', 'price', 'image', 'slug', 'tripgrade', 'discount'];
            return Trip::whereIn('id', $ids)->limit($limit)->get($get);

    }
    public function getFrontBlogs($ids, $limit = 6)
    {

            $get = ['id','title', 'image', 'slug', 'body'];
            return Post::where('status', 'PUBLISHED')->whereIn('id', $ids)->limit($limit)->get($get);
        
    }

public function getHomeTreks($ids, $key, $limit = 6)
    {
        return Cache::remember("'first.$key'", Carbon::parse('5 days'), function () use ($ids, $limit) {

            $get = ['id', 'title', 'duration', 'price', 'image', 'slug', 'tripgrade', 'discount'];
            return Trip::whereIn('id', $ids)->limit($limit)->get($get);
        });
    }


    public function getFeaturedSliders()
    {
        return Cache::remember('first.sliders', Carbon::parse('5 days'), function () {
            return Slider::where('publish', 1)->get(
                [
                    'image',
                    'description',
                    'title',
                    'link'
                ]
            );
        });
    }
}
