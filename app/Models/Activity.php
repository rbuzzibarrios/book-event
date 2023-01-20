<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory, SoftDeletes;

    #region relations

    public function relatedActivities(): HasMany
    {
        return $this->hasMany(Activity::class, 'activity_related_of_id', 'id');
    }

    #endregion


    #region scopes

    public function scopeAvailable(Builder $builder, string $date): Builder
    {
        return $builder
            ->whereDate('start_date', '<=', $date)
            ->whereDate('end_date', '>=', $date);
    }

    #endregion
}
