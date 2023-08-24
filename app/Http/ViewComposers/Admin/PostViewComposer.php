<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use App\Http\Daos\PostsDao;
use App\Http\Daos\CategoryDao;

class PostViewComposer
{
	public function __construct(PostsDao $postsDao,CategoryDao $categoryDao)
	{
		$this->postDao = $postsDao;
		$this->categoryDao = $categoryDao;
		// $this->tagDao = $tagDao;
	}

	public function compose(View $view)
	{
            $view->with('posts',$this->postDao->getAllPosts());

	}
}
