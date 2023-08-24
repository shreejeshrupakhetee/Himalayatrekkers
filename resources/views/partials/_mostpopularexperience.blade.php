    <div class="mt-5 container mx-auto relative">

        <div class="md:grid md:grid-cols-2 md:gap-2 lg:grid-cols-3 lg:gap-6">
            @foreach ($popular_trips as $item)
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
                    <div class="bg-white border">
                        <!-- Image -->

                        <div class="h-52">
                            <img src="{{Voyager::image($item->thumbnail('cropped'))}}" alt="{{$item->title}}"
                                class="card-img-top h-52 object-cover">
                        </div>
                        <!-- Price -->
                        <div class="shadow-inner">
                        <div class="text-sm price ml-4 py-1 px-3 bg-regal-blue text-white text-center rounded-xl -mt-4 pull-top-15px z-1 relative w-40 width-105px">
                            <strong class="mr-1 margin-right-5px">$ {{number_format($item->price)}} <span class="text-xs">per person</span></strong>
                        </div>
                        <!-- tourism body -->
                        <div class="p-4 flex justify-between items-center h-16">
                            <p class="flex-1 flex-wrap capitalize text-black font-semibold">{{ $item->title }}</p>


                            <p class="flex-shrink-0 text-sm">

                                    <span class="">
                                        <i class="text-regal-red fa fa-clock-o mr-2"></i>
                                        {{ $item->duration}} Days</span>
                                </p>
                        </div>
                        </div>
                    </div>

            </div>

            @endforeach

        </div>

    </div>

