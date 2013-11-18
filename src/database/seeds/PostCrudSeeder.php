<?php use Laravella\Crud\CrudSeeder;
use \DB;

class PostCrudSeeder extends CrudSeeder {
    
    public function run()
    {
        DB::table('contents')->delete();
        
        $contentId = $this->addContents('home', 'Cart', 'Welcome', 'Welcome');
        //$this->linkPageToTable($slug, $tableName);
        $this->linkContentToPage('home', 'contents_getpage');
        
        echo "Cart::PostCrudSeeder done.\n";
        
    }

}