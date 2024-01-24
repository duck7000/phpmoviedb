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

require_once $loc."/lib/objects/User.class.php";

/**
 * UserDataManager Class Doc Comment
 * 
 * UserDataManager extends DataManager Class
 * 
 * @category UserDataManager_Extends_DataManager
 * @package  UserDataManager
 * @author   Ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */
class UserDataManager extends DataManager
{
    /**
     * Add a new user
     * 
     * @param string $User new username.
     * 
     * @return new user id.
     */
    function add($User)
    {
        // Add user to database.
        $query  = "INSERT INTO `users` (email, username, password, permission, lastlogin) VALUES ";
        $query .= "('".addslashes($User->email)."', ";
        $query .= "'".addslashes($User->username)."', ";
        $query .= "'".addslashes($User->password)."', ";
        $query .= "'".addslashes($User->permission)."', ";
        $query .= "'".addslashes($User->lastlogin)."')";

        $this->db->insert($query);
        $User->id = $this->db->insertId();

        // Update the user object.
        $User->update();

        return $User->id;
    }


    /**
     * Remove user
     * 
     * @param string $User username.
     * 
     * @return nothing, removed selected user.
     */
    function remove($User)
    {
        // Query.
        $query = "DELETE FROM `users` WHERE id = '".addslashes($User->id)."'";

        $this->db->delete($query);
    }

    /**
     * Get all users
     * 
     * @param string $sort sort by username.
     * 
     * @return array found users.
     */
    function getAllUsers($sort = "username")
    {
        // List to fill and return.
        $return = array();

        // Query.
        $query = "SELECT * FROM `users` ORDER BY ".addslashes($sort);

        if ($rs = $this->db->select($query)) {
            // Create all users
            while ($row = $rs->getNextRow()) {
                $User = new User();
                $app = new Factory();
                $User = $app->FillObject($User, $row);
                $return[] = $User;
            }
        }
        // Return.
        return $return;
    }

    /**
     * Get user by id
     * 
     * @param int $id input user id.
     * 
     * @return object User.
     */
    function getUser($id)
    {
        // Query.
        $query = "SELECT * FROM `users` WHERE id = '".addslashes($id)."'";

        if ($rs = $this->db->select($query)) {
            // Create user.
            if ($row = $rs->getNextRow()) {
                $User = new User();
                $app = new Factory();
                $User = $app->FillObject($User, $row);
                return $User;
            }
        }
        // Nothing found.
        return false;
    }

    /**
     * Get user by username
     * 
     * @param string $username input username.
     * 
     * @return object User.
     */
    function getUserByName($username)
    {
        // Query.
        $query = "SELECT * FROM `users` WHERE username = '".addslashes($username)."'";

        if ($rs = $this->db->select($query)) {
            // Create user.
            if ($row = $rs->getNextRow()) {
                $User = new User();
                $app = new Factory();
                $User = $app->FillObject($User, $row);
                return $User;
            }
        }
        // Nothing found.
        return false;
    }

    /**
     * Check if username already exists
     * 
     * @param string $username input new username.
     * @param string $email    input new Email.
     * 
     * @return true if exists, false if not.
     */
    function existsUser($username, $email = "")
    {
        // By name.
        $u = $this->getUserByName($username);
        if ($u) {
            return true;
        }

        // By email.
        if ($email != "") {
            $u = $this->getUserByEmail($username);
            if ($u) {
                return true;
            }
        }
        // Not found.
        return false;
    }

    /**
     * Get a user by its email address
     * 
     * @param string $email input Email.
     * 
     * @return object user if exists, false if not.
     */
    function getUserByEmail($email)
    {
        // Query.
        $query = "SELECT * FROM `users` WHERE email = '".addslashes($email)."'";

        if ($rs = $this->db->select($query)) {
            // Create user.
            if ($row = $rs->getNextRow()) {
                $User = new User();
                $app = new Factory();
                $User = $app->FillObject($User, $row);
                return $User;
            }
        }
        // Nothing found.
        return false;
    }
}
?>