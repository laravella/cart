<?php

namespace Laravella\Cart;

use \Seeder;
use \Laravella\Crud;

/**
 * Insert laravella specific data into the database
 */
class ApplicationSeeder extends Seeder {

    private function __addProduct($name, $model, $size)
    {
        $product = array('name' => $name, 'model' => $model, 'size' => $size);
        $productId = DB::table('products')->insertGetId($product);
        Log::write('info', $name . ' product added.');
        return $productId;
    }

    public function run()
    {
//            SeedMenus::addMenu();
//            SeedMenus::addAction();
//            SeedMenus::addViews();
    }

}
