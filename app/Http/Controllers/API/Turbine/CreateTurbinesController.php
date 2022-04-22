<?php

namespace App\Http\Controllers\API\Turbine;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Turbine\TurbineRequest;
use App\Models\Component;
use App\Models\Farm;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class CreateTurbinesController extends Controller
{
    /**
     * @param  TurbineRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(TurbineRequest $request)
    {
        try {
            $request->validated();
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e
            ], Response::HTTP_BAD_REQUEST);
        }

        try {
            $farm = Farm::findOrFail($request->farm_id);
            $turbine = $farm->turbines()->create([
                'type' => $request->type,
                'farm_id' => $request->farm_id,
                'grade' => $request->grade,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);
            $components = Component::all();
            $turbine->components()->sync($components);

            return response()->json([
                'error' => false,
                'message' => 'Turbine Added to the Farm',
                'turbine' => $turbine
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'error' => true,
                'message' => $exception->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
