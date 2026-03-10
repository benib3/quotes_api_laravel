<?php

namespace App\Services;

class UserRankService
{

    public function updateUserRanks()
    {
        $users = \App\Models\User::withoutMe()->orderBy('total_months_paid', 'desc')->get();

        foreach ($users as $index => $user) {
            $user->rank = $index + 1;
            $user->save();
        }
    }

    public function getUserRanksByCost()
    {
        return \App\Models\User::withoutMe()->orderBy('total_cost', 'desc')->get(['id', 'name', 'total_cost']);
    }

    public function getUserRanksByMonthsPaid()
    {
        return \App\Models\User::withoutMe()->orderBy('total_months_paid', 'desc')->get(['id', 'name', 'total_months_paid']);
    }

    public function getUsersByRank()
    {
        return \App\Models\User::withoutMe()->orderBy('rank', 'asc')->get(['id', 'name', 'rank']);
    }
}
