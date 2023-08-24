<section id="includes" class="mt-5 px-4 md:px-6 xl:px-8">
    <div class="container mx-auto">
        <div class="lg:grid lg:grid-cols-12  lg:gap-5">
            <div class="col-span-8 bg-white">
                @if (!empty($detail->includes))
                    <h3 class="pl-5 pt-5 border-t-4 border-regal-red uppercase font-bold text-2xl ">Includes</h3>
                    <div class="main_content p-4 included">

                        {!! $detail->includes !!}
                    </div>
                @endif
                @if (!empty($detail->excludes))
                    <h3 class="pl-5 uppercase font-bold text-2xl" id="excludes">Excludes</h3>
                    <div class="p-4 excluded main_content">
                        {!! $detail->excludes !!}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-span-4"></div>
    </div>

</section>