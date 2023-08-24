@extends('layouts.front')

@section('metatags')
    <title>Thank You For the Inquiry | Himalayan Trekkers</title>
    <meta name="robots" content="noindex">
@stop
@section('css')

@endsection

@section('content')
    <div id="app" class="bg-shuttle-gray">
        @include('layouts.newnavbar')



        <section class="px-4 md:px-8">

            <div class="container mx-auto">
                <article class="text-center py-12 md:px-48">
                    <h1 class="text-4xl">Thank You For Your Inquiry!</h1>


                    <div class="mt-3 flex justify-center text-royal-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                        </svg>
                    </div>
                    <p class="mt-5">A Representative from Himalayan Trekkers will contact you as soon as possible.
                    </p>





                    <a class="inline-block mt-5 w-max bg-regal-red rounded-full text-white text-sm md:text-base uppercase font-semibold px-4 hover:bg-hover-yellow hover:text-black py-2"
                        href="{{ URL::previous() }}">Home</a>

                    <h2 class="mt-5 text-3xl text-left">You might be Interested in</h2>

                    <div class="mt-5 flex flex-wrap trendings">

                        <a class="/faqs" href="/faqs">Travel FAQ'S</a>
                        <a class="" href="/gear-list-for-trekking-and-climbing">Gear List For Trekking</a>
                        <a class="" href="/gear-list-for-trekking-and-climbing">Gear List For Climbing</a>
                        <a class="" href="/nepal-budget-tour-packages">Budget Treks & Tours</a>
                        <a class="" href="/blog">Blogs</a>

                        <a class="" href="/itinerary/everest-base-camp-trek/">Everest Base Camp Trekking</a>
                        <a class="" href="/motorbike-tours">Motorbike Tour Packages</a>
                        <a class="" href="/multicountry-tours-and-treks">Multicountry Tours</a>
                    </div>
                </article>

            </div>
        </section>
        {{-- @include('partials._trendings') --}}

        @include('layouts.footer')


    </div>



@endsection
@section('script')
    <script src="{{ asset('js/region.js') }}"></script>
@endsection
