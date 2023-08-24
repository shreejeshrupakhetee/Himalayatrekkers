@extends('layouts.front')
@section('metatags')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

    <script type='application/ld+json'>
        {
            "@context": "https://schema.org",
            "@graph": [{
                    "@type": "TravelAgency",
                    "@id": "https://himalayantrekkers.com/contact-us",
                    "priceRange": "$100 to $50,000",
                    "email": "info@himalayantrekkers.com",
                    "telephone": "+9779851042334",
                    "address": {
                        "@type": "PostalAddress",
                        "addressCountry": "Nepal",
                        "addressLocality": "Kathmandu",
                        "addressRegion": "Bagmati",
                        "postalCode": "20620",
                        "streetAddress": "Thamel-Marg, Thamel-26, Kathmandu"
                    },
                    "name": "Himalayan Trekkers"
                },
                {
                    "@type": "WebSite",
                    "@id": "https://himalayantrekkers.com/#website",
                    "url": "https://himalayantrekkers.com/",
                    "name": "Himalayan Trekkers | Treks and Tour in Nepal Bhutan Tibet India",
                    "description": "Nepal Multicountry Tour & Travel Specialists",
                    "publisher": {
                        "@id": "https://himalayantrekkers.com/contact-us",
                        "@type": "TravelAgency",
                        "image": "https://himalayantrekkers.com/images/about.png"
                    },

                    "potentialAction": {
                        "@type": "SearchAction",
                        "target": "https://himalayantrekkers.com/?s={search_term_string}",
                        "query-input": "required name=search_term_string"
                    }
                },
                {
                    "@type": "ImageObject",
                    "@id": "https://himalayantrekkers.com/contact-us/#primaryimage",
                    "url": "https://himalayantrekkers.com/images/about.png",
                    "width": 1270,
                    "height": 558,
                    "caption": "Contact us"
                },
                {
                    "@type": "WebPage",
                    "@id": "https://himalayantrekkers.com/contact-us/#webpage",
                    "url": "https://himalayantrekkers.com/contact-us",
                    "inLanguage": "en-US",
                    "name": "Contact Us - Information How to Contact Himalayan Trekkers",
                    "isPartOf": {
                        "@id": "https://himalayantrekkers.com/#website"
                    },
                    "primaryImageOfPage": {
                        "@id": "https://himalayantrekkers.com/contact-us/#primaryimage"
                    },
                    "datePublished": "2012-09-06T16:08:50+00:00",
                    "dateModified": "2019-10-18T00:07:26+00:00",
                    "description": "Contact us to inquire about Nepal Bhutan Tibet India Tour and Trek Package or even custom itinerary anytime.",
                    "breadcrumb": {
                        "@id": "https://himalayantrekkers.com/contact-us/#breadcrumb"
                    }
                }, {
                    "@type": "BreadcrumbList",
                    "@id": "https://himalayantrekkers.com/contact-us/#breadcrumb",
                    "itemListElement": [{
                            "@type": "ListItem",
                            "position": 1,
                            "item": {
                                "@type": "WebPage",
                                "@id": "https://himalayantrekkers.com/",
                                "url": "https://himalayantrekkers.com/",
                                "name": "Home"
                            }
                        },
                        {
                            "@type": "ListItem",
                            "position": 2,
                            "item": {
                                "@type": "WebPage",
                                "@id": "https://himalayantrekkers.com/contact-us",
                                "url": "https://himalayantrekkers.com/contact-us",
                                "name": "Contact Us"
                            }
                        }
                    ]
                }
            ]
        }
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@stop
@section('css')
    <style>
        .map-responsive {

            overflow: hidden;
            padding-bottom: 40%;
            position: relative;
            height: 0;

        }

        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;

        }


        .social-links .link {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: block;
            float: left;
            position: relative;
            margin-right: 23px;
        }

        .social-links .link:last-child {
            margin-right: 0;
        }

        .social-links .link span {
            display: block;
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            z-index: 1;
            background: inherit;
        }

        .social-links .link span:before {
            position: absolute;
            top: 50%;
            left: 50%;
            content: '';
            background-position: center center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        .social-links .link:after {
            background: inherit;
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border-radius: 50%;
            content: '';
            filter: blur(6px);
            -webkit-filter: blur(6px);
            -moz-filter: blur(6px);
            opacity: 0;
            transition: all .1s linear;
            will-change: opacity;
        }

        .social-links .link:hover:after {
            opacity: 1;
            transition: all .1s linear;
        }

        .social-links .link.facebook {
            background: #33589E;
        }

        .social-links .link.facebook span:before {
            width: 13px;
            height: 25px;
            background-image: url(/images/facebook-logo.svg);
            margin-top: -13px;
            margin-left: -7px;
        }

        .social-links .link.instagram {
            background: #4c5ad1;
            /* Old browsers */
            background: -moz-linear-gradient(-45deg, #4c5ad1 0%, #ff3756 42%, #ff3e37 60%, #ffd42b 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(-45deg, #4c5ad1 0%, #ff3756 42%, #ff3e37 60%, #ffd42b 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(135deg, #4c5ad1 0%, #ff3756 42%, #ff3e37 60%, #ffd42b 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#4c5ad1', endColorstr='#ffd42b', GradientType=1);
            /* IE6-9 fallback on horizontal gradient */
        }

        .social-links .link.instagram span:before {
            width: 22px;
            height: 22px;
            background-image: url(/images/instagram-logo.svg);
            margin-top: -11px;
            margin-left: -11px;
        }

        .social-links .link.pinterest {
            background: #C8232C;
        }

        .social-links .link.pinterest span:before {
            width: 20px;
            height: 24px;
            background-image: url(/images/pinterest.svg);
            margin-top: -12px;
            margin-left: -10px;
        }

        .social-links .link.twitter {
            background: #4BA0EB;
        }

        .social-links .link.twitter span:before {
            width: 26px;
            height: 20px;
            background-image: url(/images/twitter-logo.svg);
            margin-top: -10px;
            margin-left: -13px;
        }

        .social-links .link.youtube {
            background: #FF000E;
        }

        .social-links .link.youtube span:before {
            width: 23px;
            height: 16px;
            background-image: url(/images/youtube-logo.svg);
            margin-top: -8px;
            margin-left: -12px;
        }

    </style>
@endsection
@section('content')
    <div id="app" class="bg-shuttle-gray">
        @include('layouts.newnavbar')


        <section class="px-4 md:px-6 lg:px-8">
            <div class="mt-5 container mx-auto breadcrumbs">
                <div class="wrap">
                    <div class="wrap_float text-dark-gray">
                        <a class="hover:text-regal-red" href="/">Home</a>
                        <span class="separator">/</span>
                        <a class="hover:text-regal-red" href="{{ route('contact.index') }}">Contact Us</a>
                    </div>
                </div>
                <div class="mt-3 page_head text-center">
                    <h1 class="title text-2xl md:text-4xl">
                        We’d love to hear from you.
                    </h1>
                    <p class="mt-4 text-dark-gray subtitle">
                        Let’s have a Talk

                    </p>


                </div>
            </div>

        </section>


        <section class="my-10 px-4 contacts-page md:px-6 lg:px-8">

            <div class="md:grid md:grid-cols-2 md:gap-4">

                <div class="contacts-left bg-white shadow-xl rounded-xl p-5">
                    <div class="font-bold text-xl">
                        <a class="" href="#">+977 98510 42334</a>
                        <p class="text-regal-red mt-3 uppercase">24 Hrs Support All year round </p>
                    </div>
                    <div class="mt-2 email">
                        <a class="text-regal-blue font-bold"
                            href="mailto:info@himalayantrekkers.com">info@himalayantrekkers.com</a>
                        <p class="mt-5 text-2xl font-bold uppercase text-regal-blue">For any questions</p>
                    </div>
                    <address class="text-lg relative address pl-6 mt-2">
                        Pristine Himalayan Trekkers Pvt. Ltd.
                        <br> Thamel-26 , Kathmandu
                        <br> Nepal (Head Office)
                        <br>+977 1 4514678

                    </address>

                    <div class="mt-5 socials social-links pb-10">
                        <p class="italic font-semibold text-regal-blue mb-5">Follow us on:</p>
                        <a target="_blank" href="{{ setting('site.fb') }}" class="link facebook"><span></span></a>
                        <a target="_blank" href="{{ setting('site.insta') }}" class="link instagram"><span></span></a>
                        {{-- <a target="_blank" href="{{ setting('site.twitter')}}" class="link pinterest"><span></span></a> --}}
                        <a target="_blank" href="{{ setting('site.twitter') }}" class="link twitter"><span></span></a>
                        <a target="_blank" href="{{ setting('site.youtube') }}" class="link youtube"><span></span></a>
                    </div>


                </div>





                <contact></contact>




            </div>
        </section>

        <section class="px-4 md:px-6 lg:px-8">
            <div class="map">
                <div class="map-responsive">

                    <iframe src="https://maps.google.com/maps?q=Himalayan%20Trekkers&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                </div>


            </div>
        </section>








        @include('layouts.footer')
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/contact.js') }}"></script>
@endsection
