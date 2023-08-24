@extends('layouts.front')

@section('metatags')
 <meta name="title" content="Adventure Mountain Bike Trips">
 <meta name="description"
        content="Nepal, home to numerous mountains, offers rugged path, amazing views, warm hospitality and well-informed guides that prove to be perfect for Mountain Biking.">
    <title>Mountain Bike Trips </title>
@stop
@section('css')

@endsection

@section('content')
    <div id="app">
        @include('layouts.newnavbar')





        <div class="package_item">
            <div data-src="{{ Voyager::image(setting('home.mountainbike_image')) }}"
                class="package_item_top mb-0 rounded-none has-background-image h-64 md:h-80 lg:h-109"
                style="background-image: url('{{ Voyager::image(setting('home.mountainbike_image')) }}')">
                <div class="centered">
                    <div class="h-full font-semibold">
                        <h1 class="text-white text-center text-3xl md:text-5xl ts">
                            <span class="text-base">Discover</span>
                            <br>Adventure Mountain Bike Trips
                        </h1>
                    </div>
                </div>
            </div>

        </div>
        <section class="px-4 md:px-6 lg:px-8">
            <div class="mt-5 container mx-auto breadcrumbs">
                <div class="wrap text-sm md:text-base">
                    <div class="wrap_float text-dark-gray">
                        <a class="mr-1" href="/">Home</a>
                        <span class="separator mr-1">/</span>
                        <a class="mr-1" href="#">Mountain Biking Trips </a>

                    </div>
                </div>

            </div>

        </section>
        <main class="bg-white main px-4 lg:px-48">
            <div class="container mx-auto">
                <article class="md:p-4 lg:p-2 mt-5 main_content">
{!! setting('home.mountainbike_content') !!}



                </article>
            </div>
        </main>



            <section class="py-10 px-4 md:px-6 lg:px-8 bg-shuttle-gray">
                <h2 class="font-semibold text-xl md:text-3xl text-regal-blue text-center">

                @include('partials._packages',['trips'=>$mountainbikes])
            </section>




        @include('layouts.footer')
    </div>



@endsection
@section('script')
    <script src="{{ asset('js/region.js') }}"></script>
@endsection
