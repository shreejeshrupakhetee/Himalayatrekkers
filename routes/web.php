<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'admin.user']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



Route::get('/clear', 'UpdateController@clear')->name('clear');
Route::get('/frontsearch', 'FrontEndController@frontsearch');
Route::middleware('add-header')->get('/ampsearch', 'FrontEndController@ampsearch')->name('ampsearch');


Route::middleware(['admin.user'])->group(function () {
    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
        ->name('ckfinder_connector')->middleware('admin.user');

    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
        ->name('ckfinder_browser')->middleware('admin.user');
});


Route::group(['middleware' => ['web', 'collapseSpace', 'removeComments']], function () {

    Route::get('/', 'FrontEndController@index')->name('home.index');




    //countries
    Route::get('/nepal', 'FrontCountryController@nepal')->name('nepal.index');

    Route::get('/bhutan', 'FrontCountryController@bhutan')->name('bhutan.index');
    Route::get('/tibet', 'FrontCountryController@tibet')->name('tibet.index');
    Route::get('/india', 'FrontCountryController@india')->name('india.index');
    Route::get('/nepal-india-tours', 'FrontCountryController@nepalindia')->name('nepalindia.index');
    Route::get('/nepal-bhutan-tours', 'FrontCountryController@nepalbhutan')->name('nepalbhutan.index');
    Route::get('/nepal-tibet-tours', 'FrontCountryController@nepaltibet')->name('nepaltibet.index');
    Route::get('/nepal-bhutan-india-tours', 'FrontCountryController@nbi')->name('nbi.index');
    Route::get('/nepal-tibet-india-tours', 'FrontCountryController@nti')->name('nti.index');
    Route::get('/nepal-bhutan-tibet-tours', 'FrontCountryController@nbt')->name('nbt.index');
    Route::get('/nepal-bhutan-tibet-india-tours', 'FrontCountryController@nbti')->name('nbti.index');
    Route::get('/multicountry-tours-and-treks', 'FrontCountryController@multicountries')->name('multicountries.index');





    //activities

    Route::get('/activities', 'FrontEndController@activities')->name('activities.index');
    Route::get('/activities/{slug}', 'FrontEndController@singleactivity')->name('singleactivity.index');

    //regions

    Route::get('/trekking-in-nepal', 'FrontEndController@regions')->name('regions.index');

    //single region
    Route::get('/trekking-in-nepal/{slug}', 'FrontEndController@singleregion')->name('singleregion.index');


    //travelstyle single
    Route::get('/travelstyle/{slug}', 'FrontEndController@singletravel')->name('singletravel.index');

    //faqs
    Route::get('/faqs', 'FrontEndController@faqs')->name('faqs.index');
    Route::get('/legal-documents', 'FrontEndController@legal')->name('legal.index');
    Route::get('/privacy-policy', 'FrontEndController@privacy')->name('privacy.index');
    Route::get('/reviews', 'FrontEndController@allreviews')->name('allreviews.index');




    //static

    Route::get('/nepal-package-tours', 'FrontStaticController@nepalpackage');
    Route::get('/nepal-budget-tour-packages', 'FrontStaticController@budgettours')->name('budgettreks');

    Route::get('/motorbike-tours', 'FrontStaticController@motorbiketours')
        ->name('motorbiketours');

    Route::get('/mountainbike-tours', 'FrontStaticController@mountainbiketours')
        ->name('mountainbiketours');

    Route::get('/sitemap', 'FrontStaticController@sitemap')->name('sitemap');
    Route::get('/sitemap.xml', 'FrontStaticController@xml_sitemap');
    //blog

    Route::get('/blog', 'FrontBlogController@blog')->name('blog.index');
    Route::get('/frontblogsearch', 'FrontBlogController@frontblogsearch');
    Route::get('/blog/{slug}', 'FrontBlogController@blogSingle')->name('blogSingle.index');
    Route::get('blog/category/{slug}', ['as' => 'blog.category', 'uses' => 'FrontBlogController@getBlogByCat']);
    Route::get('blog/archive/{slug}', ['as' => 'blog.archive', 'uses' => 'FrontBlogController@getBlogArchive']);
    Route::get('blog/uncategorized/posts', ['as' => 'blog.uncategorized', 'uses' => 'FrontBlogController@getUncategorizedBlog']);
    Route::get('blog/tag/{slug}', ['as' => 'blog.tag', 'uses' => 'FrontBlogController@getBlogByTag']);




    Route::get('/countries', 'FrontEndController@getDestinations')->name('countries.index');
    Route::get('/activities', 'FrontEndController@getActivities')->name('allactivities.index');
    Route::get('/travelstyle', 'FrontEndController@getTravelstyles')->name('travelstyles.index');
    




    // Route::get('/about-us', 'FrontEndController@aboutus')->name('aboutus.index')->middleware('cache.headers:public;max_age=3600');


    Route::get('/about-us', 'FrontEndController@aboutus')->name('aboutus.index');
    // Route::get('/contact-us', 'FrontEndController@contact')->name('contact.index')->middleware('cache.headers:public;max_age=600');
    Route::get('/contact-us', 'FrontEnquiryController@contact')->name('contact.index');


    Route::get('/itinerary/{slug}', 'FrontEndController@newTrip')
        ->name('itinerary.index');


   
    Route::get('/thank-you', 'FrontStaticController@thankyouinquiry')->name('thankyou');
    Route::get('/thank-you-for-subscribing', 'FrontStaticController@thankyousubs');



    $pages = \App\Http\Daos\PagesDao::getActivePages();
    foreach ($pages as $page) {
        Route::get($page->slug, ['as' => $page->slug, 'uses' => 'FrontEndController@getPage']);
    }



    //amp booking
    Route::get('/inquirenow', 'FrontEnquiryController@inquirenow')->name('inquirenow');


    Route::get('/fixeddeparture', 'FrontEnquiryController@fixeddeparture')->name('fixeddeparture');


    Route::get('/{slug}', 'FrontEndController@newTrip')->name('newitinerary.index');



    


}); //endof middlware


    Route::post('/ampbooking', 'FrontEnquiryController@ampbooking')->name('ampbooking');
    Route::post('/ampbookinglg', 'FrontEnquiryController@ampbookinglg')->name('ampbookinglg');
    Route::post('/ampsubscribe', 'FrontEnquiryController@ampsubscribe')->name('ampsubscribe');

    //contact form
    Route::post('/contactform', ['as' => 'contactinquiry.post', 'uses' => 'FrontEnquiryController@postContact']);

    Route::post('/departureinquiry', ['as' => 'departureinquiry.post', 'uses' => 'FrontEnquiryController@postDeparture']);

    //subscribe
    Route::post('/api/subscribe', ['as' => 'subscribe.post', 'uses' => 'FrontEnquiryController@postSubscribe']);




