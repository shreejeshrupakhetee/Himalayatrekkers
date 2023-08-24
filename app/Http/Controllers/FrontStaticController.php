<?php

namespace App\Http\Controllers;

use App\Region;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use TCG\Voyager\Facades\Voyager;
use App\ModelFinder;
use App\Trip;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class FrontStaticController extends Controller
{
    //
    use ModelFinder;
    public function nepalpackage()
    {
        $detail = Region::findOrFail(14);
        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/trekking-in-nepal/' . $detail->slug);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);

        return view('nepalpackagetour', compact('detail'));
    }

    public function sitemap()
    {
        return view('sitemap');
    }
    public function budgettours()
    {
        $budgets = $this->getBudgetTreks('budget');


        return view('budgettours')
            ->with('budgets', $budgets);
    }
    public function motorbiketours()
    {
        $motorbikes = $this->getMotorbikeTours('motorbikes');


        return view('motorbike')
            ->with('motorbikes', $motorbikes);
    }
    public function mountainbiketours()
    {
        $mountainbikes = $this->getMountainbikeTours('mountainbike');


        return view('mountainbike')
            ->with('mountainbikes', $mountainbikes);
    }


    public function thankyousubs()
    {
        return view("thanks-for-subs");
    }
    public function thankyouinquiry()
    {
        return view("thank-you-inquiry");
    }
	public function xml_sitemap()
    {
        $trip = Trip::where('publish',1)->get(['id','slug','created_at','updated_at']);
        $blog = Post::where('status','PUBLISHED')->get(['id','slug','created_at','updated_at']);
        return response()->view('xml_sitemap', compact('trip','blog'))
        ->header('Content-Type', 'text/xml');
    }
}
