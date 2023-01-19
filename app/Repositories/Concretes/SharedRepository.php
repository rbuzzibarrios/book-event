<?php

namespace App\Repositories\Concretes;

use App\Repositories\Interfaces\SharedRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class SharedRepository implements SharedRepositoryInterface
{
    protected Model $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @inheritDoc
     */
    public function get(): Collection
    {
        return $this->model->get();
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): Model
    {
        return $this->model->find($id);
    }

    /**
     * @inheritDoc
     */
    public function search(
        array $columns = ['*'],
        array|string $with = [],
        array $filters = [],
        array $orderBy = ['id' => 'asc']
    ): Builder {
        $column = array_keys($orderBy)[0] ?? 'id';

        return $this->model
            ->with($with)
            ->where($filters)
            ->orderBy($column, $orderBy[$column] ?? 'asc');
    }
}