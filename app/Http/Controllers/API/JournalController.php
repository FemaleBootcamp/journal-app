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
}
