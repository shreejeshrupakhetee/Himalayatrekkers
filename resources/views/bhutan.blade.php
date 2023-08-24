@extends('layouts.front')
@include('layouts.countrymeta')

@section('content')

    <div id="app" v-cloak>

        @include('layouts.newnavbar')

        @include('layouts.countryview', ['heading' => 'Bhutan - Land of Thunder Dragon'])



        <section class="py-10 px-2 md:px-8 bg-shuttle-gray">
            <div class="container mx-auto">
                <front-page :id="{{ json_encode($detail->id) }}"></front-page>
            </div>
        </section>
        <section class="bg-gray-100">
            <div class="my-10 px-2 md:px-8">
                @if (!empty($detail->relatedreads))
                    @php
                        $json_to_array3 = json_decode($detail->relatedreads, true);
                        $featured_blogs = \TCG\Voyager\Models\Post::whereIn('id', $json_to_array3)
                            ->select('id', 'title', 'slug', 'image', 'category_id', 'created_at')
                            ->with([
                                'category' => function ($query) {
                                    $query->select('id', 'name');
                                },
                            ])
                            ->get();
                        // dd($featured_blogs);
                    @endphp
                    <div class="p-4">
                        <h3 class="text-center block_title text-black font-bold mb-6 text-3xl">Bhutan Travel Essential &
                            Advice</h3>
                        <p class="text-center">Visa, Best time, Packing list, Permits, Getting around and more in Nepal
                        </p>

                        <div class="mt-10 md:grid md:grid-cols-2 lg:grid-cols-3  md:gap-6">
                            @foreach ($featured_blogs as $blog)

                                <a href="{{ route('blogSingle.index', $blog->slug) }}"
                                    class="mt-5 md:mt-0 blog_item block relative">
                                    <div class="blog_item_top mb-4 lozad-background"
                                        data-background-image-set="url({{ Voyager::image($blog->thumbnail('small')) }}) 1x, url({{ Voyager::image($blog->image) }}) 2x">
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
                                                    <h3 class="text-white text-base md:text-xl lg:text-2xl">
                                                        {{ $blog->title }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </a>


                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>



        @include('layouts.footer')

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/frontcountry.js?v=1.0') }}"></script>


@endsection
