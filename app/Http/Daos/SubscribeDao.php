<?php
namespace App\Http\Daos;

use App\Subscriber;
use Illuminate\Database\Eloquent\Model;

class SubscribeDao extends BaseDao
{
    public function __construct(Subscriber $model)
    {
        $this->model = $model;
    }
    public function getEmail($email)
    {
        return $this->model->where('email',$email)->first();
    }
}
