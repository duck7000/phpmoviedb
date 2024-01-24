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

require_once $loc."/lib/db/MovieDataManager.class.php";

// Datamanagers.
$moviedm = new MovieDataManager($db, $settings);

/***********************************************************
 * Create a CSV list to import in Excel.
 ***********************************************************/

// variables.
$separator = ";"; // Choose what you want as separator.
$newline = "\n"; // Linebreak.
$tab = "\t"; // Tab, it helps direct import in Excel.

// check if post is correctly set.
if (isset($_POST)) {
  $post = $_POST;
  unset($post['submit']); // remove not used submit.
  $count = count($post);
}

// Retrieve all movies.
$movies = $moviedm->searchMovies("", "name", "", "", 0, -1);

// Create csv column headers.
$file = $tab;
$i = 1;
foreach ($post as $value) {
  $file .= ucwords($value) . $separator;
  if ($i == $count) {
    $file .= $newline . $newline;
  }
  $i++;
}

// Create corresponding Values.
foreach ($movies as $movie) {
  $i = 1;
  foreach ($post as $value) {
    $file .= $movie->getLine($value, " - "). $tab . $separator;
    if ($i == count($post)) {
      $file .= $newline;
    }
    $i++;
  }

}
//$file = Utf8_decode($file);
$date = date('d-m-Y');

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=\"moviecollection_Excel_CSV_$date.csv\"");
header("Pragma: cache");
header("Cache-Control: public, must-revalidate, max-age=0");
header("Connection: close");
header("Expires: ".date("r", time() + 60 * 60));
header("Last-Modified: ".date("r", time()));
header("Content-length: ".strlen($file)."\r\n");
echo $file;
exit();
?>