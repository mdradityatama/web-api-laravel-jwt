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
        $product->picture = asset('assets/img/tas.jpeg');
        $product->save();

        $product = new Product();
        $product->name = 'Handphone';
        $product->description = 'Handphone Description';
        $product->picture = asset('assets/img/handphone.jpeg');
        $product->save();

        $product = new Product();
        $product->name = 'Coklat';
        $product->description = 'Coklat Description';
        $product->picture = asset('assets/img/coklat.jpeg');
        $product->save();

        $product = new Product();
        $product->name = 'Skin Care';
        $product->description = 'Skin Care Description';
        $product->picture = asset('assets/img/skin-care.jpeg');
        $product->save();

        $product = new Product();
        $product->name = 'Parfum';
        $product->description = 'Parfum Description';
        $product->picture = asset('assets/img/parfum.jpeg');
        $product->save();
    }
}
