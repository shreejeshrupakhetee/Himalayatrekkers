@section('metatags')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {{-- <script async src="https://cdn.ampproject.org/v0.js"></script>
<link as=script href=https://cdn.ampproject.org/v0.js rel=preload>
<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script> --}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/country.css">


@endsection
