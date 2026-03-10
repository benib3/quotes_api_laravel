<?php

namespace App\Services;

class SpotifyPlanCalculationService
{

    // get number users registered
    public function getUsersRegistered()
    {
        return \App\Models\User::count();
    }

    public function getLatestSpotifyPlan()
    {
        return \App\Models\SpotifyCurrentPlan::latest()->first();
    }

    /**
     * Calculate the per person cost of the latest Spotify plan.
     *
     * @return float|int
     */
    public function calculatePerPersonCost()
    {
        $latestPlan = $this->getLatestSpotifyPlan();
        $usersRegisteredCount = $this->getUsersRegistered();

        if ($usersRegisteredCount === 0) {
            return 0;
        }

        return round($latestPlan->amount / $usersRegisteredCount, 2);
    }


    public function calculateTotalCostForUser($userId)
    {
        $paidDates = \App\Models\UsersPaidDates::where('user_id', $userId)->get();
        $totalCost = 0;

        foreach ($paidDates as $paidDate) {
            $totalCost += $paidDate->amount;
        }

        return round($totalCost, 2);
    }

    public function calculateTotalMonthsPaidForUser($userId)
    {
        return \App\Models\UsersPaidDates::where('user_id', $userId)->count();
    }

}
