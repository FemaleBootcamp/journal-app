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

        $goalStatus = $request->goalStatus;

        $dateFrom=$request->dateFrom;
        $dateTo=$request->dateTo;


        $wherePart=[];

        if(empty($dateFrom) && empty($dateTo)) {
            $wherePart = [['date', '>=', date('Y-m-d', strtotime('first day of this month'))]];
            $wherePart = [['date', '<=', date('Y-m-d', strtotime('last day of this month'))]];
        } else {
            if(!empty($dateFrom)) {
                $wherePart = [['date', '>=', $dateFrom]];
            }
            if(!empty($dateTo)) {
                $wherePart = [['date', '<=', $dateTo]];
            }
        }


        if($goalStatus)
        {
            $wherePart = [['goal_status', $goalStatus]];
//            $journals = Journal::where($wherePart)->get();
        }
       if(!$goalStatus)
        {
            $wherePart = [['goal_status', $goalStatus]];
//          $journals = Journal::where($wherePart)->get();
        }

       if(is_null($goalStatus)) {
           $journals = Journal::all();
           return response()->json($journals);
       }
        return $journals = Journal::where($wherePart)-> get();


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
