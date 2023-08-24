<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Itinerary extends Model
{
    protected $table = 'itinerary';


    public static function boot()
    {

    	static::saving(function($model)
    	{
    		// $model->additional = json_encode(array_filter(array_combine(request()->get('key'),request()->get('value'))));
            // $model->faqs = json_encode(array_filter(array_combine(request()->get('question'),request()->get('answer'))));

            $model->detail = static::setDetail();
            $model->faqs = static::setFaq();
            $model->morecontent = static::setMore();
            // $model->equipment = static::setEquipment();
    	});
        static::updating(function($instance){
            Cache::flush();

        });

    	parent::boot();
    }

    public function tripId()
    {
    	return $this->belongsTo('App\Trip','trip_id');
    }

    protected static function setDetail()
    {
        $details = [];
        foreach(request()->get('title') as $k=>$t){
          $details[] = [
            'title'=>$t,
            'content'=>request()->get('content')[$k],
            'day'=>request()->get('day')[$k],
            'altitude'=>request()->get('altitude')[$k],
            'time'=>request()->get('time')[$k],
            'meal'=>request()->get('meal')[$k],
            'acco'=>request()->get('acco')[$k],
            'icon'=>request()->get('icon')[$k]
          ];
        }
        $a = [];
        foreach($details as $d){
           if(!empty($d['title'])){
              $a[] = $d;
           }
        }
        return json_encode($a);
    }
    protected static function setMore()
    {
        $morecontent = [];
        foreach(request()->get('key') as $k=>$t){
            $morecontent[] = [
            'key'=>$t,
            'content'=>request()->get('value')[$k],

          ];
        }
        $a = [];
        foreach($morecontent as $d){
           if(!empty($d['key'])){
              $a[] = $d;
           }
        }
        return json_encode($a);
    }
    protected static function setFaq()
    {
        $faqs = [];
        foreach(request()->get('question') as $k=>$t){
            $faqs[] = [
            'question'=>$t,
            'answer'=>request()->get('answer')[$k],

          ];
        }
        $a = [];
        foreach($faqs as $d){
           if(!empty($d['question'])){
              $a[] = $d;
           }
        }
        return json_encode($a);
    }

    // protected static function setEquipment()
    // {
    //     $equipments = [];
    //     foreach(request()->get('eqi_title') as $k=>$t){
    //         $equipments[] = [
    //             'eqi_title'=>$t,
    //             'eqi_content'=>request()->get('eqi_content')[$k],
    //             'eqi_facility'=>request()->get('eqi_facility')[$k]
    //         ];
    //     }
    //     $a = [];
    //     foreach($equipments as $d){
    //         if(!empty($d['eqi_title'])){
    //             $a[] = $d;
    //         }
    //     }
    //     return json_encode($a);

    // }
}
