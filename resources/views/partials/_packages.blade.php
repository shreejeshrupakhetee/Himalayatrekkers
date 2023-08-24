<div class="mt-5 relative">

    <div class="container mx-auto">
        <div class="grid grid-cols-2 gap-2 lg:grid-cols-3 lg:gap-6">
            @foreach ($trips as $item)
                @php
                    
                    if (!empty($item->discount)) {
                        // $real_price = $item->price;
                        // $discount_price = $item->discount;
                    
                        // $save = $item->price - $item->discount;
                    
                        // $percent_off = round(($discount_price / $item->price) * 100);
                    
                        $real_price = $item->price;
                        $discount_price = number_format($item->price - ($item->discount * $item->price) / 100);
                        $save = number_format(($item->discount * $item->price) / 100);
                        $percent_off = $item->discount;
                    } else {
                        $real_price = $item->price;
                        $save = 0;
                        $percent_off = 0;
                    }
                @endphp

                <a href="{{ route('itinerary.index', ['slug' => $item->slug]) }}/"
                    class="overflow-hidden package_item mt-5 shadow-md ">
                    <div class="package_item_top hover-effect lozad-background"
                        data-background-image="{{ Voyager::image($item->thumbnail('cropped')) }}">


                        <div class="sq_parent w-full relative overflow-hidden">
                            @if ($item->discount)
                                <div class="sq_wrap absolute -left-2 h-full font-semibold py-2">


                                    <p
                                        class="text-xs md:text-base border-r-2 border-regal-red leading-7 px-2 md:px-4 rounded-full mr-1 strikethrough bg-regal-red shadow-md text-white">
                                        US$ {{ number_format($item->price) }}
                                    </p>


                                </div>
                            @endif

                            <div
                                class="sq_wrap absolute top-12 right-2 md:top-0 md:right-0 h-full font-semibold md:py-2 md:px-8">
                                {{-- <div class="tag h-7 leading-7 px-2 rounded-md text-white mr-1 red">{{ $item->duration}} Days</div> --}}
                                @if ($item->reviews->count() > 0)
                                    <p
                                        class="text-xs sm:text-base leading-7 px-2 rounded-full shadow-md bg-white md:h-7">


                                        <svg class="inline-block h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            width="15" height="15">
                                            <path fill="#ffbd00"
                                                d="M7.5 0.25 L9.375 6 h5.625 L10.375 9.25 L12.25 14.875 L7.5 11.375 L2.75 14.875 L4.625 9.25 L0 6 h5.625 Z" />
                                        </svg>
                                        {{ number_format($item->reviews->avg('rating'), 2) }}

                                        <span class="hidden sm:inline-block">({{ $item->reviews->count() }})</span>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="package_item_bottom -mt-8">



                        <p
                            class="-mt-8 inline-block text-xs md:text-base price ml-4 py-1 px-2 bg-regal-blue text-white text-center rounded-xl relative z-1">
                            US$
                            {{ $item->discount ? number_format($item->price - ($item->discount * $item->price) / 100) : number_format($item->price) }}
                        </p>

                        <div
                            class="p-2 md:p-4 flex flex-col md:flex-row md:justify-between md:items-center md:h-16 relative">
                            <h3 title="{{ $item->title }}"
                                class="mb-0 text-sm md:text-base capitalize text-black md:pr-12 lg:pr-2 font-semibold hover:text-regal-red">
                                {{ $item->title }}</h3>
                            <h3 class="mt-1 md:mt-0 mb-0 text-sm md:font-semibold text-light-gray flex-shrink-0">
                                {{ $item->duration }}
                                {{ Str::plural('Day', $item->duration) }}</p>
                            {{-- @if ($item->discount)
                            <div class="badge_save">Save<strong class="text-sm block">{{ (100 - $percent_off)}}%</strong></div>
                            @endif --}}
                        </div>
                    </div>

                </a>
            @endforeach
        </div>
    </div>
</div>
