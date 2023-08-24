<?php

namespace App\Http\Daos;

use App\Departure;

class DepartureDao extends BaseDao
{
	public function __construct(Departure $departure)
	{
		$this->model = $departure;
	}

}