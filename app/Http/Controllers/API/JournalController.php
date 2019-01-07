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


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * API Endpoint for retrieving records
     * based on a filter.
     */

    public function get(Request $request) {

        $goalStatus=$request->goalStatus;
        $dateFrom=$request->dateFrom;
        $dateTo=$request->dateTo;
        $userId=$request->userId;


        $wherePart=[];

        if(empty($dateFrom) && empty($dateTo)) {
            $wherePart[] = ['date', '>=', date('Y-m-d', strtotime('first day of this month'))];
            $wherePart[]= ['date', '<=', date('Y-m-d', strtotime('last day of this month'))];
        } else {
            if(!empty($dateFrom) ) {
                $wherePart[] = ['date', '>=', $dateFrom];
            }
            if(!empty($dateTo)) {
                $wherePart[] = ['date', '<=', $dateTo];
            }
        }



       if(!empty($goalStatus) || !empty(!($goalStatus)))
        {
            $wherePart[] = ['goal_status', $goalStatus];
        }




       if(!empty($userId)) {
           $wherePart[] = ['user_id', $userId];
       }



       return $journals = Journal::where($wherePart)-> get();


    }


    /**
     * @param Request $request
     * Get a record by a given ID.
     */
    public function getById(Request $request){


        $journal_id=$request->id;

        $wherePart=[['id', $journal_id]];

     return $journals=Journal::where($wherePart)->get();
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








}
