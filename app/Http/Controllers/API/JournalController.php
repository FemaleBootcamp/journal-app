<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\JournalRequest;
use App\Journal;
use App\Http\Controllers\Controller;
use function MongoDB\BSON\toJSON;

class JournalController extends Controller
{
    public function store(JournalRequest $request)
    {
        Journal::create($request->validated());
        return response()->json(['status' => 'success'], 201);
    }



    /* API endpoint for filtering all records
     * */

    public function filter(Request $request){

        $journal = Journal::create([
            'user_id' => $request ->input('user_id'),
            'dateFrom' => $request->input('dateFrom'),
            'dateTo' => $request->input('dateTo'),
            'goalStatus' => $request -> input('goalStatus')
        ]);

//
//        if($journal -> $dateFrom.isEmptyOrNullString() || $journal -> $dateTo.isEmptyOrNullString())
//        {
//          $dateRange = date("m-Y", strtotime("first day of previous month"));
//
//
//        }

        if( $journal -> $goalStatus || $journal -> $goalStatus.isEmpty()){

            return  $journal.toJSON();
        }
        else {
            return back()->withInput()->with('error', 'Goal is not achieved!');
        }


    }





}
