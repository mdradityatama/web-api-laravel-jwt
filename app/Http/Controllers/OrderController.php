<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::with(
            [
                'user',
                'orderProducts.product'
            ]
        )
        ->get();

        return $order;
    }

    public function byUser()
    {
        $user = JWTAuth::parseToken()->authenticate();

        $order = Order::where('user_id', $user->id)
            ->with(
                [
                    'user',
                    'orderProducts.product'
                ]
            )
            ->get();

        return $order;
    }
}
