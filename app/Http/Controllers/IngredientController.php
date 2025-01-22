<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngredientRequest $request)
    {
        Ingredient::create($request->validated());
        return response("created", 201);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
    {
        $ingredient($request->validated());
        return response("updated", 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return response("ingredient deleted", 200);
    }

}
