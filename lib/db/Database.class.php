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

require_once dirname(__FILE__) . "/DatabaseException.class.php";
require_once dirname(__FILE__) . "/ResultSet.class.php";

/**
 * Database object Doc Comment
 * 
 * Database object connects to the database and executes queries on it
 * 
 * @category Database_Class
 * @package  Database.
 * @author   Leslie Kleuver <leslie.kleuver@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */
class Database
{
    var $UNKNOWN_DATABASE_ERROR    = 100;
    var $DATABASE_CONNECTION_ERROR = 101;
    var $DATABASE_SELECTION_ERROR  = 102;
    var $SQL_SYNTAX_ERROR          = 103;

    var $db;
    var $unbuffered;
    var $counter; // Counter for number of queries done.
    var $error = false;
    var $errormessage = "Undefined error";

    /**
     * Database constructor
     * 
     * @param string $settings Username, Password, Databasename, Host.
     * 
     * @throws DatabaseException.
     * 
     * @return this.
     */
    function __construct($settings)
    {
        return $this->init($settings['user'], $settings['pass'], $settings['name'], $settings['host']);
    }

    /**
     * Destruct database construct
     * 
     * @return Close Database.
     */
    function __destruct()
    {
        mysqli_close($this->db);
    }

    /**
     * Database initialization
     * 
     * @param string $user database user.
     * @param string $pasw database password.
     * @param string $name database name.
     * @param string $host database host.
     * 
     * @throws DatabaseException
     * 
     * @return this.
     */
    function init($user, $pasw, $name, $host)
    {
        //initialize values to their defaults.
        $this->unbuffered = false;

        //connect to database.
        $this->db = mysqli_connect($host, $user, $pasw);

        // If anything goes wrong.
        if ($this->db === false) {
            $this->error = true;
            $this->errormessage = mysqli_error($this->db);
        }
        $this->selectDatabase($name);
        return $this;
    }

    /**
     * Database selection
     * 
     * @param string $name database name.
     * 
     * @throws DatabaseException
     * 
     * @return selected database.
     */
    function selectDatabase($name)
    {
        mysqli_select_db($this->db, $name);

        // If anything goes wrong.
        if (mysqli_select_db($this->db, $name) === false) {
            $this->error = true;
            $this->errormessage = mysqli_error($this->db);
        }
    }

    /**
     * Query the database
     * 
     * @param string $sql sql query string.
     * 
     * @throws DatabaseException
     * 
     * @return ResultSet.
     */
    function doQuery($sql)
    {
        $this->counter++;

        if ($this->unbuffered) {
            $resultmode = MYSQLI_USE_RESULT;
        } else {
            $resultmode = MYSQLI_STORE_RESULT;
        }
        $result = mysqli_query($this->db, $sql, $resultmode);

        // If anything goes wrong.
        if ($result === false) {
            $this->error = true;
            $this->errormessage = mysqli_error($this->db);
        }
        return new ResultSet($result);
    }

    /**
     * Alias select for doQuery
     * 
     * @param string $sql sql query string.
     * 
     * @return ResultSet.
     */
    function select($sql)
    {
        return $this->doQuery($sql);
    }

    /**
     * Alias update for doQuery
     * 
     * @param string $sql sql query string.
     * 
     * @return ResultSet.
     */
    function update($sql)
    {
        return $this->doQuery($sql);
    }

    /**
     * Alias insert for doQuery
     * 
     * @param string $sql sql query string.
     * 
     * @return ResultSet.
     */
    function insert($sql)
    {
        return $this->doQuery($sql);
    }

    /**
     * Alias delete for doQuery
     * 
     * @param string $sql sql query string.
     * 
     * @return ResultSet.
     */
    function delete($sql)
    {
        return $this->doQuery($sql);
    }

    /**
     * Get insertId from last query
     * 
     * @return mysql insert.
     */
    function insertId()
    {
        return mysqli_insert_id($this->db);
    }

    /**
     * Get number of affected rows
     * 
     * @return mysql affected rows.
     */
    function numberOfAffectedRows()
    {
        return mysqli_affected_rows($this->db);
    }

    /**
     * Get the amount of found rows
     * 
     * @return array found rows.
     */
    function getFoundRows()
    {
        $count = "SELECT FOUND_ROWS()";
        $rs = $this->select($count);
        $row = $rs->getNextRow();
        return $row["FOUND_ROWS()"];
    }

    /**
     * Escape mysql query
     * 
     * @param string $var sql query string.
     * 
     * @return Escaped query string.
     */
    function escape($var)
    {
        return "'" . mysqli_real_escape_string($var) . "'";
    }
}
?>