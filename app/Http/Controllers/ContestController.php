<?php

namespace App\Http\Controllers;

use App\Exports\ContestExport;
use App\Http\Requests\ContestCreateRequest;
use App\Models\Contest;
use App\Models\Department;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department     = Department::with(['cities'])->get();
        $contest_count  = Contest::count();
        $name_winner    = null;
        $winner_status  = false;

        if($contest_count == 5){
           $this->lottery();
           $winner = Contest::where('winner', 1)->first();
            if(isset($winner)){
                $name_winner    = $winner->name.' '.$winner->last_name;
                $winner_status  = $winner->winner;
            }
        }
        return view('landingContest', [
            'department'        => $department,
            'contest_count'     => $contest_count,
            'name_winner'       => $name_winner,
            'winner_status'     => $winner_status,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContestCreateRequest $request)
    {
        $credentials = $request->only([
            'name',
            'last_name',
            'identification_number',
            'email',
            'phone',
            'department_id',
            'city_id',
            'habeas_data',
        ]);

        $limit = Contest::count();

        if($limit == 5){
            return back()->with('error', __('Sorry, the list of contestants is full'))->withInput($credentials);
        }

        $status = Contest::updateOrCreate([
            'email' => $credentials['email']
        ], $credentials);

        return back()->with('success', __('You are already registered among the contestants, wait for the draw'));
    }

    public function export() {
        return Excel::download(new ContestExport, 'contest.xlsx');
    }

    public function lottery(){
        $limit = Contest::count();
        $norepeat = Contest::where('winner', 1)->count();

        if($limit == 5 && $norepeat == 0){
            $winner = Contest::all()->random();

            $winner->winner = true;
            $winner->save();
        }
    }

}
