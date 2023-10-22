<?php

namespace App\Http\Controllers\Api;

use App\Models\CarouselItems;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CarouselItemRequest;

class CarouselItemController extends Controller
{
    public function index()
    {
        return CarouselItems::all();
    }

    public function store(CarouselItemRequest $request)
    {
    // Retrieve the validated input data...
     $validated = $request->validated();

        $carouselItem = CarouselItems::create($validated);

        return $carouselItem;
    }
    public function show(string $id)
    {
       return  CarouselItems::findOrFail($id);
    }
   
    public function update(CarouselItemRequest $request, string $id)
    {
     $validated = $request->validated();

        $carouselItem = CarouselItems::findOrFail($id);

        $carouselItem->update($validated);

            return $carouselItem;
    }

    public function destroy(string $id)
    {
        $carouselItem = CarouselItems::findOrFail($id);
 
        $carouselItem->delete();

        return $carouselItem;
    }
}
