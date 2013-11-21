<?php use Laravella\Crud\CrudSeeder;
use \DB;

class PostCrudSeeder extends CrudSeeder {
    
    public function run()
    {
        //create a record in the 'contents' table with the slug 'home'
//        $contentId = $this->addContents('home', 'Cart', 'Welcome', 'Welcome');
        //link a database table to a page (a record in _db_pages to a record in _db_tables
        //$this->linkPageToTable($slug, $tableName);
        //link the contents table to _db_pages
//        $this->linkContentToPage('home', 'contents_getpage');
        
        echo "Cart::PostCrudSeeder done.\n";
        
    }

}