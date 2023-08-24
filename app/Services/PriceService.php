<?php

namespace App\Services;

use App\Trip;

class PriceService
{
    public function getPrices($id)
    {
        $prices = [];

        foreach(Trip::PRICES as $index => $name) {
            $prices[] = [
                'name' => $name,
                'products_count' => $this->getProductCount($index,$id)
            ];
        }

        return $prices;
    }
    public function getmPrices()
    {
        $prices = [];

        foreach(Trip::PRICES as $index => $name) {
            $prices[] = [
                'name' => $name,
                'products_count' => $this->getmProductCount($index)
            ];
        }

        return $prices;
    }

    private function getProductCount($index,$id)
    {
        return Trip::where('publish', '=', 1)
        ->where(function ($query) use ($id) {
            $query->where('country_id', $id);

        })->withFilters()
            ->when($index == 0, function ($query) {
                $query->where('price', '<', '500');
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('price', ['500', '1500']);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('price', ['1500', '2500']);
            })
            ->when($index == 3, function ($query) {
                $query->where('price', '>', '2500');
            })
            ->count();
    }
    private function getmProductCount($index)
    {
        return Trip::where('publish', '=', 1)
        ->where(function ($query)  {
            $query->where('country_id', '>=', 5);

        })->withFilters()
            ->when($index == 0, function ($query) {
                $query->where('price', '<', '500');
            })
            ->when($index == 1, function ($query) {
                $query->whereBetween('price', ['500', '1500']);
            })
            ->when($index == 2, function ($query) {
                $query->whereBetween('price', ['1500', '2500']);
            })
            ->when($index == 3, function ($query) {
                $query->where('price', '>', '2500');
            })
            ->count();
    }
}
