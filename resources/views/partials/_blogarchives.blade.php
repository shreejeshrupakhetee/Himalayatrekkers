<div class="clear-both mt-5 p-5 bg-light-grayone rounded-l-xl">
    <h4 class="text-regal-blue text-3xl">
        Blog Archives
    </h4>
    <ul class="mt-5">
        @foreach ($archives as $a)
            <li>
                <a href="{{ route('blog.archive', $a['slug']) }}"
                    class="block font-semibold text-regal-blue active mt-2 hover:text-regal-green">
                    <span>{{ $a['title'] }}</span>
                    {{-- <span class="count">56</span> --}}
                </a>
            </li>
        @endforeach

    </ul>
</div>
