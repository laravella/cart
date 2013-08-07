<?php class ProductsSeeder extends Seeder {

        private function __addProduct($name, $model, $size) {
            $product = array('name'=>$name, 'model'=>$model, 'size'=>$size);     
            $productId = DB::table('products')->insertGetId($product);
//            Log::write('info', $label.' menu created');
            return $productId;
        }
        
	public function run()
	{

		DB::table('products')->delete();
                
                //$this->__addProduct('name', 'model', 'size');
        }
        

}