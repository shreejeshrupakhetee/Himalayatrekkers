<?php

namespace App\Providers;

use App\Contact;
use App\Trending;
use Carbon\Carbon;
use App\TripBooking;
use App\Mail\ContactMail;
use TCG\Voyager\Models\Post;
use App\Mail\TripBookingMail;
use TCG\Voyager\Models\Category;
use Facades\App\Http\Daos\PagesDao;
use Facades\App\Http\Daos\RegionDao;
use Illuminate\Support\Facades\Mail;
use Facades\App\Http\Daos\ActivityDao;
use Illuminate\Support\ServiceProvider;
use Facades\App\Http\Daos\TravelStyleDao;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app['view']->addNamespace('front', base_path() . '/resources/views/front');

        // if (\App::environment('production_ssl')) {
        //     $url->forceScheme('https');
        // }
        //
        // $this->app->bind('TCG\Voyager\Models\Post', function ($app) {
        //     return new App\Post;
        // });


        Contact::created(function ($enquiry) {
            Mail::to(setting('site.email'))->cc('info@himalayantrekkers.com')->send(new ContactMail($enquiry));
        });


        // //laravel observer (fdwala)
        TripBooking::created(function ($booking) {
            Mail::to(setting('site.email'))->cc('info@himalayantrekkers.com')->send(new TripBookingMail($booking));
        });



        //travelstyles
        \view()->composer('*', function ($view) {
            $travelstyle = cache()->remember(
                'travelstyle',
                Carbon::parse('10 days'),
                function () {
                    return TravelStyleDao::getAll();
                }
            );
            $view->with('travelstyles', $travelstyle);
        });





        // regions
        \view()->composer('*', function ($view) {
            $regions = cache()->remember(
                'regions',
                Carbon::parse('10 days'),
                function () {
                    return RegionDao::getAlls();
                }
            );
            $view->with('regions', $regions);
        });

        \view()->composer('*', function ($view) {
            $pages = cache()->remember(
                'pages',
                Carbon::parse('10 days'),
                function () {
                    return PagesDao::getActivePages();
                }
            );
            $view->with('pages', $pages);
        });
        \view()->composer('*', function ($view) {
            $activities = cache()->remember(
                'activities',
                Carbon::parse('10 days'),
                function () {
                    return ActivityDao::getAll();
                }
            );
            $view->with('activities', $activities);
        });
        //homepage blog
        \view()->composer('welcome', function ($view) {
            $featured_blogs = cache()->remember(
                'featured_blogs',
                Carbon::parse('60 seconds'),
                function () {
                    return Post::with(['category','authorId'])->where('status', 'PUBLISHED')->latest()->limit(4)->get(['slug', 'title', 'excerpt','author_id', 'category_id', 'image',  'created_at', 'body']);
                }
            );
            $view->with('featured_blogs', $featured_blogs);
        });

        \view()->composer('partials._blogsidebar', function ($view) {
            $cat = cache()->remember(
                'cat',
                Carbon::parse('660 seconds'),
                function () {
                    return $cat = Category::withCount(['posts'])->get();
                }
            );
            $view->with('cat', $cat);
        });
        \view()->composer('partials._trendings', function ($view) {
            $trendings = cache()->remember(
                'trendings',
                Carbon::parse('660 seconds'),
                function () {
                    return $trendings = Trending::all();
                }
            );
            $view->with('trendings', $trendings);
        });
    }
}
