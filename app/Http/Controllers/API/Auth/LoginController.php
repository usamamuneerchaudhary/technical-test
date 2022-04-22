<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{


    /**
     * @param  LoginRequest  $request
     *
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {
            $request->validated();
        } catch (ValidationException $e) {
            return response()->json([
                'error' => true,
                'message' => $e
            ], Response::HTTP_BAD_REQUEST);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (auth()->attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
        }
        return response()->json([
            'error' => false,
            'data' => [
                'user' => $user,
                'meta' => [
                    'token' => auth()->user()->createToken('API Token')->plainTextToken,
                ]
            ]
        ], Response::HTTP_OK);
    }

    /**
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'error' => false,
            'message' => 'Token Revoked'
        ], Response::HTTP_OK);
    }

}
