<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

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
}
