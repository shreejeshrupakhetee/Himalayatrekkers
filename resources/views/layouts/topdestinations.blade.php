@php
        $data['gallery'] = json_decode($detail->gallery);
        @endphp
        @if(!empty($data['gallery']))
<section class="mt-12 lg:mt-16 px-2 md:px-8">
    <div class="container mx-auto">

        <h2 class="secondary-heading">Gallery
        </h2>


        <div class="mt-5 md:mt-10">

            <div class="grid md:grid-cols-5 gap-5">
                {{-- <div class="w-full">
                    <a href="#">
                        <div class="relative blend1 shadowed">
                            <img src="/images/everestregion.jpg" class="h-56 lg:h-72 w-full object-cover r-20" />
                            <div class="positionb w-full">
                                <div class="flex flex-col justify-end p-4 h-56 lg:h-72 text-white">
                                    <div class="flex flex-col w-full">
                                        <p>Everest Region</p>
                                        <p>
                                            <span class="inline-block "><svg width="15" height="12" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.4507 0L17.2975 0.03L12.1831 2.1L6.43666 0L1.03497 1.9C0.833847 1.97 0.690186 2.15 0.690186 2.38V17.5C0.690186 17.78 0.90089 18 1.16906 18L1.3223 17.97L6.43666 15.9L12.1831 18L17.5848 16.1C17.786 16.03 17.9296 15.85 17.9296 15.62V0.5C17.9296 0.22 17.7189 0 17.4507 0ZM12.1831 16L6.43666 13.89V2L12.1831 4.11V16Z" fill="white"/>
                                            </svg>
                                            </span>
                                            + 20 Routes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="w-full">
                    <a href="#">
                        <div class="relative blend1 shadowed">
                            <img src="/images/annapurnaregion.jpg" class="h-56 lg:h-72 w-full object-cover r-20" />
                            <div class="positionb w-full">
                                <div class="flex flex-col justify-end p-4 h-56 lg:h-72 text-white">
                                    <div class="flex flex-col w-full">
                                        <p>Annapurna Region</p>
                                        <p> <span class="inline-block "><svg width="15" height="12" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.4507 0L17.2975 0.03L12.1831 2.1L6.43666 0L1.03497 1.9C0.833847 1.97 0.690186 2.15 0.690186 2.38V17.5C0.690186 17.78 0.90089 18 1.16906 18L1.3223 17.97L6.43666 15.9L12.1831 18L17.5848 16.1C17.786 16.03 17.9296 15.85 17.9296 15.62V0.5C17.9296 0.22 17.7189 0 17.4507 0ZM12.1831 16L6.43666 13.89V2L12.1831 4.11V16Z" fill="white"/>
                                            </svg>
                                            </span>
                                            +15 Routes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="w-full">
                    <a href="#">
                        <div class="relative blend1 shadowed">
                            <img src="/images/rararegion.jpg" class="h-56 lg:h-72 w-full object-cover r-20" />
                            <div class="positionb w-full">
                                <div class="flex flex-col justify-end p-4 h-56 lg:h-72 text-white">
                                    <div class="flex flex-col w-full">
                                        <p>Rara Region</p>
                                        <p> <span class="inline-block "><svg width="15" height="12" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.4507 0L17.2975 0.03L12.1831 2.1L6.43666 0L1.03497 1.9C0.833847 1.97 0.690186 2.15 0.690186 2.38V17.5C0.690186 17.78 0.90089 18 1.16906 18L1.3223 17.97L6.43666 15.9L12.1831 18L17.5848 16.1C17.786 16.03 17.9296 15.85 17.9296 15.62V0.5C17.9296 0.22 17.7189 0 17.4507 0ZM12.1831 16L6.43666 13.89V2L12.1831 4.11V16Z" fill="white"/>
                                            </svg>
                                            </span>
                                            3 Routes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="w-full">
                    <a href="#">
                        <div class="relative blend1 shadowed">
                            <img src="/images/makalubarunregion.jpg" class="h-56 lg:h-72 w-full object-cover r-20" />
                            <div class="positionb w-full">
                                <div class="flex flex-col justify-end p-4 h-56 lg:h-72 text-white">
                                    <div class="flex flex-col w-full">
                                        <p>Makalu Barun Valley</p>
                                        <p> <span class="inline-block "><svg width="15" height="12" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.4507 0L17.2975 0.03L12.1831 2.1L6.43666 0L1.03497 1.9C0.833847 1.97 0.690186 2.15 0.690186 2.38V17.5C0.690186 17.78 0.90089 18 1.16906 18L1.3223 17.97L6.43666 15.9L12.1831 18L17.5848 16.1C17.786 16.03 17.9296 15.85 17.9296 15.62V0.5C17.9296 0.22 17.7189 0 17.4507 0ZM12.1831 16L6.43666 13.89V2L12.1831 4.11V16Z" fill="white"/>
                                            </svg>
                                            </span>
                                            6 Routes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> --}}
                @foreach ($data['gallery'] as $image)

                <a href="{{ Voyager::image($image) }}" v-lightbox>
                <div class="mx-2 h-56 md:h-72 cursor-pointer">


                            <figure class="bg-white rounded-lg">
                                <img class="object-cover h-56 md:h-72 w-full rounded-lg"
                               src="{{ Voyager::image($image) }}"
                               alt="{{$detail->alt_tag}}">
                            </figure>


                        </div>
                    </a>


                    @endforeach
                    <lightbox></lightbox>

            </div>


        </div>

    </div>

</section>
@endif
