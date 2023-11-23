<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function show(string $id)
    {
       return  User::findOrFail($id);
    }
    public function destroy(string $id)
    {
        $User_id = User::findOrFail($id);
 
        $User_id->delete();

        return $User_id;
    }
    public function store(UserRequest $request)
    {
    // Retrieve the validated input data...
     $validated = $request->validated();

        $carouselItem = User::create($validated);

        return $carouselItem;
    }
   /* public function update(UserRequest $request, string $id)
    {
     $validated = $request->validated();

        $carouselItem = User::findOrFail($id);

        $carouselItem->update($validated);

            return $carouselItem;
    }*/

    public function image(UserRequest $request, string $id)
    {
        $User_id = User::findOrFail($id);

        if(is_null($User_id->image)){
            Storage::disk('public')->delete($User_id->image);
        }

        $User_id->image = $request->file('image')->storePublicly('image', 'public');

        
 
        $User_id->save();

        return $User_id;
    }
}
