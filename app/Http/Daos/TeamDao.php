<?php

namespace App\Http\Daos;

use App\Team;

class TeamDao extends BaseDao
{
	public function __construct(Team $team)
	{
		$this->model = $team;
	}
	
}