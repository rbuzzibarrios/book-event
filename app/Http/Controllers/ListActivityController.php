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

    public function index(FilterActivityRequest $request): Response
    {
        $activities = $this->repository->getAvailable($request->validated('date'));

        return inertia('WelcomeBookEvent', ['events' => $activities]);
    }
}