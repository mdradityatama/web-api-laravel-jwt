<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderProducts = new OrderProduct();
        $orderProducts->order_id = 1;
        $orderProducts->product_id = 1;
        $orderProducts->amount = 5;
        $orderProducts->save();

        $orderProducts = new OrderProduct();
        $orderProducts->order_id = 1;
        $orderProducts->product_id = 2;
        $orderProducts->amount = 2;
        $orderProducts->save();

        $orderProducts = new OrderProduct();
        $orderProducts->order_id = 1;
        $orderProducts->product_id = 3;
        $orderProducts->amount = 7;
        $orderProducts->save();
    }
}
