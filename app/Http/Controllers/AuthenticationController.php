<?php

namespace App\Http\Controllers;

use App\Helpers\MessageError;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user != null)
        {
            if (Hash::check($request->password, $user->password))
            {
                $token = JWTAuth::fromUser($user);
            }
            else
            {
                return response()->json(MessageError::WRONG_PASSWORD_OR_EMAIL);
            }
        }
        else
        {
            return response()->json(MessageError::USER_NOT_REGISTERED);
        }

        return response()->json($token);
    }

    public function claims()
    {
        try
        {
            $user = JWTAuth::parseToken()->authenticate();

            if (! $user)
            {
                return response()->json(MessageError::USER_NOT_FOUND, 404);
            }
        }
        catch (TokenExpiredException $e)
        {
            return response()->json(MessageError::TOKEN_EXPIRED);
        }
        catch (TokenInvalidException $e)
        {
            return response()->json(MessageError::TOKEN_INVALID);
        }
        catch (JWTException $e)
        {
            return response()->json(MessageError::TOKEN_NOT_FOUND);
        }

	    return response()->json($user);
    }

    public function register(Request $request)
    {
        try
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->phone = $request->phone;
            $user->password = bcrypt($request->password);
            $user->save();
        }
        catch (Exception $e)
        {
            return response()->json($e);
        }

        return response()->json(MessageError::USER_REGISTERED);
    }
}
