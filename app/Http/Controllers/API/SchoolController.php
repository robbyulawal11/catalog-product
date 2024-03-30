<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();

        return response()->json([
            'success' => true,
            'message' => 'Get school data',
            'data' => $schools,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validator Errors',
                'data' => $validator->errors()
            ]);
        }

        $school = School::create([
            'name' => $request->name,
            'address' => $request->address
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Create School Data',
            'data' => $school,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        return response()->json([
            'success' => true,
            'message' => 'Get school data by id',
            'data' => $school,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validator Errors',
                'data' => $validator->errors()
            ]);
        }

        $school->update([
            'name' => $request->name,
            'address' => $request->address
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Update School Data',
            'data' => $school,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete School data',
            'data' => null
        ]);
    }
}
