<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Controller;
// use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class PasswordUpdateController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'current_password'  => ['required', 'current_password'],
            'password'          => ['required', 'confirmed', Password::default()],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return response()->json([
            'message' => 'your password has been updated successfully!',

        ], Response::HTTP_ACCEPTED);
    }
}
