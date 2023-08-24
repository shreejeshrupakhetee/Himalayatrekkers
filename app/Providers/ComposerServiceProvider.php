<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\Front\BlogViewComposer;
use App\Http\ViewComposers\Admin\PostViewComposer;
use App\Http\ViewComposers\Admin\FaqViewComposer;
use App\Http\ViewComposers\Admin\TripViewComposer;
use App\Http\ViewComposers\Admin\GalleryViewComposer;
use App\Http\ViewComposers\Admin\ItineraryViewComposer;
use App\Http\ViewComposers\Admin\ReviewViewComposer;
use App\Http\ViewComposers\Admin\DepartureViewComposer;
use App\Http\ViewComposers\Front\ReviewViewComposer as RViewComposer;
// use App\Http\ViewComposers\Front\HomePageViewComposer;

class ComposerServiceProvider extends ServiceProvider
{

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer('voyager::trips.edit-add',TripViewComposer::class);
        View::composer('voyager::itinerary.edit-add',ItineraryViewComposer::class);
        View::composer('voyager::gallery.edit-add',GalleryViewComposer::class);
        View::composer('voyager::reviews.edit-add',ReviewViewComposer::class);
        View::composer('voyager::faqs.edit-add',FaqViewComposer::class);
        View::composer('voyager::posts.edit-add',PostViewComposer::class);
        View::composer('voyager::departures.edit-add',DepartureViewComposer::class);

        //frontend
        // View::composer('welcome',HomePageViewComposer::class);
        View::composer('partials._blogarchives',BlogViewComposer::class);
        View::composer('faqs',FaqViewComposer::class);
        View::composer('vendor.voyager.trips.edit-add',TripViewComposer::class);
        // View::composer('allreviews',RViewComposer::class);
    }
}
