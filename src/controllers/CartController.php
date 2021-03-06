<?php 
use Laravella\Crud\Params;

class CartController extends DbController {

    public function getIndex($slug='')
    {
        $viewName = Options::get('skin', 'frontend').'.frontview';
        $params = new Params(true, self::SUCCESS, '', null, $viewName);
        
        return View::make(Options::get('skin', 'frontend').'.frontend.default')
                ->nest('content', $viewName, $params->asArray());
        
    }

    /**
     * An example of IoC
     * 
     * @return type
     */
    public function getConnection() {
        $mysqlGopher = app('MysqlGopher');
        return $mysqlGopher->connection();
    }

    public function missingMethod($parameters = array())
    {
        return "Missing Method";
    }

}

?>
