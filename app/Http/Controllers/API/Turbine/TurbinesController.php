<?php

namespace App\Http\Controllers\API\Turbine;

use App\Http\Controllers\Controller;
use App\Models\Turbine;
use Illuminate\Config\Repository;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TurbinesController extends Controller
{
    protected $perPage;
    protected $request;

    /**
     * @param  Request  $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->perPage = $request->perPage ? $request->perPage : config('app.pagination_count');
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        try {
            $turbines = Turbine::createdByDesc()
                ->paginate($this->perPage);

            return response()->json([
                'error' => false,
                'turbines' => $turbines,
            ], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json([
                'error' => true,
                'message' => $exception->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


}
