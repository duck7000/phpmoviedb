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
 * - 'imdbmovie' is the movie containing the information directly from IMDb.
 * 
 * @category ImDb_update
 * @package  IMDbb.
 * @author   Ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */

require_once $loc."/lib/db/MovieDataManager.class.php";

// Datamanagers.
$moviedm = new MovieDataManager($db, $settings);

// Cast images Path.
$castpath = $settings["foto"]["cast"];

// Reccomendations images Path.
$recommendationspath = $settings["foto"]["recommendations"];

// Episodes images Path.
$episodespath = $settings["foto"]["episodes"];

// Trailers images Path.
$trailerspath = $settings["foto"]["trailers"];

// main photo's images Path.
$mainphotopath = $settings["foto"]["mainphoto"];

// Variable.
$jpg = ".jpg";

// Update movie information from IMDb If logged and editor.
if ($loggedin && $User->isEditor()) {

    // Updating is only possible if $User is set and editor.
    if (isset($User) && $User->isEditor()) {

        // Get movie.
        if (isset($_GET["id"])) {
            $movie = $moviedm->getMovie($_GET["id"]);
            if (!$movie) {
                goBack();
            }
            $w->assign("mymovie", $movie);

            // Search IMDb for this movie.
            $imdbmovie = new \Imdb\Title($movie->imdbid);
        }

        // Update.
        if (isset($movie) && isset($_POST["update"]) && $_POST["update"] == 1) {
            $app = new Factory();
            $movie = $app->FillObject($movie, $_POST);
            $movie->update();

            // Save front photo from imdb.
            $photo = $imdbmovie->photo();
            if (isset($photo) && $photo != '') {
                $file = $settings["foto"]["movies"] . $movie->id . $jpg;
                $ch = curl_init($photo);
                $fp = fopen($file, 'wb');
                $movie->curlFileHandler($ch, $fp);
            }

            // Save cast images.
            $cast = $imdbmovie->cast();
            foreach ($cast as $item) {
                if ($item['thumb'] != "") {
                    if (!file_exists($castpath . $item['imdb'] . $jpg)) {
                        $ch = curl_init($item['thumb']);
                        $fp = fopen($castpath . $item['imdb'] . $jpg, 'wb');
                        $movie->curlFileHandler($ch, $fp);
                    }
                }
            }
            
            // Save main photo's images.
            $mainPhoto = $imdbmovie->mainphoto();
            foreach ($mainPhoto as $key => $item) {
                if ($item != "") {
                    if (!file_exists($mainphotopath . $movie->id . '_' . $key . $jpg)) {
                        $ch = curl_init($item);
                        $fp = fopen($mainphotopath . $movie->id . '_' . $key . $jpg, 'wb');
                        $movie->curlFileHandler($ch, $fp);
                    }
                }
            }

            // Save recommendations images.
            $rec = $imdbmovie->recommendation();
            foreach ($rec as $item) {
                if ($item['img'] != "") {
                    if (!file_exists($recommendationspath . $item['imdbid'] . $jpg)) {
                        $ch = curl_init($item['img']);
                        $fp = fopen($recommendationspath . $item['imdbid'] . $jpg, 'wb');
                        $movie->curlFileHandler($ch, $fp);
                    }
                }
            }
            
            // Save trailer images from imdb.
            if ($settings["trailer"] == true) {
                $trailers = $imdbmovie->trailer();
                foreach ($trailers as $trailer) {
                    if ($trailer['videoImageUrl'] != "") {
                        $videoId = $movie->imdbTrailerId($trailer['videoUrl']);
                        if (!file_exists($trailerspath . $videoId . $jpg)) {
                            $ch = curl_init($trailer['videoImageUrl']);
                            $fp = fopen($trailerspath . $videoId . $jpg, 'wb');
                            $movie->curlFileHandler($ch, $fp);
                        }
                    }
                }
            }

            // Save episodes images.
            if ($imdbmovie->movietype() == "TV Series" || $imdbmovie->movietype() == "TV Mini Series") {
                $episodes = $imdbmovie->episode();
                foreach ($episodes as $item) {
                    foreach ($item as $ep) {
                        if ($ep['image_url'] != "") {
                            //if (!file_exists($episodespath . $ep['imdbid'] . $jpg)) {
                                $ch = curl_init($ep['image_url']);
                                $fp = fopen($episodespath . $ep['imdbid'] . $jpg, 'wb');
                                $movie->curlFileHandler($ch, $fp);
                            //}
                        }
                    }
                }
            }
            header("Location: ./?go=edit&id=".$movie->id);
            exit();
        }
    }
}
?>