<?php use Laravella\Crud\CrudSeeder;
use \DB;

class PostCrudSeeder extends CrudSeeder {
    
    public function run()
    {
        DB::table('contents')->delete();
        
        $this->addContents('home', 'Cart', 'Welcome', 'Welcome to shopping cart');        
        echo "Cart::PostCrudSeeder done.\n";
        
    }

}