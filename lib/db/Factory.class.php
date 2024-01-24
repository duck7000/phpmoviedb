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
 * Factory Class Doc Comment
 * 
 * Factory Class
 * 
 * @category Factory_Class
 * @package  Factory.
 * @author   Ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */
class Factory
{
    /**
     * Fills a variable object with values given in the associative array
     * 
     * @param string $obj Variabel object.
     * @param string $row associative array.
     * 
     * @return array Filled Object.
     */
    function fillObject($obj, $row)
    {
        if (!is_array($row)) {
            return;
        }
        foreach ($row as $key => $value) {
            $obj->set($key, stripslashes($value));
        }
        return $obj;
    }
}
?>