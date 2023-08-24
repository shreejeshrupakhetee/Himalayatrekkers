<section id="perfect" class="mt-5 lg:mt-12 perfect-holidays px-4">
    <div class="container mx-auto">
        <h1 class="text-xl md:text-2xl text-center ch"><span class="uppercase">
                Tours <span class="text-3xl md:text-4xl text-regal-red">&</span> Treks in
                Nepal, Bhutan, Tibet, India
        </h1>

        @php
        list($first) = explode("\
        ",  setting('home.welcome_content'));
        @endphp

        <div class="mt-4 home_content main_content lg:text-center md:px-4 lg:px-8">
            {{-- <div class="container mx-auto"> --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-8">
                <div class="col-span-1">
                    <div class="para">
                        {!! setting('home.welcome_content') !!}
                    </div>
                </div>
                <div class="col-span-1 flex justify-center items-center">
                    <div class="ht-box h-80 xs-h-64 md:h-72"><span class="fas fa2">&#8221;</span>
                        <div class="text"><span class="fas fa1">
                                <span>&#8220;</span>
                            </span>
                            <div class="px-10 py-7">
                                <?php echo substr($first, 0, strpos($first, "</p>"));?>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
            {{-- <div class="flex w-full relative overflow-hidden mt-8 lg:mt-0 -ml-4 xl:ml-0">
                <div class="xl-wh-80 overflow-hidden -ml-2 xl:ml-0">
                    <figure
                        class="w-32 h-32 xl:w-56 xl:h-56 m-8 xl:m-12 bg-regal-blue rotate-45 overflow-hidden">
                        </figure>
                </div>
                <div
                    class="w-28 xl:w-48 h-28 xl:h-48 m-10 xl:m-16 absolute bg-white -z-10 border-[6px] xl:border-8 left-4 xl:left-12 rotate-45 border-b-regal-blue border-l-red-700 border-r-regal-blue border-t-red-700">
                </div>
                <h2
                    class="absolute left-28 xl:left-64 text-base xl:text-xl top-3 sm:top-1 xl:top-14 pl-6 xl:pl-20 text-red-700">
                    Himalayan Trekkers</h2>
                <div class="absolute left-28 xl:left-64 top-1/2 bg-regal-blue pr-2 xl:pr-10 pl-16 ml-2 xl:pl-20 w-72 xl:w-96 pt-1 -z-20 border-t-[5px] border-red-700"
                    style="transform:translateY(-100%)">
                </div>
            </div> --}}
        </div>

    </div>
</section>

<section id="perfecto" class="mt-5 md:mt-12">


    <vue-tabs v-bind:width="'md:w-3/5'">
        <vue-tab class="relative" id="bestsellers" :active="true" label="Best Sellers">
            <div class="px-4 md:px-8 lg:px-8">
                @include('partials._packages', ['trips' => $result2])
            </div>
        </vue-tab>
        <vue-tab id="featured" class="relative" label="Featured">
            <div class="px-4 md:px-8 lg:px-8">
                @include('partials._packages', ['trips' => $result1])
            </div>
        </vue-tab>
        <vue-tab id="multicountry" class="relative" label="Multi Country">
            <div class="px-4 md:px-8 lg:px-8">
                @include('partials._packages', ['trips' => $result3])
            </div>
        </vue-tab>
        <vue-tab id="climbing" class="relative" label="Peak Climbing">
            <div class="px-4 md:px-8 lg:px-8">
                @include('partials._packages', ['trips' => $result4])
            </div>
        </vue-tab>
        <vue-tab id="daytrips" class="relative" label="Day Trips">
            <div class="px-4 md:px-8 lg:px-8">
                @include('partials._packages', ['trips' => $result5])
            </div>
        </vue-tab>
    </vue-tabs>
</section>
