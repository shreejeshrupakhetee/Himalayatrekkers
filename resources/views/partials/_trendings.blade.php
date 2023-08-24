<section class="mt-5 text-black px-4 md:px-8 pb-12 bg-shuttle-gray">
    <div class="container mx-auto">
        <h2 class="secondary-heading text-left">Recent Trendings @HimalayanTrekkers</h2>
        <div class="mt-5 flex flex-wrap trendings">
            @foreach ($trendings as $item)
                 <a href="{{$item->link}}">{{$item->title}}</a>
            @endforeach
        </div>
    </div>
</section>
