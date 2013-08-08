<?php namespace Laravella\Cart\Facades;

/**
 * Description of Db
 *
 * @author Victor
 */

use Illuminate\Support\Facades\Facade;

class MysqlGopher extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mysqlgopher';
    }

}

?>
