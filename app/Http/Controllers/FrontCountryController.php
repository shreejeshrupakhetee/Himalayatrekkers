<?php

namespace App\Http\Controllers;

use App\Country;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class FrontCountryController extends Controller
{

    public function nepal()
    {
        $detail = Country::findorFail(1);

        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/nepal');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);
// return $detail;
        return view('nepal', compact('detail'));
    }
    public function bhutan()
    {
        $detail = Country::findorFail(2);
        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/bhutan');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);
        return view('bhutan', compact('detail'));
    }
    public function tibet()
    {
        $detail = Country::findorFail(3);

        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/tibet');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);
        return view('tibet', compact('detail'));
    }
    public function india()
    {
        $detail = Country::findorFail(4);

        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/india');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);
        return view('india', compact('detail'));
    }
    public function nepalbhutan()
    {
        $detail = Country::findorFail(5);

        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/nepal-bhutan-tours');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);


        return view('nepalbhutan', compact('detail'));
    }

    public function nepaltibet()
    {
        $detail = Country::findorFail(6);
        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/nepal-tibet-tours');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);
        return view('nepaltibet', compact('detail'));
    }
    public function nepalindia()
    {
        $detail = Country::findorFail(7);
        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/nepal-india-tours');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);
        return view('nepalindia', compact('detail'));
    }
    public function nti()
    {
        $detail = Country::findorFail(8);
        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/nepal-tibet-india-tours');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);
        return view('nepaltibetindia', compact('detail'));
    }
    public function nbi()
    {
        $detail = Country::findorFail(9);
        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/nepal-bhutan-india-tours');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);
        return view('nepalbhutanindia', compact('detail'));
    }
    public function nbt()
    {
        $detail = Country::findorFail(10);
        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/nepal-bhutan-tibet-tours');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);
        return view('nepalbhutantibet', compact('detail'));
    }
    public function nbti()
    {
        $detail = Country::findorFail(11);
        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/nepal-bhutan-tibet-india-tours');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);
        return view('nepalbhutantibetindia', compact('detail'));
    }
    public function multicountries()
    {


        $detail = Country::findorFail(12);
        SEOMeta::setTitle($detail->metatitle);
        SEOMeta::setDescription($detail->metadisc);
        SEOMeta::addMeta('article:modified_time', $detail->updated_at->toW3CString(), 'property');
        SEOMeta::addKeyword($detail->metakey);
        OpenGraph::setTitle($detail->meta_title);
        OpenGraph::setDescription($detail->metadisc);
        OpenGraph::setUrl('https://himalayantrekkers.com/multicountry-tours-and-treks');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addImage(Voyager::image($detail->image), ['height' => 668, 'width' => 1366]);
        TwitterCard::setTitle($detail->metatitle);
        TwitterCard::setDescription($detail->metadisc);
        return view('multicountry', compact('detail'));
    }
}
