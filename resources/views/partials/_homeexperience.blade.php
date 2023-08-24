    <div class="mt-5 container mx-auto relative">

        <div class="md:grid md:grid-cols-2 md:gap-2 lg:grid-cols-3 lg:gap-6">
            @foreach ($featured_trips as $item)
            <div class="item">

                <a href="{{ route('itinerary.index', ['slug'=>$item->slug])}}/">
                    {{-- <div class="blend1">


                        <div class="thumbnail">
                            <div class="thumbnail-outer">
                                <div class="thumbnail-inner">
                                    <img src="{{Voyager::image($item->thumbnail('cropped'))}}" alt="{{$item->title}}"
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="inline-block -mt-8 price p-2 bg-regal-red">
                            <p class="uppercase text-base">
                                $ {{$item->price}} </p>

                        </div>


                        <div class="w-full text-white">
                            <div class="flex flex-col justify-between p-4 ">

                                <div class="flex flex-col ">
                                    <div class="font-semibold">
                                        <h4>{{ $item->title}}</h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="bg-white">
                        <!-- Image -->

                        <div class="h-56 relative">
                            <img src="{{Voyager::image($item->thumbnail('cropped'))}}" alt="{{$item->title}}"
                                class="card-img-top h-56 object-cover">
                                @if ($item->rating == 5)
                                <div class="ribbon_3"><span>Top Rated</span></div>
                                @endif

                                @php

                    if (!empty($item->discount)){
                    $real_price = $item->price;
                    $discount_price = number_format($item->price - ($item->discount *$item->price / 100));

                    // $save = ($item->price - $item->discount);

                    // $percent_off = round(($discount_price / $item->price) * 100);

                    $save = number_format($item->discount *$item->price / 100);
                    $percent_off = $item->discount;

                    }
                    else {
                    $real_price = $item->price;
                    $save = 0;
                    $percent_off = 0;
                    }




                    @endphp
                                @if ($item->discount)
                                {{-- <div class="badge_save">Save<strong class="text-sm block">{{ (100 - $percent_off)}}%</strong></div> --}}
                                <div class="badge_save">Save<strong class="text-sm block">{{$percent_off}}%</strong></div>
                                @endif

                                <div class="absolute right-2 top-2">

                                    <p class="px-2 py-1 text-sm text-white bg-regal-red font-bold rounded-lg">
                                    {{ $item->duration}} Days
                                    </p>
                                </div>

                        </div>
                        <!-- Price -->

                        <div class="shadow-lg">

                        <div class="text-sm price ml-4 py-1 px-3 bg-regal-blue text-white text-center rounded-xl -mt-4 pull-top-15px z-1 relative w-32 width-105px">
                            @if ($item->discount)
                                <strong class="mr-1 line-through margin-right-5px">
                                    $ {{number_format($real_price)}}</strong>

                                @endif

                            <strong class="mr-1 margin-right-5px">

                                $ {{number_format($real_price - $save)}}</strong>

                        </div>

                        <!-- tourism body -->
                        <div class="p-4 flex justify-between items-center h-16">
                            <p class="flex-1 flex-wrap capitalize text-black font-semibold">{{ $item->title }}</p>


                            {{-- <p class="flex-shrink-0 text-sm">

                                    <span class="">
                                        <i class="text-regal-red fa fa-clock-o mr-2"></i>
                                        {{ $item->duration}} Days</span>
                                </p> --}}
                        </div>
                        </div>
                    </div>

            </div>

            @endforeach

        </div>

    </div>

