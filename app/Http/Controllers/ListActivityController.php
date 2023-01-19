<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterActivityRequest;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use Inertia\Response;

class ListActivityController extends Controller
{
    public function __construct(private ActivityRepositoryInterface $repository)
    {
    }

    public function index(): Response
    {
        $activities = $this->repository->get();

        return inertia('WelcomeBookEvent', ['events' => $activities]);
    }

    public function search(FilterActivityRequest $request)
    {
        $activities = $this->repository
            ->search(['*'], $with = [], $filters = [], ['rating' => 'desc'])
            ->available($request->validated('date'))
            ->get();

        return \response(['events' => $activities]);
    }
}