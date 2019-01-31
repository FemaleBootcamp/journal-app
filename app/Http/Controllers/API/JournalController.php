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
        $input = $request->validated();
        if (is_null($input['goal_status'])) {
            $input['goal_status'] = false;
        }
        $journal = Journal::create($input);
        return response()->json(
            $journal,
            201
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * API Endpoint for retrieving records
     * based on a filter.
     */
    public function get(Request $request)
    {

        $goalStatus = $request->goalStatus;
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;
        $userId = $request->userId;


        $wherePart = [];

        if (empty($dateFrom) && empty($dateTo)) {
            $wherePart[] = ['date', '>=', date('Y-m-d', strtotime('first day of this month'))];
            $wherePart[] = ['date', '<=', date('Y-m-d', strtotime('last day of this month'))];
        } else {
            if (!empty($dateFrom)) {
                $wherePart[] = ['date', '>=', $dateFrom];
            }
            if (!empty($dateTo)) {
                $wherePart[] = ['date', '<=', $dateTo];
            }
        }
        if (isset($goalStatus)) {
            $wherePart[] = ['goal_status', $goalStatus];
        }

        if (!empty($userId)) {
            $wherePart[] = ['user_id', $userId];
        }

        return $journals = Journal::where($wherePart)
            ->orderBy('date', 'asc')
            ->get();
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Journal::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(JournalRequest $request, $id)
    {
        $journal = Journal::findOrFail($id);
        $journal->update($request->validated());
        return response()->json([
            'status' => 'success',
            'journal' => $journal
        ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $journal = Journal::findOrFail($id);
        $journal->delete();
        return response()->json(
            [
                'success' => true
            ],
            204);
    }
}