Route::group(['prefix' => 'api'], function () {


    //     //api activity
    // Route::get('/countries/{id}', 'Api\CountryController@index')->middleware('cache.headers:public;max_age=3600');
    Route::get('/products/activity/{id}', 'Api\ProductController@activity');
    Route::get('/activities/price/{id}', 'Api\PriceController@raju');
    Route::get('/activities/durations/{id}', 'Api\DurationController@kaju');

    //     //api countries
    Route::get('/products/{id}', 'Api\ProductController@index');
    Route::get('/regions', 'Api\ManufacturerController@index');
    Route::get('/prices/{id}', 'Api\PriceController@index');
    Route::get('/durations/{id}', 'Api\DurationController@index');
    Route::get('/difficulties/{id}', 'Api\PriceController@diff');
    //api categories
    Route::get('/categories/{id}', 'Api\CategoryController@index');


    //     // api mc
    Route::get('/packages/mc', 'Api\ProductController@mc');
    Route::get('/mcategories/mc', 'Api\CategoryController@mc');
    Route::get('/mdurations/mc', 'Api\DurationController@mc');
    Route::get('/mprices/mc', 'Api\PriceController@mc');
    Route::get('/mdifficulties/mc', 'Api\PriceController@mdiff');


});

Route::get('/payment-gateway', function () {
    return view('indexphp');
});

Route::get('/initiate-payment', [PaymentController::class, 'index'])->name('initiate-payment');

