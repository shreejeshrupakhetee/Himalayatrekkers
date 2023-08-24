@extends('layouts.front')
@section('metatags')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "TravelAgency",
            "@id": "https://himalayantrekkers.com/about-us",
            "additionalType": " http://www.productontology.org/id/Tour_operator",
            "name": "Himalayan Trekkers",
            "description": "Himalayan Trekkers is an travel & tour company specialising the leading trek & tour operator providing an extra ordinary service for Nepal, Bhutan, Tibet and India. Our goal is to provide seamless, life-enriching travel",
            "slogan": "The Best Himalayan Trek and Tour Specialist",
            "email": "info@himalayantrekkers.com",
            "telephone": "+9779851042334",
            "logo": "https://himalayantrekkers.com/images/logo_new.svg",
            "image": "https://himalayantrekkers.com/images/about.png",
            "url": "https://himalayantrekkers.com/about-us",
            "priceRange": "$100 to $50,000",
            "address": {
                "@type": "PostalAddress",
                "addressCountry": "Nepal",
                "addressLocality": "Kathmandu",
                "addressRegion": "Bagmati",
                "postalCode": "20620",
                "streetAddress": "Thamel-Marg, Thamel-26, Kathmandu"
            },
            "hasMap": "https://goo.gl/maps/df6R9a6zu6cyChtA8",
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "27.7151683",
                "longitude": "85.3113333"
            },
            "contactPoint": [{
                    "@type": "ContactPoint",
                    "telephone": "+9779851042334",
                    "contactType": "reservations",
                    "email": "info@himalayantrekkers.com"
                },
                {
                    "@type": "ContactPoint",
                    "telephone": "+9779851042334",
                    "contactType": "customer service"
                }
            ],
            "openingHours": ["Mo-Fr 08:30-17:30", "Sa 09:00-14:00"],
            "currenciesAccepted": "USD,GBP,INR,AUD",
            "paymentAccepted": "Bank Transfer, Paypal",
            "legalName": "Himalayan Trekkers Pvt Ltd",
            "founder": [{
                    "@type": "Person",
                    "name": "Raj Dhamala",
                    "jobTitle": "Founder & Managing Director",
                    "email": "info@himalayantrekkers.com",
                    "knowsLanguage": "English, Hindi",
                    "birthDate": "1979-07-30",
                    "sameAs": "https://np.linkedin.com/in/himalayantrekkers"
                }

            ],
            "foundingDate": "2009-10-10",
            "foundingLocation": {
                "@type": "Place",
                "address": {
                    "@type": "PostalAddress",
                    "addressCountry": "Nepal",
                    "addressLocality": "Kathmandu"
                }
            },
            "memberOf": [{
                    "@type": "Organization",
                    "name": "Trekking Agencies' Association of Nepal",
                    "alternateName": "TAAN",
                    "url": "https://www.taan.org.np/"
                },
                {
                    "@type": "Organization",
                    "name": "Nepal Mountaineering Association",
                    "alternateName": "NMA",
                    "url": "https://www.nepalmountaineering.org/"

                }
            ],
            "sameAs": [
                "https://www.facebook.com/himalayantrekkersofficial",
                "https://www.instagram.com/himalayantrekkers/",
                "https://www.youtube.com/channel/UClhbRE3TKbU9xhOHXvmUb_A",
                "https://twitter.com/HTrekkers"
            ],
            "mainEntityOfPage": "https://himalayantrekkers.com/about-us"
        }
    </script>

@stop

