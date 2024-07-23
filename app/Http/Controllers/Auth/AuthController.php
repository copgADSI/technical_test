<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerificationMail;
use App\Models\User\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'terms' => $request->terms
        ]);

        $token = $user->createToken('verify_email')->plainTextToken;
/*
        $user->sendEmail(
            $request->email,
            new VerificationMail($user, $token)
        ); */

        return response()->json([
            'registered' => true,
            'user' => $user,
            'message' => '!Usuario creado con éxito¡',
            'token' => $token
        ], Response::HTTP_OK);
    }

    public function verify(string $token)
    {
        $tokenRecord = \Laravel\Sanctum\PersonalAccessToken::findToken($token);

        if (!$tokenRecord) abort(404);

        $user = $tokenRecord->tokenable;

        return view('auth.verify', compact('user'));
    }

}
