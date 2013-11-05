<?php 
use Laravella\Crud\Params;

class CartController extends DbController {

    public function getIndex()
    {
        $viewName = 'skins::'.Options::get('skin').'.frontview';
        $params = new Params(self::SUCCESS, '', null, $viewName);
        
        return View::make('skins::'.Options::get('skin').'.frontend.default')
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
