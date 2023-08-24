@extends('layouts.front')
@include('layouts.countrymeta')
@section('content')

<div id="app">

    @include('layouts.newnavbar')

    @include('layouts.countryview', ['heading' => 'Multicountry Tours & Trek'])
    <section class="py-10 px-2 md:px-8 bg-shuttle-gray">

        <front-page></front-page>
    </section>


    @include('layouts.footer')

</div>
@endsection

@section('script')
<script src="{{ asset('js/mc.js') }}"></script>


@endsection
