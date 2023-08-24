@extends('layouts.front')
@include('layouts.countrymeta')

@section('content')

    <div id="app" v-cloak>

        @include('layouts.newnavbar')

        @include('layouts.countryview', ['heading' => 'Nepal Tibet Tours'])

        <section class="py-10 px-4 md:px-6 lg:px-8 bg-shuttle-gray">
            <front-page :id="{{ json_encode($detail->id) }}"></front-page>
        </section>


        @include('layouts.footer')

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/frontcountry.js') }}"></script>


@endsection
