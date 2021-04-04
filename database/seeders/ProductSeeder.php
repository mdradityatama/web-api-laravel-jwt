<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name = 'Tas';
        $product->description = 'tas Description';
        $product->save();

        $product = new Product();
        $product->name = 'Handphone';
        $product->description = 'Handphone Description';
        $product->save();

        $product = new Product();
        $product->name = 'Coklat';
        $product->description = 'Coklat Description';
        $product->save();
    }
}
