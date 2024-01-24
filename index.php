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

$time_start = microtime(true);

// Default config.
require_once "common.inc.php";
require_once "lib/util/imdbphp/bootstrap.php";

// Login script.
require_once "includes/login.inc.php";

// Include.
$template_dir = $w->template_include_dir;

if (isset($_GET['go'])) {
    $go = $_GET['go'];
} else {
    $go = '';
}

switch ($go) {
default: // Default opening page.
    // Template.
    $w->assign("main", "movies/collection.php");
    $w->assign("default", "1");
    // Movies
    include_once "includes/movies.inc.php";
    include_once $template_dir . "main.php";
    break;
case "login": // Login Form.
     // Template.
     $w->assign("main", "users/login.php");
     $w->assign("referer", $_SERVER["HTTP_REFERER"]);
     include_once $template_dir . "main.php";
    break;
case "list": // Create a list of the movies.
    // Viewing movies is only possible when logged in or guests view.
    if (!$loggedin && !$guestview) {
        header("Location: ./");
        exit();
    }
    // Movies
    include_once "includes/movies.inc.php";
    include_once $template_dir . "movies/list.php";
    break;
case "icon": // Create a list of the movies.
    // Viewing movies is only possible when logged in or guests view.
    if (!$loggedin && !$guestview) {
        header("Location: ./");
        exit();
    }
    // Movies
    include_once "includes/movies.inc.php";
    include_once $template_dir . "movies/icon.php";
    break;
case "movie": // Show the information of one movie.
    // Template.
    $w->assign("main", "movies/movie.php");
    // Viewing movie information is only possible when logged in or guests view.
    if (!$loggedin && !$guestview) {
        header("Location: ./");
        exit();
    }
    // Movies.
    include_once "includes/movies.inc.php";
    include_once $template_dir . "main.php";
    break;
case "add": // Add a new movie.
    // Template.
    $w->assign("main", "movies/add.php");
    // Adding is only possible if the user is logged in and editor.
    if (!isset($User) || !$User->isEditor()) {
        header("Location: ./");
        exit();
    }
    // Movies.
    include_once "includes/movies.inc.php";
    include_once $template_dir . "main.php";
    break;
case "edit": // Edit the movie information.
    // Template.
    $w->assign("main", "movies/edit.php");
    // Editing is only possible if the user is logged in and editor.
    if (!isset($User) || !$User->isEditor()) {
        header("Location: ./");
        exit();
    }
    // Movies.
    include_once "includes/movies.inc.php";
    include_once $template_dir . "main.php";
    break;
case "update": // Update the movie information from IMDb.
    // Template.
    $w->assign("main", "movies/update.php");
    // Updating is only possible if the user is logged in and editor.
    if (!isset($User) || !$User->isEditor()) {
        header("Location: ./");
        exit();
    }
    // IMDb.
    include_once "includes/imdb.inc.php";
    include_once $template_dir . "main.php";
    break;
case "export": // Download movie list as CSV.
    // Export.
    include_once "includes/export.inc_Excel_CSV.php";
    exit();
    break;
case "photo": // update front images of all movies
    include_once "includes/trailerupdate.inc.php";
    exit();
    break;
case "exportform": // Update all movies from IMDb.
    // Template.
    $w->assign("main", "movies/exportform.php");
    // Updating is only possible if the user is logged in and editor.
    if (!isset($User) || !$User->isEditor()) {
        header("Location: ./");
        exit();
    }
    include_once $template_dir . "main.php";
    break;
case "profile": // Change your profile (password and e-mail)
    // Template.
    $w->assign("main", "users/profile.php");
    // Updating is only possible if the user is logged in.
    if (!isset($User)) {
        header("Location: ./");
        exit();
    }
    // Users.
    include_once "includes/users.inc.php";
    include_once $template_dir . "main.php";
    break;
}

?>