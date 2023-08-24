

@if (!empty($detail->altitudemap))
    <section id="mcmap" class="mt-5 px-4 md:px-6 xl:px-8">
        <div class="container mx-auto">
            <div class="lg:grid lg:grid-cols-12 lg:gap-5">
                <div class="col-span-8 bg-white">

                    <h2 class="pl-5 pt-5 border-t-4 border-regal-red uppercase font-bold text-2xl ">Altitude Map</h2>
                     <div class="p-4">
                          <amp-img class="rounded-l-xl" alt="{{ $detail->title }} Altitude Map"
                            layout="responsive" width="1366" height="768"
                            src="{{ Voyager::image($detail->altitudemap) }}"></amp-img>

                     </div>


                </div>



            </div>
        </div>
    </section>

@endif

  @if( !empty($map_image) && $detail->destinationId->id >= 5)
    <section id="am" class="mt-5 px-4 md:px-6 xl:px-8">
        <div class="container mx-auto">
            <div class="lg:grid lg:grid-cols-12 lg:gap-5">
                <div class="col-span-8 bg-white">

                    <h2 class="pl-5 pt-5 border-t-4 border-regal-red uppercase font-bold text-2xl ">Map</h2>


            <div class="p-4">

                <amp-img src="{{ Voyager::image($map_image)}}" alt="{{$detail->title}} Map" width="1366"
                    class="object-fill" aria-label="Map" height="768" on="tap:map-lightbox.open" role="button"
                    layout="responsive" tabindex="0"></amp-img>
                    {{-- <h3 id="trekmap" class="mt-2 font-semibold">{{$detail->title}} Map</h3> --}}
            </div>





                </div>



            </div>
        </div>
    </section>
@endif


