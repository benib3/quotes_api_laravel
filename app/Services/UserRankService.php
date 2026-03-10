<?php

namespace App\Services;

class UserRankService
{

    public function updateUserRanks()
    {
        $users = \App\Models\User::orderBy('total_months_paid', 'desc')->get();

        foreach ($users as $index => $user) {
            $user->rank = $index + 1;
            $user->save();
        }
    }

    public function getUserRanksByCost()
    {
        return \App\Models\User::orderBy('total_cost', 'desc')->get();
    }

    public function getUserRanksByMonthsPaid()
    {
        return \App\Models\User::orderBy('total_months_paid', 'desc')->get();
    }
}
