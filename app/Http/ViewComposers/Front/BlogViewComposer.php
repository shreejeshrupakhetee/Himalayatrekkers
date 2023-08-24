<?php

namespace App\Http\ViewComposers\Front;

use App\Http\Daos\PostsDao;
use App\Http\Daos\CategoryDao;
// use App\Http\Daos\TagDao;
use Illuminate\View\View;

class BlogViewComposer
{
	public function __construct(PostsDao $postsDao,CategoryDao $categoryDao)
	{
		$this->postDao = $postsDao;
		$this->categoryDao = $categoryDao;
		// $this->tagDao = $tagDao;
	}

	public function compose(View $view)
	{
		// $view->with('featured_posts',$this->postDao->getFeatured());
		// $view->with('alltags',$this->tagDao->getAll());
		// $view->with('categories',$this->categoryDao->getCategoryOrder());
		// $view->with('posts',$this->postDao->getAllPosts());
		// $view->with('paginated_posts',$this->postDao->getPaginatePost());
		$view->with('archives',makeArchives($this->postDao->getArchives()));
	}
}
