<section class="mt-12 px-2 md:px-8">
    <h2 class="lg:hidden mt-2 mb-5 text-left font-semibold text-regal-blue text-2xl">Inclusion</h2>
    <div id="inc" class="lg:grid lg:grid-cols-12 lg:gap-8">
        <div class="hidden lg:block lg:col-span-2">
            <h4 class="mt-3 pt-2 md:text-base xl:text-xl border-t-4 border-regal-green">Inclusion</h4>
        </div>
        <div class="lg:col-span-6">
            <div class="flex flex-col items-baseline">

                <div role="list" class="included">
                    <h3 class="font-semibold mb-2 lg:text-xl">Whats Included</h3>

                    {!! $detail->includes !!}
                </div>
                <div role="list" class="mt-4 excluded">
                    <h3 class="font-semibold mb-2 lg:text-xl">Whats Not Included</h3>

                    {!! $detail->excludes !!}
                </div>


            </div>


        </div>
        <div class="hidden md:block mt-3 md:mt-0 w-full lg:col-span-4" style="align-self: start;">

        </div>
    </div>
</section>
