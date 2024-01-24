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

// UTF8 header.
header('Content-type: text/html; charset=utf-8');

// Local path.
$loc = dirname(__FILE__) . "/";

// Load user and DataObject class, because this can be stored in session.
require_once $loc."lib/objects/DataObject.class.php";
require_once $loc."lib/objects/User.class.php";

// Start session.
session_name("movie");
session_start();

// Make this site PHP5 compatible.
if (PHP_VERSION_ID < 70400) {
    echo "<h1>Fatal error: Requires PHP 7.4.0 - 8.1</h1>";
}

// Check if the config file exists.
if (!file_exists($loc."config/config.php")) {
    echo "<h1>Fatal error</h1>The file <b>config/config.php</b> was not found!";
    exit();
}

// Load config file.
require $loc."/config/config.php";

// check for mobile or dekstop browser
require_once $loc."includes/mobile.browser.php";

// Classes.
require_once $loc."lib/Website.class.php";
require_once $loc."lib/db/Database.class.php";
require_once $loc."lib/db/DataManager.class.php";

// Load the website object
$w = new Website($settings);

// Version
require_once("config/version.inc.php");

// Connect to the database. Settings can be found in config.php.
$db = new Database($settings['db']);

// Did the database failed to connect? Display the error page.
if ($db->error) {
    // create error
    exit();
}

/**
 * Make path recursive.
 * 
 * @param string $path input string.
 * 
 * @return recursive path.
 */
function mkpath($path)
{
    $dirs = array();
    $path = preg_replace('/(\/){2,}|(\\\){1,}/', '/', $path); //only forward-slash
    $dirs = explode("/", $path);
    $path = "";
    foreach ($dirs as $element) {
        $path .= $element . "/";
        if (!is_dir($path)) {
            mkdir($path);
        }
    }
}

/**
 * Make all words uppercase
 * 
 * @param string $tekst input string.
 * 
 * @return UpperCase words.
 */
function upperWords($tekst)
{
    $tekst = ucwords($tekst);
    return $tekst;
}

/**
 * Strip html tags
 * 
 * @param string $tekst input string.
 * 
 * @return stripped from html tags.
 */
function stripTags($tekst)
{
    $preg = '/<span class="nobr"[^>]*>([\s\S]*?)<\/span[^>]*>/';
    $tekst = preg_replace($preg, "", $tekst);
    $tekst = preg_replace("/<i>.*?<\/i>/is", "\n", $tekst);
    $tekst = strip_tags($tekst);
    $tekst = trim($tekst);
    return $tekst;
}

/**
 * Decode UTF8 url strings formatted by JavaScript's escape() function to UTF8
 * 
 * @param string $str input string.
 * 
 * @return utf8 decoded string.
 */
function Utf8_urldecode($str)
{
    return preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str));
}

/**
 * Find the extention of a filename
 * 
 * @param string $filename input string.
 * 
 * @return found extension.
 */
function findExtention($filename)
{
    $array = explode(".", $filename);
    $pos = count($array) - 1;
    $extention = $array[$pos];
    return $extention;
}

/**
 * Go back to previous page.
 * 
 * @return header.
 */
function goBack()
{
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Mon, 01 Jan 1970 00:00:00 GMT"); // Date in the past.
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    } else {
        header("Location: ./");
    }
    exit();
}

/**
 * Return to page from where you logged in.
 * 
 * @param string $referer input string.
 * 
 * @return After login return to page from where logged in.
 */
function goBackLogin($referer)
{
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Mon, 01 Jan 1970 00:00:00 GMT"); // Date in the past.
    if (isset($referer)) {
        header("Location: ".$referer);
    } else {
        header("Location: ./");
    }
    exit();
}
?>
