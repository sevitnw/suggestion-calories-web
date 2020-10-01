<?php

namespace App\Http\Controllers;

use App\Models\LogCaloriesUserModel;
use App\Models\SuggestionMenuModels;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class LogCaloriesUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $logCalories = LogCaloriesUserModel::where('user_id', $userId)->whereDate('created_at', '=', Carbon::today())->get();
        $data = [
            'log_calories' => $logCalories
        ];
        return view('log-calories', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $request->validate([
            'makanan'=>'required',
            'berat_badan'=>'required',
            'tinggi_badan'=>'required',
            'jenis_kelamin' => [
                'required',
                Rule::in(['Laki-laki', 'Perempuan']),
            ],
            'calories' => 'required|numeric',
        ]);
        $userCaloriesByDay = LogCaloriesUserModel::where('user_id',$userId)
            ->whereDate('created_at', '=', Carbon::today())
            ->sum('calories')
        ;
        $maxCaloriesByDay = env('MAX_CALORIES_BY_DAY');
        $userTotalCaloriesByDay = $userCaloriesByDay + $request->input('calories');
        $userRemainCaloriesByDay = $maxCaloriesByDay - $userCaloriesByDay;
        $getSuggestionMenus = SuggestionMenuModels::where('calories', '<', $userRemainCaloriesByDay)->orderBy('calories', 'DESC')->first();

        $logCalories = new LogCaloriesUserModel([
            'makanan' => $request->input('makanan'),
            'berat_badan' => $request->input('berat_badan'),
            'tinggi_badan' => $request->input('tinggi_badan'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'calories' => $request->input('calories'),
            'hasil' => $userTotalCaloriesByDay,
            'user_id' => $userId
        ]);

        $logCalories->save();
        $message = [
            'success' => 'Log kamu berhasil disimpan, saat ini kalori-mu adalah : {$userTotalCaloriesByDay}',
            'suggested_menu' => $getSuggestionMenus,
        ];

        return redirect('/log-calories')->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
