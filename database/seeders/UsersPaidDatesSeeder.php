<?php

namespace Database\Seeders;

use App\Services\SpotifyPlanCalculationService;
use App\Services\UserRankService;
use Illuminate\Database\Seeder;

class UsersPaidDatesSeeder extends Seeder
{
    public function __construct(
        private SpotifyPlanCalculationService $spotifyPlanCalculationService,
        private UserRankService $userRankService
    ) {}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lukasUser = \App\Models\User::where('email', 'lukas.junkovic@example.com')->first();
        $lukasEndDate = \Carbon\Carbon::create(2027, 2, 1);
        $this->addMonthsPaid($lukasUser, $lukasEndDate);

        $balsaUser = \App\Models\User::where('email', 'balsa.hajdukovic@example.com')->first();
        $balsaEndDate = \Carbon\Carbon::create(2026, 1, 1);
        $this->addMonthsPaid($balsaUser, $balsaEndDate);

        $ivanUser = \App\Models\User::where('email', 'ivan.sibinovic@example.com')->first();
        $ivanEndDate = \Carbon\Carbon::create(2026, 3, 1);
        $this->addMonthsPaid($ivanUser, $ivanEndDate);

        $nikolaUser = \App\Models\User::where('email', 'nikola.junkovic@example.com')->first();
        $nikolaEndDate = \Carbon\Carbon::create(2025, 10, 1);
        $this->addMonthsPaid($nikolaUser, $nikolaEndDate);

        $andrijaUser = \App\Models\User::where('email', 'andrija.vulicevic@example.com')->first();
        $andrijaEndDate = \Carbon\Carbon::create(2026, 5, 1);
        $this->addMonthsPaid($andrijaUser, $andrijaEndDate);


        sleep(1); // Sleep for 1 second to ensure that the created_at timestamps are different

        foreach (\App\Models\User::all() as $user) {
            $totalMonthsPaid = $user->paidDates()->count();
            $totalCost = $this->spotifyPlanCalculationService->calculateTotalCostForUser($user->id);
            $user->update([
                'total_months_paid' => $totalMonthsPaid,
                'total_cost' => $totalCost,
            ]);
        }

        // Update user ranks after seeding paid dates
        $this->userRankService->updateUserRanks();
    }

    private function addMonthsPaid($user, $endDate)
    {
        //start date 2024-08-01
        $startDate = \Carbon\Carbon::create(2024, 8, 1);
        while ($startDate->lessThanOrEqualTo($endDate)) {
            \App\Models\UsersPaidDates::create([
                'user_id' => $user->id,
                'paid_date' => $startDate->format('Y-m-d'),
                'amount' => $this->spotifyPlanCalculationService->calculatePerPersonCost(),
            ]);
            $startDate->addMonth();
        }
    }
}
