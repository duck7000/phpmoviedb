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
 * ResultSet Class Doc Comment
 * 
 * ResultSet Class
 * 
 * @category ResultSet_Class
 * @package  ResultSet
 * @author   Ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */
class ResultSet
{
    var $result;

    /**
     * ResultSet constructor
     * 
     * @param $r Database result rescource identifier
     */
    function __construct($r)
    {
        $this->result = $r;
    }

    /**
     * Get Database rows
     * 
     * @return array database rows
     */
    function getNextRow()
    {
        return mysqli_fetch_assoc($this->result);
    }

    /**
     * Returns number of rows from a select statement
     * 
     * @return int amount.
     */
    function numberOfRows()
    {
        return mysqli_num_rows($this->result);
    }

    /**
     * Returns number of affected rows from insert,delete or update statement
     * 
     * @return int amount.
     */
    function numberOfAffectedRows()
    {
        return mysqli_affected_rows($this->result);
    }

    /**
     * Returns last Id number generated by mysql auto_increment function
     * 
     * @return int insert id.
     */
    function insertId()
    {
        return mysqli_insert_id();
    }
}
?>