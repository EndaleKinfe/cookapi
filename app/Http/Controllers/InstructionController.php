<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use App\Http\Requests\StoreInstructionRequest;
use App\Http\Requests\UpdateInstructionRequest;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstructionRequest $request)
    {
        Instruction::create($request->validated());
        return response("created", 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstructionRequest $request, Instruction $instruction)
    {
        $instruction($request->validated());
        return response("updated", 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instruction $instruction)
    {
        $instruction->delete();
        return response("image deleted", 200);
    }
}
