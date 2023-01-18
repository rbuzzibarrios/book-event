<?php

namespace App\Repositories\Concretes;

use App\Models\Activity;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ActivityRepository extends SharedRepository implements ActivityRepositoryInterface
{
    public function __construct(Activity $model)
    {
        parent::__construct($model);
    }

    public function getAvailable(string $date): Collection
    {
        return $this->search()->available($date)->get();
    }
}