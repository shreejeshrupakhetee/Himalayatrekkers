<a id="blog{{ $key + 1 }}" href="{{ route('blogSingle.index', $blog->slug) }}"
    class="mt-5 md:mt-0 blog_item block relative hover-effect">
    <div class="blog_item_top mb-4  has-background-image" data-src="{{ Voyager::image($blog->thumbnail('cropped')) }}"
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


                    <div class="hidden lg:block tags">
                        <div class="tag {{ $catcolor }} inline-block btns">{{ $blog->category->name }}</div>

                    </div>
                    <h3 class="md:mt-0 text-white text-sm font-semibold md:text-xl lg:text-2xl">
                        {{ $blog->title }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="blog_item_bottom shadow-lg p-2">
        <div class="date mb-2 text-sm h-12 flex justify-between items-center">

             <p class="text-light-gray font-semibold">{{ $blog->created_at->toFormattedDateString() }}</p>
            {{-- <p>Author: {{ $blog->authorId->name ? $blog->authorId->name : 'Himalayan Trekkers' }}</p> --}}
        </div>
        
    </div>
</a>
