<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>https://himalayantrekkers.com/</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    @foreach ($trip as $post)
        <url>
            <loc>https://himalayantrekkers.com/itinerary/{{$post->slug}}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z', strtotime($post->updated_at)) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach
    <url>
        <loc>https://himalayantrekkers.com/nepal</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/everest-khumbu-treks</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/annapurna-treks</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/ganesh-himal-and-manaslu-treks</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/dolpo-treks</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/dhaulagiri-treks</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/humla-simikot-treks</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/kanchenjunga-treks</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/langtang-and-helambu-treks</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/rara-mugu-and-jumla-treks</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/less-touristic-trekking-destination</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/nepal-package-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/day-hike-around-kathmandu</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/bhutan</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/tibet</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/india</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/multicountry-tours-and-treks</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/nepal-bhutan-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/nepal-tibet-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/nepal-india-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/nepal-bhutan-india-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/nepal-bhutan-tibet-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/activities/adventure-sports</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/activities/trekking-and-walking</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/activities/peak-climbing</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/activities/day-hike</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/activities/heli-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/activities/homestay-trips</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/activities/jungle-safari-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/activities/rafting-and-kayaking</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/activities/cultural-and-religious-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/activities/day-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/activities/mountain-expedition</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/blog</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/about-us</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/faqs</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/reviews</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/contact-us</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/nepal-budget-tour-packages</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/motorbike-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/mountainbike-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    @foreach ($blog as $post)
        <url>
            <loc>https://himalayantrekkers.com/blog/{{ $post->slug }}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z', strtotime($post->updated_at ?? $post->created_at)) }}</lastmod>
            <priority>0.64</priority>
        </url>
    @endforeach
    <url>
        <loc>https://himalayantrekkers.com/travelstyle/photography-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/legal-documents</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/terms-and-condition</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/privacy-policy</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/gear-list-for-trekking-and-climbing</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/travelstyle/shamanism-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal/makalu-and-barun-valley-treks</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/trekking-in-nepal</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/activities</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/blog?page=2</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/blog?page=3</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/blog?page=4</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/blog?page=5</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/blog?page=6</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/blog?page=7</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/blog?page=8</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/blog?page=9</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/blog?page=10</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/blog?page=11</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/everest-base-camp-trek</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/nepal-bhutan-tibet-india-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/nepal-tibet-india-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>

    <url>
        <loc>https://himalayantrekkers.com/travelstyle</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/travelstyle/family-holidays</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.51</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/nar-phu-valley-trek/</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.51</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/makalu-base-camp-barun-valley-trek/</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.51</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/blog?page=1</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.51</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/chitwan-bird-watching-tour/</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.51</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/travelstyle/muslim-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.51</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/travelstyle/volunteering-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.51</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/travelstyle/student-education-tours</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.51</priority>
    </url>
    <url>
        <loc>https://himalayantrekkers.com/golden-triangle-tour/</loc>
        <lastmod>2022-08-24T04:59:24+00:00</lastmod>
        <priority>0.51</priority>
    </url>
</urlset>
