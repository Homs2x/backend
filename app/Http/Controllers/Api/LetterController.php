<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Letters;
use App\Http\Requests\LetterRequest;

class LetterController extends Controller
{
    public function index()
    {
        return Letters::all();
    }
    public function show(string $id)
    {
       return  Letters::findOrFail($id);
    }


    public function store(LetterRequest $request)
    {
    // Retrieve the validated input data...
     $validated = $request->validated();

        $Letters = Letters::create($validated);

        return $Letters;
    }
    public function destroy(string $id)
    {
        $Letter_id = Letters::findOrFail($id);
 
        $Letter_id->delete();

        return $Letter_id;
    }
}
