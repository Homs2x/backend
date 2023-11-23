<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function image(UserRequest $request)
    {
        $User_id = User::findOrFail($request->user()->id);

        if(is_null($User_id->image)){
            Storage::disk('public')->delete($User_id->image);
        }

        $User_id->image = $request->file('image')->storePublicly('image', 'public');

        
 
        $User_id->save();

        return $User_id;
    }

    public function show(Request $request)
    {
       return  $request->user();
    }
}
