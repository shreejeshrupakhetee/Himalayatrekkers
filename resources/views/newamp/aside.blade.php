<div class="hidden lg:block aside bg-white rounded-l-xl sticky top-20">
    <div class="p-5 relative">
        <div class="h-20 w-20 absolute right-3 -top-4 opacity-50" style="background-image: url('/images/clipboard.svg');">
        </div>
        <h4 class="text-lg font-semibold uppercase">Trip Info</h4>

        <ul class="bubble">
            @if (!empty($detail->duration))
                <li class="flex items-center justify-between py-2 pl-1 ">
                    <p class="font-semibold text-regal-blue text-sm">Duration</p>
                    <p class="font-bold"> {{ $detail->duration }}
                        {{ Str::plural('Day', $detail->duration) }}</p>
                </li>
            @endif
            @if (!empty($detail->altitude))
                <li class="flex items-center justify-between py-2 pl-1">
                    <p class="font-semibold text-regal-blue">

                        Max. Altitude
                    </p>
                    <p class="font-bold"> {{ $detail->altitude }} m</p>

                </li>
            @endif



            <li class="flex items-center justify-between py-2 pl-1">
                <p class="w-28 font-semibold text-regal-blue">Difficulty</p>


                @if ($detail->tripgrade)
                    <?php
                    if ($detail->tripgrade == 1) {
                        $tripgrade = 'easy';
                    } elseif ($detail->tripgrade === 2) {
                        $tripgrade = 'moderate';
                    } elseif ($detail->tripgrade === 3) {
                        $tripgrade = 'difficult';
                    } elseif ($detail->tripgrade === 4) {
                        $tripgrade = 'strenous';
                    } else {
                        $tripgrade = 'very strenous';
                    }
                    ?>

                    <div class="flex items-center h-8">
                        <amp-img class="object-fill" alt="{{ $tripgrade }}" width="39" height="35" layout="fixed"
                            src="/images/tripgrade/{{ $detail->tripgrade . '.svg' }}">
                        </amp-img>
                        <p class="ml-2 text-sm font-semibold text-regal-blue uppercase">

                            {{ $tripgrade }}
                        </p>
                    </div>
                @endif
            </li>

            @if (!empty($detail->arrival))

                <li class="flex items-center justify-between py-2 pl-1">
                    <p class="w-28 font-semibold text-regal-blue">

                        Starts From</p>
                    <p class="font-bold">{{ $detail->arrival }}</p>
                </li>
            @endif
            @if (!empty($detail->departure_from))

                <li class="flex items-center justify-between py-2 pl-1">
                    <p class="w-28 font-semibold text-regal-blue">

                        Trip Ends At</p>
                    <p class="font-bold">{{ $detail->departure_from }}</p>
                </li>
            @endif

            @if (!empty($detail->transport))
                <li class="flex items-center justify-between py-2 pl-1">
                    <p class="flex-shrink-0 font-semibold text-regal-blue w-1/4 xl:w-1/4">

                        Transport
                    </p>
                    <p class="font-bold text-right"> {{ $detail->transport }}</p>
                </li>
            @endif
            @if ($detail->region_id > 1)
                <li class="flex items-center justify-between py-2 pl-1">
                    <p class="w-28 font-semibold text-regal-blue"> Region/Type</p>
                    <a class="text-regal-red text-sm text-right font-bold"
                        href="/trekking-in-nepal/{{ $detail->regionId->slug }}">{{ $detail->regionId->title }}</a>
                </li>
            @endif


            @empty(!$detail->season)
                <li class="flex items-center justify-between pl-1">
                    <p class="w-32 flex-shrink-0 font-semibold text-regal-blue">

                        Best Season:
                    </p>
                    <ul class="season text-right">
                        @foreach (json_decode($detail->season, true) as $key => $item)

                            @if (count(json_decode($detail->season, true)) >= 1)

                                <li class="text-sm font-semibold">{{ $item }}</li>

                            @endif

                        @endforeach


                    </ul>



                </li>
            @endempty
        </ul>

    </div>
</div>



{{-- @if ($result1)

    <div class="hidden lg:block mt-5 bg-light-grayone rounded-l-xl">

        <div class="p-5">
            <div class="hidden lg:block">
                <h3 class="block_title text-regal-blue font-bold mb-6 text-2xl">Similar Trips</h3>
                @foreach ($result1 as $r)
                    <a class="block" href="{{ route('itinerary.index', $r->slug) }}">

                        <div class="grid grid-cols-3 gap-1 mb-5">
                            <div class="left col-span-1">

                                <figure class="relative">
                                    <amp-img class="rounded-l-xl"
                                        src="{{ Voyager::image(getThumbnail($r->image, 'cropped')) }}"
                                        alt="{{ $r->title }}" width="112" height="75" layout="intrinsic">
                                    </amp-img>
                                </figure>

                            </div>

                            <div class="col-span-2 h-20 px-2 pb-2  text-regal-blue flex flex-col text-sm font-semibold">
                                <p>
                                    {{ Str::limit($r->title, 90) }}

                                </p>
                                <p class="xl:mt-auto">
                                    <span class="text-sm xl:font-bold text-gray-900">
                                        {{ $r->duration }}
                                        {{ Str::plural('Day', $r->duration) }}
                                    </span>

                                </p>
                            </div>

                        </div>
                    </a>

                @endforeach
            </div>






        </div>
    </div>
@endif --}}
