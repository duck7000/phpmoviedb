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
 * Some important variables for other users to work with in code or templates:
 * - 'loggedin' is true when the user is logged in
 * - 'guestview' is true when guests can view movies
 * - 'User' is the logged in user and its information
 * 
 * @category Login
 * @package  Login.inc.
 * @author   Ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */

require_once $loc."/lib/db/UserDataManager.class.php";

// Datamanagers.
$userdm = new UserDataManager($db, $settings);

// Check if a user is logged in.
if (isset($_SESSION["User"])) {
    $User = unserialize($_SESSION["User"]);
    if ($User && isset($User->id)) {
        $User = $userdm->getUser($User->id);

        // If this user exists in the database, user is logged in.
        if ($User) {
            $w->assign("User", $User);
        } else {
            // Otherwise log this user out
            logOut();
        }
    }
}

// Login.
if (!isset($User) && isset($_POST["username"]) && isset($_POST["password"])) {
    $User = $userdm->getUserByName($_POST["username"]);

    // Correct information?
    if ($User && $User->password == md5($_POST["password"])) {
        $User->lastlogin = date("Y-m-d H:i:s");
        $User->update();
        $_SESSION["User"] = serialize($User);

        // Logged in, go back.
        goBackLogin($_POST["referer"]);
    } else {
        // Wrong information.
        unset($User);
        $w->assign("login_error", true);
    }
}

// Logout.
if (isset($_GET["logout"])) {
    logOut();
}

// Determine if someone is logged in.
$loggedin = isset($User);
$w->assign("loggedin", $loggedin);

//Determine if guests can view the movies.
$guestview = $settings["user"]["guestview"];
$w->assign("guestview", $guestview);

// Change password.
if (isset($_POST["update"]) && $_POST["update"] == 1 && isset($_POST["password"])) {

    // Empty password is not allowed.
    if (isset($User) && trim($_POST["password"]) != "") {
        $User->password = md5($_POST["password"]);
        $User->update();
    }
}

/**
 * Log out function.
 * 
 * @return user is logt out.
 */
function logOut()
{
    // Log out
    unset($_SESSION["User"]);
    unset($User);

    // Go back.
    goBack();
}
?>