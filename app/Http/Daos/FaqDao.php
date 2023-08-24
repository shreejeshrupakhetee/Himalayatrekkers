<?php
namespace App\Http\Daos;
use App\Faq;
use Illuminate\Database\Eloquent\Model;

class FaqDao extends BaseDao
{
    public function __construct(Faq $model)
    {
        $this->model= $model;
    }
    public function getPublishfaq()
    {
        return $this->model->where('publish',1)->orderBy('order','ASC')->get();
    }

}
