<?php

namespace App\Http\Controllers;

use App\Trip;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use Illuminate\Support\Carbon;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Category;
use App\Http\Services\HomeService;
use Illuminate\Support\Facades\Cache;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

use Illuminate\Support\Facades\Validator;
use Artesaos\SEOTools\Facades\TwitterCard;

class FrontBlogController extends Controller
{
    //

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }
    public function blog()
    {
        $blogs = Post::with(['category','authorId'])->orderBy('id', 'desc')->where('status', 'PUBLISHED')->paginate(10);


        SEOMeta::setTitle('Blog and News');
        SEOMeta::setDescription('Love Traveling ? Himalayan Trekkers provides you various topics and insights on whats trending currently in our blogs section.');
        SEOMeta::addKeyword(
            [
                'travel blogs',
                'tour blogs',
                'trek blogs',
                'tour and trek in nepal bhutan tibet india',

            ]
        );

        OpenGraph::addProperty('locale', 'en-US');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::setTitle('Blog and News');
        OpenGraph::setDescription('Love Traveling ? Himalayan Trekkers provides you various topics and insights on whats trending currently in our blogs section.');

        OpenGraph::setUrl('https://himalayantrekkers.com/blog');
        OpenGraph::addImage('/images/himalayantrekkers.jpg');


        TwitterCard::setTitle('Blog and News');
        TwitterCard::setDescription('Love Traveling ? Himalayan Trekkers provides you various topics and insights on whats trending currently in our blogs section.');





        return view('blog', compact('blogs'));
    }

    public function blogSingle($slug)
    {
        if (!$slug) {
            return redirect()->back();
        }
        // $post = Cache::rememberForever('posts.'.$slug, function () use ($slug) {
        //     return Post::where('slug', $slug)->first();
        // });
        $post = Post::with(['category','authorId'])->where('slug', $slug)->firstOrFail();
        // dd(json_encode($post->body,true));


        // dd($post);


        $toc = $this->toc($post->body);



        $relatedtours_step =  json_decode($post->relatedtours, true);
        $relatedtreks_step =  json_decode($post->relatedtreks, true);
        $relatedreads_step =  json_decode($post->relatedreads, true);


        if ($relatedtours_step) {
            $result1 = $this->getFrontTreks($relatedtours_step, 'relatedtour');
        } else {
            $result1 = [];
        }

        if ($relatedtreks_step) {
            $result2 = $this->getFrontTreks($relatedtreks_step, 'relatedtrek');
        } else {
            $result2 = [];
        }
        if ($relatedreads_step) {
            $result3 = $this->getFrontBlogs($relatedreads_step, 'relatedreads');
        } else {
            $result3 = [];
        }


        if ($post) {




            $previous = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
            $next = Post::where('id', '>', $post->id)->orderBy('id')->first();


            SEOMeta::setTitle($post->metatitle);
            SEOMeta::setDescription($post->metadisc);
            SEOMeta::addMeta('article:modified_time', $post->updated_at->toW3CString(), 'property');
            SEOMeta::addKeyword($post->metakey);
            OpenGraph::setTitle($post->meta_title);
            OpenGraph::setDescription($post->metadisc);
            OpenGraph::setUrl('https://himalayantrekkers.com/blog/' . $post->slug);
            OpenGraph::addProperty('type', 'article');
            OpenGraph::addProperty('locale', 'en-US');
            OpenGraph::addImage(Voyager::image($post->image), ['height' => 768, 'width' => 1366]);
            TwitterCard::setTitle($post->metatitle);
            TwitterCard::setDescription($post->metadisc);



            return view('blog-single')
                ->with('toc', $toc)
                ->with('detail', $post)
                ->with('next', $next)
                ->with('previous', $previous)
                ->with('result1', $result1)
                ->with('result2', $result2)
                ->with('result3', $result3);
        } else {
            return redirect()->back();
        }
    }
    public function toc($content)
    {
        preg_match_all('|<h.*?id=\"([^\"]*)\".*?>(.*)</h[^>]+>|iU', $content, $matches);
        // dd($content);
        $r = array();
        if (!empty($matches[1]) && !empty($matches[2])) {
            $tags = $matches[1];
            $titles = $matches[2];
            foreach ($tags as $i => $tag) {
                $r[] = array('depth' => '2', 'id' => $tag, 'text' => $titles[$i]);
            }
        }

        return $r;
    }
    public function getBlogByCat($slug)
    {
        if (!$slug) {
            return redirect()->back();
        }
        $cat = Category::with(['posts'])->where('slug', $slug)->firstOrFail();


        return view('blog-category')->with('category', $cat);
        // $category = Category::where('slug', $slug)->first();
        // $posts = $category->posts()->where('PUBLISHED', true)->paginate(10);
        // return view('blog-category', compact('posts'));
    }

    public function getBlogArchive($slug)
    {
        if (!$slug) {
            return redirect()->back();
        }
        $blogs = $this->homeService->getBlogArchives($slug);


        return view('blog-archive')
            ->with('slug', $slug)
            ->with('archive_posts', $blogs);
    }

    public function frontblogsearch(Request $request)
    {
        $v = Validator::make($request->all(), [
            'q' => 'required|min:2|max:50',

        ]);
        $query = $request->q;
        if ($request->q == '') {
            return redirect()->back();
        }

        $databaseUsers = Post::where('title', 'LIKE', '%' . $request->q . '%')->limit(8)->get();

        $resultUsers = [];
        foreach ($databaseUsers as $key => $row) {
            $user = [

                'title' => $row->title,
                'slug' => $row->slug,
            ];
            array_push($resultUsers, $user);
        }
        return json_encode(array(
            "data" => $resultUsers,


        ));
    }

    public function getFrontTreks($ids, $key, $limit = 6)
    {
        return Cache::remember("'first.$key'", Carbon::parse('5 days'), function () use ($ids, $limit) {

            $get = ['id', 'title', 'duration', 'price', 'image', 'slug', 'tripgrade', 'discount'];
            return Trip::whereIn('id', $ids)->limit($limit)->orderBy('title', 'ASC')->get($get);
        });
    }

    public function getFrontBlogs($ids, $key, $limit = 6)
    {
        return Cache::remember("'first.$key'", Carbon::parse('5 days'), function () use ($ids, $limit) {

            $get = ['id', 'title', 'image', 'slug', 'body'];
            return Post::with(['authorId','category'])->where('status', 'PUBLISHED')->whereIn('id', $ids)->limit($limit)->get($get);
        });
    }
}
