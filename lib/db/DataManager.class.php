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

require_once $loc . "/lib/db/Factory.class.php";
require_once $loc . "/lib/objects/DataObject.class.php";

/**
 * DataManager Class Doc Comment
 * 
 * DataManager Class
 * 
 * @category DataManager_Class
 * @package  DataManager.
 * @author   Ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */
class DataManager
{
    var $settings;
    var $db;

    /**
     * Construct Database and settings
     * 
     * @param string $db       database name.
     * @param string $settings array with all settings.
     * 
     * @return Construct.
     */
    function __construct($db, $settings = array())
    {
        $this->counter = 0;
        $this->settings = $settings;
        $this->db = $db;
    }
}
?>