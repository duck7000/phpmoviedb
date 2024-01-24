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
 * Some important variables to work with in code or templates:
 * 
 * - 'users' are all users
 * 
 * @category Datamanagers
 * @package  Datamanagers
 * @author   ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */

require_once $loc."/lib/db/UserDataManager.class.php";

// Datamanagers.
$userdm = new UserDataManager($db, $settings);

// If user logged in, it can update user information.
if ($loggedin) {

    // If logedin user is admin, it can modify other users too.
    if ($User->isAdmin()) {

        // Retrieve all users.
        $users = $userdm->getAllUsers();
        $w->assign("users", $users);

        // Retrieve user.
        if (isset($_GET["id"])) {
            $theuser = $userdm->getUser($_GET["id"]);
            if ($theuser) {
                $w->assign("theuser", $theuser);
            } else {
                unset($theuser);
            }
        }

        // Add new user.
        if ($User->isAdmin() && isset($_POST["add"]) && $_POST["add"] == "1") {
            $newuser = new User();
            $app = new Factory();
            $newuser = $app->fillObject($newuser, $_POST);
            $newuser->password = md5($newuser->password);

            // Does the new username already exists?
            if ($userdm->existsUser($newuser->username, $newuser->email)) {
                $w->assign("username_error", true);
                $w->assign("newuser", $newuser);
            } else {
                $userdm->add($newuser);
                // Go back.
                goBack();
            }
        }

        // Remove user.
        if (isset($_GET["delete"])) {
            $deleteuser = $userdm->getUser($_GET["delete"]);
            if ($deleteuser && $deleteuser->username != "admin") {
                $userdm->remove($deleteuser);
            }
            // Go back
            goBack();
        }
    }

    // Update user information.
    if (isset($_POST["update"])) {

        // What user should be updated? 
        if (isset($theuser)) {
            $updateuser = $theuser;
        } else {
            $updateuser = $User;
        }

        // Save old password.
        $oldpassword = $updateuser->password;
        $app = new Factory();
        $updateuser = $app->fillObject($updateuser, $_POST);

        // If password is set, change it.
        if ($_POST["password"] != "") {
            $updateuser->password = md5($_POST["password"]);
        } else {
            // Restore old password
            $updateuser->password = $oldpassword;
        }
        $updateuser->update();
        // Go back
        goBack();
    }
}
?>