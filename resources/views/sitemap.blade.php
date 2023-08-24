@extends('layouts.front')

@section('metatags')
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<noscript><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></noscript>
@stop
@section('css')
@endsection

@section('content')
   <div id="app" v-cloak>
        @include('layouts.newnavbar')

        <div class="px-4 md:px-24">



                    <h1 class="inline-block py-4 font-bold text-regal-blue text-xl sm:text-3xl md:text-4xl xl:text-5xl leading-loose">
                        Sitemap
                    </h1>


        </div>
        <main class="px-4 md:px-24" id="sitemap-wrapper">
                <div class="secondary__heading card p-3">
                        <h2 class="secondary-heading text-center my-4">Countries</h2>


                                <ul class="px-2 my-4">
                                        <div class="flex flex-wrap -mx-2 ">
                                                <?php
                                                $allcountry = App\Country::all('title');

                                            ?>

                                            @foreach ($allcountry as $nepal)
                                            @php
                                            $cname = $nepal->title;
                                            if(strlen($cname)>6){
                                            $cslug = Str::slug($cname)."-tours";
                                            }
                                            else{
                                            $cslug = Str::slug($cname);
                                            }
                                            @endphp
                                          <li class=" w-full md:w-1/2 px-2 flex-shrink-0 ">

                                            <a class="block lg:text-lg hover:underline hover:text-red-700" href="/{{$cslug}}">
                                                <span>   <i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>
                                                {{ $nepal->title}}</a>
                                          </li>
                                          @endforeach


                                        </div>
                                </ul>

                    </div>
                <div class="secondary__heading card p-3">
                        <h2 class="secondary-heading text-center my-4">Activities</h2>
                        <?php $acti = App\Activity::all('title','slug'); ?>

                                <ul class="px-2 my-4">
                                        <div class="flex flex-wrap -mx-2 ">
                                                @foreach ($acti as $item)
                                          <li class=" w-full md:w-1/2 px-2 flex-shrink-0 ">

                                            <a class="block lg:text-lg hover:underline hover:text-red-700" href="{{ route('singleactivity.index',['slug'=>$item->slug])}}">
                                                <span>   <i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>
                                                {{ $item->title}}</a>
                                          </li>
                                          @endforeach


                                        </div>
                                </ul>

                    </div>
                <div class="secondary__heading card p-3">
                        <h2 class="secondary-heading text-center my-4">Regional Trek</h2>
                        <?php $regional = App\Region::skip(1)->take(15)->get(); ?>

                                <ul class="px-2 my-4">
                                        <div class="flex flex-wrap -mx-2 ">
                                                @foreach ($regional as $act)
                                          <li class=" w-full md:w-1/2 px-2 flex-shrink-0 ">

                                            <a class="block lg:text-lg hover:underline hover:text-red-700" href="{{ route('singleregion.index',['slug'=>$act->slug])}}">
                                                <span>   <i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>
                                                {{ $act->title}}</a>
                                          </li>
                                          @endforeach


                                        </div>
                                </ul>

                    </div>
                <div class="secondary__heading card p-3">
                        <h2 class="secondary-heading text-center my-4">Travel Styles</h2>
                        <?php $specs = App\TravelStyle::all('title','slug'); ?>

                                <ul class="px-2 my-4">
                                        <div class="flex flex-wrap -mx-2 ">
                                                @foreach ($specs as $item)
                                          <li class=" w-full md:w-1/2 px-2 flex-shrink-0 ">

                                            <a class="block lg:text-lg hover:underline hover:text-red-700" href="{{ route('singletravel.index',['slug'=>$item->slug])}}">
                                                <span>   <i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>
                                                {{ $item->title}}</a>
                                          </li>
                                          @endforeach


                                        </div>
                                </ul>

                    </div>

                <div class="secondary__heading card p-3">
                        <h2 class="secondary-heading text-center my-4">Tours and Treks</h2>
                        <?php $tours = App\Trip::all('title','slug'); ?>

                                <ul class="px-2 my-4">
                                        <div class="flex flex-wrap -mx-2 ">
                                                @foreach ($tours as $item)
                                          <li class=" w-full md:w-1/2 px-2 flex-shrink-0 ">

                                            <a class="block lg:text-lg hover:underline hover:text-red-700" href="/itinerary/{{$item->slug}}/">
                                                <span>   <i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>
                                                {{ $item->title}}</a>
                                          </li>
                                          @endforeach


                                        </div>
                                </ul>

                    </div>
                    <div class="secondary__heading card p-3">
                        <h2 class="secondary-heading text-center my-4">Blogs</h2>
                        <ul class="px-2 my-4">
                                <?php $blogs = TCG\Voyager\Models\Post::all('title','slug'); ?>
                            <div class="flex flex-wrap -mx-2">
                                    @foreach ($blogs as $item)
                              <li class="w-full md:w-1/2 px-2 flex-shrink-0 ">

                                <a class="block lg:text-lg hover:underline hover:text-red-700" href="{{ route('blogSingle.index',['slug'=>$item->slug])}}">
                                        <span>   <i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>
                                    {{ $item->title}}</a>
                              </li>
                              @endforeach


                            </div>
                    </ul>
                    </div>
                    <div class="secondary__heading card p-3">
                        <h2 class="secondary-heading text-center my-4">Useful Links</h2>
                        <ul class="px-2 my-4">

                            <div class="flex flex-wrap -mx-2">

                              <li class="w-full md:w-1/2 px-2 flex-shrink-0 ">

                                <a class="block lg:text-lg hover:underline hover:text-red-700" href="/about-us"><span><i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>
                                    About Us</a>
                              </li>
                              <li class="w-full md:w-1/2 px-2 flex-shrink-0 ">

                                <a class="block lg:text-lg hover:underline hover:text-red-700" href="/contact-us"><span><i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>
                                    Contact Us</a>
                              </li>
                              <li class="w-full md:w-1/2 px-2 flex-shrink-0 "><a
                                    class="block lg:text-lg hover:underline hover:text-red-700"
                                    href="/privacy-policy"
                                  ><span><i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>Privacy Policy</a> </li>

                                 <li class="w-full md:w-1/2 px-2 flex-shrink-0 "><a
                                    class="block lg:text-lg hover:underline hover:text-red-700"
                                    href="/terms-and-condition"
                                  ><span>   <i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>Terms and Condition</a> </li>

                                 <li class="w-full md:w-1/2 px-2 flex-shrink-0 "><a
                                    class="block lg:text-lg hover:underline hover:text-red-700"
                                    href="/legal-documents"
                                  ><span>   <i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>Legal Documents</a> </li>
                                 <li class="w-full md:w-1/2 px-2 flex-shrink-0 "><a
                                    class="block lg:text-lg hover:underline hover:text-red-700"
                                    href="/reviews"
                                  ><span>   <i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>Reviews</a> </li>
                                 <li class="w-full md:w-1/2 px-2 flex-shrink-0 "><a
                                    class="block lg:text-lg hover:underline hover:text-red-700"
                                    href="/blog"
                                  ><span>   <i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>Blogs</a> </li>
                                 <li class="w-full md:w-1/2 px-2 flex-shrink-0 "><a
                                    class="block lg:text-lg hover:underline hover:text-red-700"
                                    href="/countries"
                                  ><span>   <i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>Countries</a> </li>
                                 <li class="w-full md:w-1/2 px-2 flex-shrink-0 "><a
                                    class="block lg:text-lg hover:underline hover:text-red-700"
                                    href="/travelstyle"
                                  ><span>   <i class="fa fa-dot-circle-o mr-3" aria-hidden="true"></i></span>Travel Style</a> </li>



                            </div>
                    </ul>
                    </div>



        <div class="h-12"></div>

        </main>
        <back-to-top>
            <i class="fa fa-arrow-up fa-2x bg-red-600 rounded-full p-3 text-white" aria-hidden="true"></i>
        </back-to-top>



        <div class="bg-gray-700 h-4 md:h-4"></div>
        @include('layouts.footer')
    </div>



@endsection
@section('script')
<script src="{{ asset('js/region.js') }}"></script>
@endsection
