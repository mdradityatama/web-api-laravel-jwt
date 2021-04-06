<?php

namespace App\Http\Controllers;

use App\Helpers\MessageError;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $getRequest = json_decode($request->getContent());

        $user = User::where('username', $getRequest->username)->first();

        if ($user != null)
        {
            if (Hash::check($getRequest->password, $user->password))
            {
                $token = JWTAuth::fromUser($user);
            }
            else
            {
                return response()->json([
                    'succeeded' => false,
                    'message' => MessageError::WRONG_PASSWORD_OR_EMAIL
                ]);
            }
        }
        else
        {
            return response()->json([
                'succeeded' => false,
                'message' => MessageError::WRONG_PASSWORD_OR_EMAIL
            ]);
        }

        return response()->json([
            'succeeded' => true,
            'message' => "",
            'data' => [compact('user', 'token')]
        ]);
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
        $getRequestForValidation = json_decode($request->getContent(), true);

        $validator = Validator::make($getRequestForValidation, [
            'name' => 'required|max:100',
            'username' => 'required|max:100|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succeeded' => false,
                'message' => $validator->messages()
            ]);
        }

        try
        {

            $getRequest = json_decode($request->getContent());

            $user = new User();
            $user->name = $getRequest->name;
            $user->username = $getRequest->username;
            $user->password = bcrypt($getRequest->password);
            $user->save();
        }
        catch (Exception $e)
        {
            return response()->json([
                'succeeded' => false,
                'message' => [$e->getMessage()]
            ]);
        }

        return response()->json([
            'succeeded' => true,
            'message' => MessageError::USER_REGISTERED
        ]);
    }
}
