<?php

namespace App\Http\Controllers;

use App\Models\UsersPaidDates;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Group by paid_date and return the users who paid on that date, ordered by paid_date ascending.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $userPaidDates = UsersPaidDates::with('user')
            ->orderBy('paid_date', 'asc')
            ->get()
            ->groupBy('paid_date')
            ->map(function ($group) {
                return [
                    'paid_date' => $group->first()->paid_date,
                    'users' => $group->pluck('user')->filter()->unique('id')->values(),
                ];
            })
            ->toArray();

        // if users is empty dont return the date
        $userPaidDates = array_filter($userPaidDates, function ($item) {
            return count($item['users']) > 0;
        });

        return response()->json($userPaidDates);
    }
}
