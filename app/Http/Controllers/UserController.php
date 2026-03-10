<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SpotifyPlanCalculationService;
use App\Services\UserRankService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        private UserRankService $userRankService,
        private SpotifyPlanCalculationService $spotifyPlanCalculationService
    ) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $users = User::withoutMe()->get(['id', 'name']);
        return response()->json($users);
    }


    public function getLeaderBoard()
    {
        $users = $this->userRankService->getUsersByRank();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        abort(501, 'Not implemented');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::withoutMe()->find($id, ['id', 'name', 'total_cost', 'total_months_paid', 'rank']);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::withoutMe()->find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        // get users latest paid date
        $latestPaidDate = $user->paidDates()->orderBy('paid_date', 'desc')->first();
        $perPersonAmount = $this->spotifyPlanCalculationService->calculatePerPersonCost();
        $paidAmount = $validated['amount'];

        if ($paidAmount < $perPersonAmount) {
            return response()->json(['message' => 'Amount is less than the per person cost of the latest Spotify plan'], 400);
        }

        $totalMonthsToBePaid = round($paidAmount / $perPersonAmount);
        // create new paid date for user
        for ($i = 0; $i < $totalMonthsToBePaid; $i++) {
            try {
                $dateToPay = $latestPaidDate ? $latestPaidDate->paid_date->addMonths($i + 1) : now()->addMonths($i + 1);
                $user->paidDates()->create([
                    'paid_date' => $dateToPay,
                    'amount' => $perPersonAmount,
                ]);
            } catch (\Throwable $th) {
                return response()->json(['message' => 'Error creating paid date: ' . $th->getMessage()], 500);
            }
        }

        // update user total cost and total months paid
        $user->total_cost = $this->spotifyPlanCalculationService->calculateTotalCostForUser($user->id);
        $user->total_months_paid = $this->spotifyPlanCalculationService->calculateTotalMonthsPaidForUser($user->id);
        $user->save();

        // update user ranks
        $this->userRankService->updateUserRanks();

        return response()->json([
            'message' => 'Payment updated successfully',
            'total_months_paid' => $user->total_months_paid,
            'total_cost' => $user->total_cost,
            'rank' => $user->refresh()->rank,
        ], 200);
    }
}
