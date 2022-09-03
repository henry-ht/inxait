<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContestCreateRequest;
use App\Models\Contest;
use App\Models\Department;
use Illuminate\Http\Request;

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

        return view('landingContest', ['department' => $department, 'contest_count' => $contest_count]);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function show(Contest $contest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function edit(Contest $contest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contest $contest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest)
    {
        //
    }
}
