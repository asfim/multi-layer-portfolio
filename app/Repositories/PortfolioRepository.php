<?php

namespace App\Repositories;

use App\Models\Portfolio;

class PortfolioRepository
{
    public function getFirst(): ?Portfolio
    {
        return Portfolio::first();
    }

    public function updateOrCreate(array $attributes, array $values): Portfolio
    {
        return Portfolio::updateOrCreate($attributes, $values);
    }
}
