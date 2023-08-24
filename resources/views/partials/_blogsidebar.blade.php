<div class="hidden md:block">
    <blog-search></blog-search>
</div>
<div class="mt-5 p-5 bg-light-graytwo rounded-l-xl">
    <h3 class="text-regal-blue mb-6 text-3xl">Categories</h3>
    <ul class="flex flex-wrap items-center">
        @foreach ($cat as $c)
            @if ($c->posts_count)
                <li class="m-1 text-white py-1 px-4 bg-regal-green rounded-full hover:bg-hover-green">
                    <a href="{{ route('blog.category', $c->slug) }}">
                        <p>{{ $c->name }}<span class="ml-4">{{ $c->posts_count }}</span></p>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>

</div>
