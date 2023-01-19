<?php

namespace App\Repositories\Concretes;

use App\Models\Booking;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BookingRepository extends SharedRepository implements BookingRepositoryInterface
{
    public function __construct(Booking $model, private ActivityRepositoryInterface $activityRepository)
    {
        parent::__construct($model);
    }

    public function create(array $data): Model
    {
        $activity = $this->activityRepository->find($data['activity']);

        $data = [
            ...\Arr::except($data, 'activity'),
            'price'           => $data['quantity_people'] * $activity->price,
            'completion_date' => $data['date'],
        ];

        /** @var Booking $booking */
        $booking = parent::create($data);

        $booking->activity()->associate($activity)->save();

        return $booking;
    }
}