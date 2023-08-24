<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use  \TCG\Voyager\Traits\Translatable;
use Illuminate\Support\Facades\Cache;
use TCG\Voyager\Traits\Resizable;

class Trip extends Model
{
    //
    use SoftDeletes, Translatable, Resizable;
    public static function boot()
    {
        parent::boot();

        static::updating(function ($instance) {
            Cache::forget('trip.' . $instance->slug);
            // Cache::put('trip.' . $instance->slug, $instance);
        });

        static::deleting(function ($instance) {
            Cache::forget('trip.' . $instance->slug);
        });
    }


    protected $dates = ['deleted_at'];

    public $with = ['reviews'];

    protected $casts = [
        'price' => 'integer',
        'tripgrade' => 'integer',



    ];
    const PRICES = [
        'Less than 500',
        'From 500 to 1500',
        'From 1500 to 2500',
        'More than 2500',
    ];
    const DIFF = [
        '1',
        '2',
        '3',
        '4',
        '5',
    ];
    const DURATIONS = [
        '1 To 5 Days',
        '6 To 10 Days',
        '11 To 15 Days',
        '16 To 24 Days',
        '24 Days Above',
    ];

    public function itinerary()
    {
        return $this->hasOne('App\Itinerary', 'trip_id')->where('publish', 1);
    }
    public function destinationId()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function activityId()
    {
        // return $this->belongsTo('App\Activity','activity_id');
        // return $this->belongsToMany('App\Activity','activity_id');
        return $this->belongsToMany(Activity::class, 'activity_trip_pivot', 'activity_id', 'trip_id');
    }

    public function activity()
    {
        return $this->belongsToMany(Activity::class, 'activity_trip_pivot');
    }
    public function regionId()
    {
        return $this->belongsTo('App\Region', 'region_id');
    }
    public function travelStyles()
    {
        return $this->belongsToMany(TravelStyle::class, 'trips_travelstyle_pivot_table', 'trip_id', 'travel_style_id');
    }
    public function album()
    {
        return $this->hasOne('App\Gallery', 'trip_id')->where('publish', 1);
    }
    public function reviews()
    {
        return $this->hasMany('App\Review', 'trip_id')->where('publish', 1);
    }
    public function departures()
    {
        return $this->hasMany('App\Departure', 'trip_id')->where('publish', 1)
        ->where('start_date','>',date('Y-m-d'))
        ->orderBy('start_date')->select(["id","trip_id","start_date","price"]);
    }
    public function averageRating()
    {
        return $this->reviews->avg('rating');
    }



