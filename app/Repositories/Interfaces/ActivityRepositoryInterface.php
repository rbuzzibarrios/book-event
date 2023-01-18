<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ActivityRepositoryInterface extends SharedRepositoryInterface
{
    public function getAvailable(string $date): Collection;
}