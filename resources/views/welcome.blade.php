@extends('layouts.front')

@section('metatags')



    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    <script type='application/ld+json'>
        {
            "@context": "http://schema.org",
            "@type": "TravelAgency",
            "@id": "https://himalayantrekkers.com/",
            "additionalType": " http://www.productontology.org/id/Tour_operator",
            "name": "Himalayan Trekkers",
            "description": "Himalayan Trekkers is travel & tour company specialising to provide an extra ordinary service for Nepal, Bhutan, Tibet and India. Our goal is to provide seamless, life enriching travel experience.",
            "slogan": "The Best Himalaya Trek and Tour Specialist",
            "email": "info@himalayantrekkers.com",
            "telephone": "+9779851042334",
            "logo": "https://himalayantrekkers.com/images/logo_new.svg",
            "image": "https://himalayantrekkers.com/images/himalayantrekkers.jpg",
            "url": "https://himalayantrekkers.com",
            "priceRange": "$100 to $50,000",
            "address": {
                "@type": "PostalAddress",
                "addressCountry": "Nepal",
                "addressLocality": "Kathmandu",
                "addressRegion": "Bagmati",
                "postalCode": "20620",
                "streetAddress": "Thamel-Marg, Thamel-26, Kathmandu"
            },
            "@graph": [{
                    "@type": "WebSite",
                    "@id": "https://himalayantrekkers.com/#website",
                    "url": "https://himalayantrekkers.com/",
                    "name": "Himalayan Trekkers",
                    "potentialAction": {
                        "@type": "SearchAction",
                        "target": "https://himalayantrekkers.com/?s={search_term_string}",
                        "query-input": "required name=search_term_string"
                    }
                },
                {
                    "@type": "WebPage",
                    "@id": "https://himalayantrekkers.com/#webpage",
                    "url": "https://himalayantrekkers.com",
                    "inLanguage": "en-US",
                    "name": "Himalayan Trekkers",
                    "isPartOf": {
                        "@id": "https://himalayantrekkers.com/#website"
                    },

                    "description": "{{ setting('site.description') }}"
                }
            ],
            "sameAs": [
                "https://www.facebook.com/himalayantrekkers",
                "https://www.instagram.com/himalayantrekkers/",
                "https://www.youtube.com/channel/UClhbRE3TKbU9xhOHXvmUb_A",
                "https://twitter.com/HTrekkers"
            ]
        }
    </script>

@endsection

@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/trendings.css?v=2.0') }}">

@endsection



@section('content')

    <div id="app" class="bg-shuttle-gray">
        @include('layouts.newnavbar')

        @include('layouts.slider')









        @include('layouts.perfectholidays')






        @include('partials._countries')



        @include('partials._testimonials')


        @include('partials._featuredblog')



        @include('partials._whyus')

        @include('partials._trendings')



        @include('layouts.footer')

    </div>

@endsection

@section('script')
    <script src="{{ asset('js/app.js?v=2.0') }}"></script>
    <script async data-cfasync="false"
        src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=48&amp;locationId=6123130&amp;lang=en_US&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=true&amp;display_version=2"
        data-loadtrk onload="this.loadtrk=true"></script>

@endsection
@section('more-script')


    <script src="/js/slick.min.js"></script>
    <script>
        $(document).ready(function() {

            if ($("#main_slider_wrap").length) {
                $('#main_slider_wrap').slick({
                    arrows: true,
                    dots: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    swipe: true,
                    fade: true,
                    cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
                    touchThreshold: 100,
                    pauseOnHover: false,
                    touchMove: true,
                    draggable: true,
                    autoplay: true,
                    pauseOnHover: true,
                    speed: 500,
                    autoplaySpeed: 5000,
                    prevArrow: $('.main_slider .arrow.prev'),
                    nextArrow: $('.main_slider .arrow.next, .next_title')
                });
            }

            if ($("#stries_slider").length) {
                $('#stries_slider').slick({
                    arrows: true,
                    dots: false,
                    slidesToShow: 4,
                    slidesToScroll: 2,
                    infinite: true,
                    swipe: true,
                    fade: false,
                    // variableWidth: true,
                    pauseOnHover: true,
                    touchMove: true,
                    draggable: true,
                    autoplay: true,
                    speed: 500,
                    autoplaySpeed: 5000,
                    prevArrow: $('.stories .arrow.prev'),
                    nextArrow: $('.stories .arrow.next'),
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 2,
                                adaptiveHeight: true,
                            },
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                            },
                        }
                    ]
                });
            }

            if ($("#s_slider").length) {
                $('#s_slider').slick({
                    arrows: true,
                    dots: false,
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    infinite: true,
                    swipe: true,
                    fade: false,
                    variableWidth: true,
                    pauseOnHover: true,
                    touchMove: true,
                    draggable: true,
                    autoplay: true,
                    speed: 500,
                    autoplaySpeed: 5000,
                    prevArrow: $('.reviews .arrow.prev'),
                    nextArrow: $('.reviews .arrow.next'),
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 2,
                                adaptiveHeight: true,
                            },
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            },
                        }
                    ]
                });
            }




        });
    </script>

@endsection
