@extends('layouts.front')
@include('layouts.countrymeta')
@section('content')

<div id="app">

    @include('layouts.newnavbar')
    @include('layouts.countryview', ['heading' => 'Tibet - Roof of the World'])


    <section class="py-10 px-2 md:px-8 bg-shuttle-gray">
        <front-page :id="{{ json_encode($detail->id) }}"></front-page>
    </section>


    @include('layouts.footer')

</div>
@endsection

@section('script')
<script src="{{ asset('js/frontcountry.js?v=2.1') }}"></script>


@endsection
