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
 * User Class Doc Comment
 * 
 * User Class
 * 
 * @category User_Extends_DataObject
 * @package  User
 * @author   Ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */
class User extends DataObject
{
    /**
     * Define constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    // All variables.
    var $id;
    var $email;
    var $username;
    var $password;
    var $permission;
    var $lastlogin;

    // Static vars for the user permissions.
    var $GUEST = 0;
    var $EDITOR = 1;
    var $ADMIN = 2;

    /**
     * Constructor, default permission is guest for security reasons
     * 
     * @return Guest permision.
     */
    function User()
    { 
        $this->permission = $this->GUEST;
    }

    /**
     * Update user settings
     * 
     * @return Save user settings.
     */
    function update()
    {
        global $settings;
        $host = $settings["db"]["host"]; // Host Name.
        $db = $settings["db"]["name"]; // Database Name.
        $user = $settings["db"]["user"]; // Username.
        $pwd = $settings["db"]["pass"]; // Password.
        $link = mysqli_connect($host, $user, $pwd, $db);

        // MySQL query.
        $query = "UPDATE users SET ";
        $query .= "email = '" . addslashes($this->email) . "', ";
        $query .= "username = '" . addslashes($this->username) . "', ";
        $query .= "password = '" . addslashes($this->password) . "', ";
        $query .= "permission = '" . addslashes($this->permission) . "', ";
        $query .= "lastlogin = '" . addslashes($this->lastlogin) . "' ";
        $query .= "WHERE id = '" . addslashes($this->id) . "'";

        mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);
    }

    /**
     * Check isGuest
     * 
     * @return Guest permisisons.
     */
    function isGuest()
    {
        return $this->permission >= $this->GUEST;
    }

    /**
     * Check isEditor
     * 
     * @return Editor permisisons.
     */
    function isEditor()
    {
        return $this->permission >= $this->EDITOR;
    }

    /**
     * Check isAdmin
     * 
     * @return Admin, includes Guest and Editor permisisons.
     */
    function isAdmin()
    {
        return $this->permission >= $this->ADMIN;
    }

    /**
     * Generate a random password
     *
     * @param int $passwordLength minimal length.
     * 
     * @return password.
     */
    function generateRandomPassword($passwordLength = 8)
    {
        $salt = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQR"
          . "STUVWXYZ234567892345678923456789";

        // Start the random generator.
        srand((double)microtime() * 1000000);

        // Set the inital variable.
        $password = "";

        // loop and create password
        for ($i = 0; $i < $passwordLength; $i++) {
            $password = $password . substr($salt, rand()%strlen($salt), 1);
        }

        return $password;
    }
}
?>