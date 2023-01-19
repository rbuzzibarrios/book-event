<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface SharedRepositoryInterface
{
    /**
     * @return Model
     */
    public function getModel(): Model;

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @return Collection
     */
    public function get(): Collection;

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model;

    /**
     * @param string[] $columns
     * @param array|string $with
     * @param array $filters
     * @param array $orderBy
     * @return Builder
     */
    public function search(array $columns = ['*'], array|string $with = [], array $filters = [], array $orderBy = ['id' => 'asc']): Builder;
}