<?php

namespace App\Http\Daos;

use App\Affiliation;

class AffiliationDao extends BaseDao
{
	public function __construct(Affiliation $affiliation)
	{
		$this->model = $affiliation;
	}
	public function getAll()
    {
    return $this->model->orderBy('id','ASC')->get();
    }

}