<?php

namespace App\Services;

use App\Trip;

class DiffService
{
    public function getDiff($id)
    {
        $diff = [];

        foreach(Trip::DIFF as $index => $name) {
            $diff[] = [
                'name' => $name,
                'products_count' => $this->getProductCount($index,$id)
            ];
        }

        return $diff;
    }
    public function getmDiff()
    {
        $diff = [];

        foreach(Trip::DIFF as $index => $name) {
            $diff[] = [
                'name' => $name,
                'products_count' => $this->getmProductCount($index)
            ];
        }

        return $diff;
    }

    private function getProductCount($index,$id)
    {
        return Trip::where('publish', '=', 1)
        ->where(function ($query) use ($id) {
            $query->where('country_id', $id);

        })->withFilters()
        ->when($index == 0, function ($query) {
                $query->where('tripgrade', '=', '1');
            })
            ->when($index == 1, function ($query) {
                $query->where('tripgrade', '=', '2');
            })
            ->when($index == 2, function ($query) {
                $query->where('tripgrade', '=', '3');
            })
            ->when($index == 3, function ($query) {
                $query->where('tripgrade', '=', '4');
            })
            ->when($index == 4, function ($query) {
                $query->where('tripgrade', '=', '5');
            })
            ->count();
    }
    private function getmProductCount($index)
    {
        return Trip::where('publish', '=', 1)
        ->where(function ($query)  {
            $query->where('country_id', '>=',5);

        })->withFilters()
        ->when($index == 0, function ($query) {
                $query->where('tripgrade', '=', '1');
            })
            ->when($index == 1, function ($query) {
                $query->where('tripgrade', '=', '2');
            })
            ->when($index == 2, function ($query) {
                $query->where('tripgrade', '=', '3');
            })
            ->when($index == 3, function ($query) {
                $query->where('tripgrade', '=', '4');
            })
            ->when($index == 4, function ($query) {
                $query->where('tripgrade', '=', '5');
            })
            ->count();
    }
}
