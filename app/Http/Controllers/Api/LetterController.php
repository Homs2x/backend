<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Letters;
use App\Http\Requests\LetterRequest;

class LetterController extends Controller
{
    public function index(Request $request)
    {
        $letter = Letters::select("letter.sender","letter.subject","letter.body");

        if($request->keyword){
            $letter->where(function($query) use ($request){
                $query->where('sender','ilike','%',$request->keyword, '%')
                ->orwhere('sender','ilike','%',$request->keyword, '%')
                ->prwhere('sender','ilike','%',$request->keyword, '%');
            });
        }

        return $letter->get();
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
    Public function update(LetterRequest $request, string $id)
    {
     $validated = $request->validated();

        $Letter = Letters::findOrFail($id);

        $Letter->update($validated);

            return $Letter;
    }

}
