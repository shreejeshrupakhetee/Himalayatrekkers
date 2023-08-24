@extends('layouts.front')

@section('metatags')
 <meta name="title" content="Motorbike Riding Tours">
 <meta name="description"
        content="Motorbike Riding Tours from Himalayan Trekkers will definitely push your riding skills and endurance to the next limit - a must do experience of a life time.">
    <title>Motorbike Tours </title>
@stop
@section('css')

@endsection

@section('content')
    <div id="app">
        @include('layouts.newnavbar')





        <div class="package_item">
            <div data-src="{{ Voyager::image(setting('home.motorbike_image')) }}"
                class="package_item_top mb-0 rounded-none has-background-image h-64 md:h-80 lg:h-109"
                style="background-image: url('{{ Voyager::image(setting('home.motorbike_image')) }}')">
                <div class="centered">
                    <div class="h-full font-semibold">
                        <h1 class="text-white text-center text-3xl md:text-5xl ts">
                            <span class="text-base">Discover</span>
                            <br>Motorbike Tours
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
                        <a class="mr-1" href="#">Motorbike Tours </a>

                    </div>
                </div>

            </div>

        </section>
        <main class="bg-white main px-4 lg:px-48">
            <div class="container mx-auto">
                <article class="md:p-4 lg:p-2 mt-5">
<div class="main_content">
{!! setting('home.motorbike_content') !!}
</div>



                </article>
            </div>
        </main>



            <section class="py-10 px-4 md:px-6 lg:px-8 bg-shuttle-gray">
                <h2 class="font-semibold text-xl md:text-3xl text-regal-blue text-center">

                @include('partials._packages',['trips'=>$motorbikes])
            </section>




        @include('layouts.footer')
    </div>



@endsection
@section('script')
    <script src="{{ asset('js/region.js') }}"></script>
@endsection
