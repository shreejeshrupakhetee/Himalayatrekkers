<?php

namespace App\Http\Daos;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Post;

class PostsDao extends BaseDao
{
    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function getAllPosts()
    {
    	return $this->model->where('status','PUBLISHED')->orderBy('id','DESC')->get();
    }

    public function getPaginatePost()
    {
        return $this->model->where('status','PUBLISHED')->orderBy('id','DESC')->paginate(10);
    }

    // public function getFeatured()
    // {
    //     return $this->model->where(['status'=>'PUBLISHED','featured'=>1])->orderBy('id','DESC')->limit(4)->get();
    // }
    public function getFeatured()
    {
        return $this->model->where(['status'=>'PUBLISHED','featured'=>1])->orderBy('id','DESC')
        ->with(['category' => function ($query){
            $query->select('id','name');
        }])->limit(4)->get(['id','title','image','slug','category_id']);


    }

    public function getArchives()
    {
        // dd($thisyear);
        $thisyear = date('Y');
        $thisyear = "2020";
        return $this->model->select('created_at')->where('created_at','like', "$thisyear%")->with('category')->groupBy('created_at')->orderBy('created_at','desc')->get();

        // return $this->model->select('created_at')->groupBy('created_at')->orderBy('created_at','desc')->get();

    }

    public function getArchivePosts($date)
    {
        $dateStart = new Carbon($date);
        $dateEnd = new Carbon($date);
        $dateEnd->addMonth(1);
        $posts = $this->model->whereBetween('created_at',[$dateStart,$dateEnd])->with('category')->where('status','PUBLISHED')->orderBy('id','DESC')->get();
        return $posts;
    }

    // public function getUncatBlogs()
    // {
    //     $posts = $this->getByCond(['status'=>'PUBLISHED'],false);
    //     $blogs = [];
    //     foreach($posts as $post){
    //         if(!$post->category){
    //            array_push($blogs, $post);
    //         }
    //     }
    //     return $blogs;
    // }

    public function getRelatedBlog($id, $categoryId)
    {
        return $this->model->where(['status'=>'PUBLISHED','category_id'=>$categoryId])->where('id','!=',$id)->orderBy('id','DESC')->limit(5)->get();
    }


}