    public function ordersCount()
    {
        return $this->belongsToMany(Activity::class, 'activity_trip_pivot')
            ->selectRaw('count(activity.id) as aggregate')
            ->groupBy('activity_id');
    }

    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }


    public function scopeWithFilters($query)
    {
        return $query->when(count(request()->input('manufacturers', [])), function ($query) {
            $query->whereIn('region_id', request()->input('manufacturers'));
        })
            ->when(count(request()->input('categories', [])), function ($query) {

                $query->whereHas('activity', function ($q) {
                    $q->whereIn('activity.id', request()->input('categories', []));
                });
            })
            ->when(count(request()->input('difficulties', [])), function ($query) {
                $query->where(function ($query) {
                    $query->when(in_array(0, request()->input('difficulties')), function ($query) {
                        $query->orWhere('tripgrade', '=', '1');
                    })
                        ->when(in_array(1, request()->input('difficulties')), function ($query) {
                            $query->orWhere('tripgrade', '=', '2');
                        })
                        ->when(in_array(2, request()->input('difficulties')), function ($query) {
                            $query->orWhere('tripgrade', '=', '3');
                        })
                        ->when(in_array(3, request()->input('difficulties')), function ($query) {
                            $query->orWhere('tripgrade', '=', '4');
                        })
                        ->when(in_array(4, request()->input('difficulties')), function ($query) {
                            $query->orWhere('tripgrade', '=', '5');
                        });
                });
            })
            ->when(count(request()->input('durations', [])), function ($query) {
                $query->where(function ($query) {
                    $query->when(in_array(0, request()->input('durations')), function ($query) {
                        $query->orWhere('duration', '<=', '5');
                    })
                        ->when(in_array(1, request()->input('durations')), function ($query) {
                            $query->orWhereBetween('duration', ['6', '10']);
                        })
                        ->when(in_array(2, request()->input('durations')), function ($query) {
                            $query->orWhereBetween('duration', ['11', '15']);
                        })
                        ->when(in_array(3, request()->input('durations')), function ($query) {
                            $query->orWhereBetween('duration', ['16', '24']);
                        })
                        ->when(in_array(4, request()->input('durations')), function ($query) {
                            $query->orWhere('duration', '>=', '24');
                        });
                });
            })
            ->when(count(request()->input('prices', [])), function ($query) {
                $query->where(function ($query) {
                    $query->when(in_array(0, request()->input('prices')), function ($query) {
                        $query->orWhere('price', '<', '500');
                    })
                        ->when(in_array(1, request()->input('prices')), function ($query) {
                            $query->orWhereBetween('price', ['500', '1500']);
                        })
                        ->when(in_array(2, request()->input('prices')), function ($query) {
                            $query->orWhereBetween('price', ['1500', '2500']);
                        })
                        ->when(in_array(3, request()->input('prices')), function ($query) {
                            $query->orWhere('price', '>', '2500');
                        });
                });
            });
    }


    public function scopeWithmFilters($query)
    {
        return $query->when(count(request()->input('categories', [])), function ($query) {
            $query->whereIn('country_id', request()->input('categories'));
        })
            ->when(count(request()->input('difficulties', [])), function ($query) {
                $query->where(function ($query) {
                    $query->when(in_array(0, request()->input('difficulties')), function ($query) {
                        $query->orWhere('tripgrade', '=', '1');
                    })
                        ->when(in_array(1, request()->input('difficulties')), function ($query) {
                            $query->orWhere('tripgrade', '=', '2');
                        })
                        ->when(in_array(2, request()->input('difficulties')), function ($query) {
                            $query->orWhere('tripgrade', '=', '3');
                        })
                        ->when(in_array(3, request()->input('difficulties')), function ($query) {
                            $query->orWhere('tripgrade', '=', '4');
                        })
                        ->when(in_array(4, request()->input('difficulties')), function ($query) {
                            $query->orWhere('tripgrade', '=', '5');
                        });
                });
            })
            ->when(count(request()->input('durations', [])), function ($query) {
                $query->where(function ($query) {
                    $query->when(in_array(0, request()->input('durations')), function ($query) {
                        $query->orWhere('duration', '<=', '5');
                    })
                        ->when(in_array(1, request()->input('durations')), function ($query) {
                            $query->orWhereBetween('duration', ['6', '10']);
                        })
                        ->when(in_array(2, request()->input('durations')), function ($query) {
                            $query->orWhereBetween('duration', ['11', '15']);
                        })
                        ->when(in_array(3, request()->input('durations')), function ($query) {
                            $query->orWhereBetween('duration', ['16', '24']);
                        })
                        ->when(in_array(4, request()->input('durations')), function ($query) {
                            $query->orWhere('duration', '>=', '24');
                        });
                });
            })
            ->when(count(request()->input('prices', [])), function ($query) {
                $query->where(function ($query) {
                    $query->when(in_array(0, request()->input('prices')), function ($query) {
                        $query->orWhere('price', '<', '500');
                    })
                        ->when(in_array(1, request()->input('prices')), function ($query) {
                            $query->orWhereBetween('price', ['500', '1500']);
                        })
                        ->when(in_array(2, request()->input('prices')), function ($query) {
                            $query->orWhereBetween('price', ['1500', '2500']);
                        })
                        ->when(in_array(3, request()->input('prices')), function ($query) {
                            $query->orWhere('price', '>', '2500');
                        });
                });
            });
    }
}