@section('css')
    <style>
        .panocontain {
            position: relative;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: #e5e2e2;
            background-image: url("/images/about.png");
            background-size: auto 100%;
            background-repeat: no-repeat;
        }

        .hero {
            text-align: center;
            position: relative;
            color: white;
            width: 100%;
            max-width: 100%;
            background-size: cover;
            position: relative;
            margin-bottom: 0;
            height: 380px;
        }

        .hero .hero-bg {
            opacity: 1;
            height: 100%;
            width: 100%;
            position: absolute !important;
            top: 0;
            padding-top: 0 !important;
            z-index: 0 !important;
        }

        .hero .hero-bg .hero-bg-item {
            height: 100%;
            width: 100%;
            position: absolute;
            background-size: cover;
            background-position: center;
            -moz-transform: translate3d(0px, 0px, 0px) scale3d(1.15, 1.15, 1) rotate(0.01deg);
            -o-transform: translate3d(0px, 0px, 0px) scale3d(1.15, 1.15, 1) rotate(0.01deg);
            -ms-transform: translate3d(0px, 0px, 0px) scale3d(1.15, 1.15, 1) rotate(0.01deg);
            -webkit-transform: translate3d(0px, 0px, 0px) scale3d(1.15, 1.15, 1) rotate(0.01deg);
            transform: translate3d(0px, 0px, 0px) scale3d(1.15, 1.15, 1) rotate(0.01deg);
        }

        .hero:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            pointer-events: none;
            background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjEuMCIgeDI9IjAuNSIgeTI9IjAuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIwLjYiLz48c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM3ZGI5ZTgiIHN0b3Atb3BhY2l0eT0iMC4wIi8+PC9saW5lYXJHcmFkaWVudD48L2RlZnM+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNncmFkKSIgLz48L3N2Zz4g");
            background-size: 100%;
            background-image: -webkit-gradient(linear,
                    50% 100%,
                    50% 0%,
                    color-stop(0%, rgba(0, 0, 0, 0.6)),
                    color-stop(100%, rgba(125, 185, 232, 0)));
            background-image: -moz-linear-gradient(bottom,
                    rgba(0, 0, 0, 0.6) 0%,
                    rgba(125, 185, 232, 0) 100%);
            background-image: -webkit-linear-gradient(bottom,
                    rgba(0, 0, 0, 0.6) 0%,
                    rgba(125, 185, 232, 0) 100%);
            background-image: linear-gradient(to top,
                    rgba(0, 0, 0, 0.6) 0%,
                    rgba(125, 185, 232, 0) 100%);
            z-index: 0;
        }

        @media (max-width: 800px) {

            .panocontain {
                display: none;
                background-image: none;
            }
        }

        .reverse:nth-child(even) .opposite {
            flex-direction: row-reverse;
        }

        @media screen and (min-width: 768px) {
            .reverse:nth-child(odd) .opposite .padding {
                padding-right: 0;
                padding-left: 50px;
            }

            .reverse:nth-child(odd) .opposite .bgc {
                background: linear-gradient(225deg, #d4fc79 0%, #96e6a1 100%);

            }

            .reverse:nth-child(even) .opposite .padding {
                padding-left: 0;
                padding-right: 100px;
            }
        }

    </style>

@endsection


@section('content')

    <div id="app">

        @include('layouts.newnavbar')


        {{-- {!! setting('about-us.about_content') !!} --}}
        <section class="px-4 md:px-6 lg:px-8">
            <div class="mt-5 container mx-auto breadcrumbs">
                <div class="wrap text-sm md:text-base">
                    <div class="wrap_float text-dark-gray">
                        <a class="mr-1" href="/">Home</a>
                        <span class="separator mr-1">/</span>
                        <a href="#">About Us</a>
                    </div>
                </div>

            </div>

        </section>
        <main class="bg-white main px-4 lg:px-48">
            <div class="container mx-auto">
                <article class="md:p-4 lg:p-2 mt-5">

                    <div class="main_content">
                        {!! setting('about-us.about_content') !!}
                    </div>

                </article>
            </div>
        </main>
        <section class="mt-5 hero hidden lg:block">
            <div class="hero-bg">
                <div class="hero-bg-item">
                    &nbsp;</div>

                <div class="panocontain">
                    &nbsp;</div>
            </div>

        </section>


        <section class="mt-5">
            <div class="container mx-auto text-center bg-white">
                <h1 class="secondary-heading">Meet the Team of Himalayan Trekkers</h1>
            </div>

        </section>
        <div class="navtab"></div>



        <section class="px-4 md:px-6 lg:px-8">

            <vue-tabs v-bind:width="'md:w-3/4'">
                @foreach ($teamtags as $key => $tag)
                    <vue-tab class="relative md:w-3/4" id="{{ $key + 1 }}" :active="false" label="{{ $tag->title }}">

                        <div class="container mx-auto mt-10 bg-white">
                            <div class="tab-pane fade mb-5" id="tab{{ $key + 1 }}">
                                @foreach ($tag->teams as $team)

                                    <div class="md:grid md:grid-cols-12 md:gap-8 bg-white odd:bg-shuttle-gray p-5 mb-5">
                                        <div class="col-span-4">
                                            <div class="w-full h-80">
                                                <img class="h-full w-full object-contain round-t-xl"
                                                    src="{{ Voyager::image($team->image) }}" alt="{{ $team->name }}">
                                            </div>
                                        </div>
                                        <div class="col-span-8">
                                            <h4 class="font-bold text-xl text-center md:text-left">
                                                {{ $team->name }}
                                            </h4>


                                            <div class="mt-5 readmore js-read-more" data-rm-words="80">
                                                <div class="main_content">
                                                    {!! $team->content !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </vue-tab>
                @endforeach

            </vue-tabs>

        </section>



        {{-- {{dd($teamtags)}} --}}

        {{-- <tabs inline-template>
        <div class="mt-12 px-2 md:px-8">
            <div class="container mx-auto">
                <div class="flex flex-col">

                    <div class="w-full">
                        <!-- service tab wrapper -->
                        <div class="faq-tab-wrapper">
                            <div class="flex no-gutters -mx-2 relative">

                                <div class="w-full px-2 sticky top-16  h-110">
                                    <div class="nav nav-tabs flex-column faq-tab__link-wrapper">
                                        @foreach ($teamtags as $key => $tag)
                                        <a class="nav-item nav-link" @click.prevent="setActive('{{$tag->title}}')"
    :class="{ active: isActive('{{$tag->title}}') }" href="#tab{{$key+1}}">

    <span class="text">{{ $tag->title }}</span></a>
    @endforeach
</div>
</div>


<div class="w-full px-2">
    @foreach ($teamtags as $key => $tag)
    <div class="tab-content">


        <div class="tab-pane fade" :class="{ 'active show': isActive('{{$tag->title}}') }" id="tab{{$key+1}}">
            @foreach ($tag->teams as $team)
            <div class="faq-tab__single-content-wrapper shadow-lg mb-3">

                <h3 class="text-regal-blue font-semibold text-lg p-4">
                    {{ $team->name}}</h3>
                <div class="main_content p-4">
                    {!!$team->content!!}
                </div>


            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</tabs> --}}









        @include('layouts.footer')

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/about.js') }}"></script>
    <script src="{{ asset('js/pano.js') }}"></script>


@endsection
