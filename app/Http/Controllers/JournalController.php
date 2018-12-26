<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\JournalRequest;

class JournalController extends Controller
{
    public function create(JournalRequest $request)
    {
        Journal::create($request->validated());
        return response()->json(['status' => 'success'], 201);
    }
}
