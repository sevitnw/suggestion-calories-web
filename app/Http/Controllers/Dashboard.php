<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogCaloriesUserModel;
use App\Models\SuggestionMenuModels;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $userCalories = LogCaloriesUserModel::where('user_id',$userId)
            ->whereDate('created_at', '=', Carbon::today())
            ->sum('calories')
        ;
        $data = [
            'user_calories' => $userCalories
        ];

        return view('dashboard', $data);
    }
}
