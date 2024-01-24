<?php
/**
 * PHPMovieDB is a movie database program.
 *
 * PHP version 7.4 and 8.1
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.    If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  Movie_Database
 * @package   PHPMovieDB
 * @author    Ed <ed@example.com>
 * @copyright 2005-2020 Ed
 * @license   http://www.gnu.org/licenses/ GNU
 * @link      http://pear.php.net/package/PackageName
 */

/**
 * DataObject Class Doc Comment
 * 
 * DataObject Class
 * 
 * @category DataObject
 * @package  DataObject
 * @author   Ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */
class DataObject
{

    /**
     * Define constructor.
     */
    function __construct()
    {
    }

    /**
     * Returns a value of a variable
     * 
     * @param string $k name of the variable.
     * 
     * @return Var value of the given variable name.
     */
    function get($k)
    {
        return $this->{$k};
    }

    /**
     * Sets the value of a variable
     * 
     * @param string $k name of the variable.
     * @param string $v new value of the given variable name.
     * 
     * @return Var new value of the given variable name.
     */
    function set($k, $v)
    {
        $this->{$k} = $v;
    }

    /**
     * Returns if a variable is set
     * 
     * @param string $k name of the variable.
     * 
     * @return boolean true if set, false if not set.
     */
    function getIsset($k)
    {
        if (isset($this->{$k})) {
            return true;
        } else {
            return false;
        }
    }
}
?>