@php
$data['gallery'] = json_decode($detail->gallery);
@endphp
@if(!empty($data['gallery']))
<div class="pt-20 md:pt-5 mt-5 md:mt-16 px-2">
    <div class="composition relative h-110">
        @foreach ($data['gallery'] as $key => $image)
        <a href="{{ Voyager::image($image) }}" v-lightbox>
            <img data-src="{{ Voyager::image($image) }}" alt="{{ $detail->title}} Image {{ $key+1}}"
                class="object-cover h-36 composition__photo composition__photo--p{{$key+1}} lozad">
        </a>
        @endforeach
    </div>
    <lightbox></lightbox>
</div>
@endif
