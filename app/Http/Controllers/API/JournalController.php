<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\JournalRequest;
use App\Journal;
use App\Http\Controllers\Controller;

class JournalController extends Controller
{
    public function store(JournalRequest $request)
    {
        Journal::create($request->validated());
        return response()->json(['status' => 'success'], 201);
    }


    public function get(Request $request) {
         return response()->json($request->all());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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




    /* API endpoint for filtering all records
     * */

    public function filter(Request $request){

        $dateFrom = $request->input('dateFrom');
        $dateTo = $request -> input('dateTo');

//        $journals = Journal::where('user_id','$user_id')->get();
        //   $journalsFiltered = Journal::where('goalStatus', '$goalStatus')->get();

        $wherePart=[ ['user_id', '$user_id']];

        if(!empty($dateFrom)) {
            $wherePart = [['dateFrom', '$dateFrom']];
        }
        if(!empty($dateTo)){
            $wherePart = [ ['dateTo', '$dateTo']];
        }
        if(empty($dateFrom) || empty($dateTo))
        {
            // get the data from the last month
            $createdAt = Journal::whereMonth(
                'created_at', '=', \Carbon\Carbon::now()->subMonth()->month
            );

            $wherePart = [ [ 'createdAt', '$createdAt']];
        }


        $journals = Journal::where($wherePart)->get();

    }

    public function filterByGoalStatus(Request $request){

        $goalStatus = $request -> goalStatus;
        if($goalStatus)
        {
            $wherePart = [['goal_status', '$goalStatus']];
            $journals = Journal::where($wherePart)-> get();
            return response()->json($request->all());

        }
        else{
            $journals = Journal::all();
             return response()->json($request->all());
        }
    }




}
