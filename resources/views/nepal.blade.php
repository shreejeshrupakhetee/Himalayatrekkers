@extends('layouts.front')
@include('layouts.countrymeta')
@section('content')

    <div id="app">

        @include('layouts.newnavbar')
        @include('layouts.countryview', ['heading' => 'Nepal - Paradise on Earth'])
        <section class="py-10 px-4 md:px-6 lg:px-8 bg-shuttle-gray">

            <front-page></front-page>
        </section>

        <section class="bg-light-grayone">
            <div class="px-2 md:px-8">
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
                        <h3 class="text-center text-black font-bold text-2xl md:text-3xl">Nepal Travel Essential &
                            Advice</h3>
                        <p class="mt-2 text-center text-regal-red italic font-bold">Read More About Nepal Such As Visa, Permits, And More!
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
    <script src="{{ asset('js/nepal.js?v=2.1') }}"></script>


@endsection
