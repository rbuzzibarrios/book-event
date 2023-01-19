<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Repositories\Interfaces\BookingRepositoryInterface;

class CreateBookingController extends Controller
{
    public function __construct(private BookingRepositoryInterface $repository)
    {
    }

    public function __invoke(StoreBookingRequest $request)
    {
        $this->repository->create($request->validated());

        return to_route('index.event');
    }
}