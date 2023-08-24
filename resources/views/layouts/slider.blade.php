<div class="overflow-hidden relative hidden md:block">
    <div class="main_slider js_height">
        <div class="slider_wrap" id="main_slider_wrap">
            @foreach ($sliders as $key => $detail)
                <a class="cursor-pointer" href="{{ $detail->link }}">
                    <amp-img v-pre alt="{{ $detail->title }}" title="{{ $detail->title }}" layout="responsive"
                        src="{{ Voyager::image($detail->image) }}" width="1366" height="500" class="">
                    </amp-img>
                </a>
            @endforeach
        </div>
        <div class="arrows flex items-center">
            <div class="arrow prev"></div>
            <div class="arrow next"></div>
        </div>
    </div>
</div>
