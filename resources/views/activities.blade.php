@extends('layouts.front')

@section('metatags')

<meta name="title" content="Adventures Activites in Nepal">
<meta name="keywords" content="adventure activities in nepal, outdoor activities in nepal ">
<meta name="description"
    content="Activities such as Trekking, Peak Climbing, Heli Tours, Day Hikes are most enjoyed adventures under the foothills of Himalayas.">
<title>Best Activities For Himalayan Countries | Himalayan Trekkers</title>
<style>
    #pageDestinations {
        width: 100%;
    }

    #pageDestinations .sec__ban {
        position: relative;
        width: 100%;
        height: 100vh;
        background-color: #14847b;
        overflow: hidden;
    }

    #pageDestinations .secListing ul {
        width: 100%;
    }

    #pageDestinations .secListing li {
        width: 100%;
        margin: 0;
        padding: 0;
    }

    #pageDestinations .secListing .img__holder {
        width: 50%;
        height: 430px;
        background-color: #222;
        float: right;
        overflow: hidden;
    }

    #pageDestinations .secListing li:nth-child(2n) .img__holder {
        float: left;
    }

    #pageDestinations .secListing .img__holder img {
        position: relative;
        width: 105%;
        height: 100%;
        display: block;
        left: 50%;
        -webkit-transform: translate(-50%);
        transform: translate(-50%);
        -webkit-transition: 0.35s ease;
        transition: 0.35s ease;
    }

    #pageDestinations .secListing .d_hold {
        width: 50%;
        padding: 80px 10% 0;
        float: left;
        -webkit-transition: 0.35s ease;
        transition: 0.35s ease;
    }

    #pageDestinations .secListing li:nth-child(2n) .d_hold {
        float: right;
    }

    #pageDestinations .secListing h2 {
        margin-bottom: 15px;
        font-size: 40px;
        line-height: 45px;
        font-weight: 700;
        color: #222;
    }

    #pageDestinations .secListing p {
        margin-bottom: 10px;
        font-size: 15px;
        line-height: 25px;
        letter-spacing: 0.5px;
    }

    #pageDestinations .secListing .CTAHolder {
        width: 180px;
        background: url(/images/border04.png) no-repeat 100%;
        padding-right: 45px;
    }

    #pageDestinations .secListing a .CTAHolder {
        font-size: 16px;
        line-height: 14px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #4a5568;
        display: block;
    }

    #pageDestinations .secListing a:hover .CTAHolder {
        color: #157e76;
        text-decoration: none;
    }

    #pageDestinations .secListing a:hover .d_hold {
        padding: 40px 6%;
    }

    #pageDestinations .secListing a:hover .img__holder img {
        opacity: 0.55;
        width: 115%;
        max-width: 115%;
    }

    @media screen and (min-width: 200px) and (max-width: 950px) {
        .widthWrapper {
            width: 80%;
        }

        #pageDestinations .sec__ban {
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        #pageDestinations .sec__ban .d_hold {
            bottom: 30px;
        }

        #pageDestinations .sec__ban .d_hold .widthWrapper {
            width: 80%;
        }

        #pageDestinations .sec__ban .d_hold h1 {
            width: 100%;
            font-size: 45px;
            line-height: 50px;
            padding: 0;
            margin-bottom: 20px;
        }

        #pageDestinations .sec__ban .d_hold p {
            position: relative;
            width: 100%;
            padding: 0 0 25px;
            font-size: 15px;
            line-height: 20px;
            color: #fff;
        }

        #pageDestinations .sec__ban a.linkNextSection {
            display: none;
        }

        #pageDestinations .secListing {
            width: 80%;
            margin: 60px auto;
        }

        #pageDestinations .secListing li {
            margin-bottom: 30px;
        }

        #pageDestinations .secListing .img__holder {
            width: 100%;
            height: auto;
            float: none;
        }

        #pageDestinations .secListing li:nth-child(2n) .img__holder {
            float: none;
        }

        #pageDestinations .secListing .d_hold {
            width: 100%;
            background-color: #222;
            padding: 30px 10% 40px;
            float: none;
        }

        #pageDestinations .secListing li:nth-child(2n) .d_hold {
            float: none;
        }

        #pageDestinations .secListing h2 {
            color: #fff;
            margin-bottom: 15px;
        }

        #pageDestinations .secListing p {
            color: #fff;
        }

        #pageDestinations .secListing a:hover .d_hold {
            padding: 80px 10% 0;
        }
    }
</style>
@stop

@section('content')
@include('layouts.newnavbar')

<div id="app" class="bg-shuttle-gray">
    <main id="pageDestinations" class="">
        <div class="secListing">
            <ul class="grid effect-2" id="grid">
                @foreach ($activities as $activity)
                <li>
                    <a href="{{ route('singleactivity.index',['slug'=> $activity->slug ])}}">
                        <div class="img__holder">
                            <img src="{{Voyager::image($activity->thumbnail('cropped'))}}"
                                alt="{{ $activity->title }}" />
                        </div>
                        <div class="d_hold">
                            <h2>{{ $activity->title }}</h2>

                            <p>{!! Str::limit($activity->content,180) !!}</p>
                            <div class="CTAHolder">Learn more</div>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </main>


    @include('layouts.footer')





</div>
@endsection

@section('script')
<script src="{{ asset('js/blogs.js')}}"></script>

@endsection
