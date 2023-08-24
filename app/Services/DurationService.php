<?php

namespace App\Services;

use App\Trip;

class DurationService
{
    public function getDurations($id)
    {
        $durations = [];

        foreach(Trip::DURATIONS as $index => $name) {
            $durations[] = [
                'name' => $name,
                'products_count' => $this->getProductCount($index,$id)
            ];
        }

        return $durations;
    }
    public function getmdurations()
    {
        $durations = [];

        foreach(Trip::DURATIONS as $index => $name) {
            $durations[] = [
                'name' => $name,
                'products_count' => $this->getmProductCount($index)
            ];
        }

        return $durations;
    }

    private function getProductCount($index,$id)
    {
        return Trip::where('publish', '=', 1)
        ->where(function ($query) use ($id) {
            $query->where('country_id', $id);

        })->withFilters()

            ->when($index == 0, function ($query) {
                $query->where('duration', '<=', '5');
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('duration', ['6', '10']);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('duration', ['11', '15']);
            })
            ->when($index == 3, function ($query) {
                $query->whereBetween('duration', ['16', '24']);
            })
            ->when($index == 4, function ($query) {
                $query->where('duration', '>=', '24');
            })
            ->count();
    }
    private function getmProductCount($index)
    {
        return Trip::where('publish', '=', 1)
        ->where(function ($query) {
            $query->where('country_id', '>=', 5);

        })->withFilters()

            ->when($index == 0, function ($query) {
                $query->where('duration', '<=', '5');
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('duration', ['6', '10']);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('duration', ['11', '15']);
            })
            ->when($index == 3, function ($query) {
                $query->whereBetween('duration', ['16', '24']);
            })
            ->when($index == 4, function ($query) {
                $query->where('duration', '>=', '24');
            })
            ->count();
    }
}
