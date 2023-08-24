<div class="hidden">
    <section class="px-2 md:px-8">

        <div class="container mx-auto">
            {{-- <h2 style="color:#D31A06;" class="text-xl text-center md:text-4xl">Latest Blog and News</h2> --}}
            {{-- <h4 class="text-black text-3xl text-center uppercase font-semibold">Latest Blog & News</h4>

            <p class="mt-2 text-center text-sm font-semibold italic">
                Read posts, watch videos and be inspired to travel
            </p> --}}

            {{-- <a class="inline-flex justify-end text-sm md:text-base uppercase font-semibold py-2"
                href="{{ route('blog.index') }}">More Blogs</a> --}}


            <div class="mt-10 sm:grid sm:grid-cols-12 sm:gap-6">

                @foreach ($featured_blogs as $key => $blog)

                    {{-- @include('partials._blogpackages') --}}
                    {{-- @if ($key == 0)
            <div class="col-span-6">
                <a href="{{ route('blogSingle.index', $blog->slug) }}"
                    class="mt-5 md:mt-0 blog_item block relative">
                    <div class="blog_item_top mb-4 has-background-image"
                        data-src="{{ Voyager::image($blog->thumbnail('cropped')) }}"
                        style="background-image: url({{ Voyager::image($blog->thumbnail('cropped')) }});">
                        <div class="w-full overflow-hidden relative" style="padding-bottom: 60%;">

                            <div class="absolute w-full h-full px-5 py-7">
                                <div class="w-full h-full flex flex-col justify-between">

                                    @php
                                        $color = $blog->category->id;
                                        if ($color == 1) {
                                            $catcolor = 'red';
                                        } elseif ($color == 2) {
                                            $catcolor = 'blue';
                                        } elseif ($color == 3) {
                                            $catcolor = 'black';
                                        } elseif ($color == 4) {
                                            $catcolor = 'green';
                                        } else {
                                            $catcolor = 'orange';
                                        }

                                    @endphp


                                    <div class="tags">
                                        <div class="tag {{ $catcolor }} inline-block">
                                            {{ $blog->category->name }}</div>

                                    </div>
                                    <div class="text-white ts">
                                        <h3 class="text-base md:text-xl lg:text-2xl">
                                            {{ $blog->title }}
                                        </h3>
                                        <p class="text-sm font-semibold">
                                            {{ $blog->created_at->toFormattedDateString() }} by {{ $blog->author }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </a>

            </div>

        @else
        <div class="col-span-3">


            <a href="{{ route('blogSingle.index', $blog->slug) }}"
                class="mt-5 md:mt-0 blog_item block relative">
                <div class="blog_item_top mb-4 has-background-image"
                    data-src="{{ Voyager::image($blog->thumbnail('cropped')) }}"
                    style="background-image: url({{ Voyager::image($blog->thumbnail('cropped')) }});">
                    <div class="w-full overflow-hidden relative" style="padding-bottom: 60%;">

                        <div class="absolute w-full h-full px-5 py-7">
                            <div class="w-full h-full flex flex-col justify-between">

                                @php
                                    $color = $blog->category->id;
                                    if ($color == 1) {
                                        $catcolor = 'red';
                                    } elseif ($color == 2) {
                                        $catcolor = 'blue';
                                    } elseif ($color == 3) {
                                        $catcolor = 'black';
                                    } elseif ($color == 4) {
                                        $catcolor = 'green';
                                    } else {
                                        $catcolor = 'orange';
                                    }

                                @endphp


                                <div class="tags">
                                    <div class="tag {{ $catcolor }} inline-block">
                                        {{ $blog->category->name }}</div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="blog_item_bottom shadow-xl rounded-xl p-2">
                    <div class="date text-sm">

                        <p class="text-regal-red font-semibold">
                            {{ $blog->created_at->toFormattedDateString() }}
                        </p>
                        <p class="mt-2 text-regal-blue font-bold">{{ $blog->author }}</p>
                    </div>
                    <div class="mt-2 pb-2">
                        <h3 class="font-semibold text-black hover:text-regal-blue">
                            {{ $blog->title }}
                        </h3>
                    </div>
                </div>
            </a>


        </div>

        @endif --}}

                @endforeach

            </div>



        </div>
    </section>

</div>






<section class="pt-5 px-4 md:py-10 md:px-8 bg-white">





    <div class="container mx-auto">


        <h2 class="secondary-heading">Latest Blog & News</h2>

        <p class="mt-2 text-center text-sm font-semibold italic">
            Read posts, watch videos and be inspired to travel
        </p>

        <div class="mt-10 grid grid-cols-2 gap-2 lg:grid-cols-3 lg:gap-6">
            @foreach ($featured_blogs as $key => $blog)

                @include('partials._blogpackages')
            @endforeach
        </div>
        <div class="mt-10 flex justify-center">
            <a class="inline-block w-max bg-regal-red rounded-full text-white text-sm md:text-base uppercase font-semibold px-4 hover:bg-hover-yellow hover:text-black py-2"
                href="{{ route('blog.index') }}">All Posts</a>

        </div>


    </div>
</section>
