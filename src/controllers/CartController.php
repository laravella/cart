<?php

/**
 * Description of DbController
 *
 * @author Victor
 */
class CartController extends BaseController {

    public function getIndex()
    {
        return View::make("cart::dbview");
    }

    public function getConnection() {
        $mysqlGopher = app('MysqlGopher');
        return $mysqlGopher->connection();
    }
    
    public function getSelect($table = null)
    {
        return View::make("cart::dbview");
    }

    public function getTable($name = null)
    {
        die;
    }

    public function missingMethod($parameters = array())
    {
        return "Missing Method";
    }

}

?>
