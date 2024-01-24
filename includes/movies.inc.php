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
 * - 'photopath' is the path to the movie photo
 * - 'coverpath' is the path to the cover of the movie
 * - 'castpath' is the path to the cast photo of the movie
 * - 'recommendationspath' path to the recommendations photo of the movie
 * - 'episodespath' is the path to the episodes photo of tv series
 * - 'movies' are all movies
 * - 'movie' is the requested movie
 * 
 * @category DataManager_Class
 * @package  DataManager.
 * @author   Ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */

require_once $loc."/lib/db/MovieDataManager.class.php";

// Datamanagers.
$moviedm = new MovieDataManager($db, $settings);

// Photo images path and assign var to it.
$photopath = $settings["foto"]["movies"];
$w->assign("photopath", $photopath);

// Cover images path and assign var to it.
$coverpath = $settings["foto"]["covers"];
$w->assign("coverpath", $coverpath);

// Cast images path and assign var to it.
$castpath = $settings["foto"]["cast"];
$w->assign("castpath", $castpath);

// Recommendations images path and assign var to it.
$recommendationspath = $settings["foto"]["recommendations"];
$w->assign("recommendationspath", $recommendationspath);

// Episode images path and assign var to it.
$episodespath = $settings["foto"]["episodes"];
$w->assign("episodespath", $episodespath);

// Trailers images path and assign var to it.
$trailerspath = $settings["foto"]["trailers"];
$w->assign("trailerspath", $trailerspath);

// main photo's images Path.
$mainphotopath = $settings["foto"]["mainphoto"];
$w->assign("mainphotopath", $mainphotopath);

//IMDb Certification and MPAA Rating prefered country and assign var to it.
$mpaaCountry = $settings['mpaa']['country'];
$w->assign("mpaaCountry", $mpaaCountry);

// If loggedin or Guestview show movies.
if ($loggedin || $guestview) {

    // Get options list formats or Statistics and assign var to it.
    $optionlistFormats = $moviedm->getOptionlist('formats');
    $w->assign("optionlistFormats", $optionlistFormats);

    // Get options list regionCode and assign var to it.
    $optionlistRegioncode = $moviedm->getOptionlist('regioncode');
    $w->assign("optionlistRegioncode", $optionlistRegioncode);

    // Get options list audioTypes and assign var to it.
    $optionlistAudiotypes = $moviedm->getOptionlist('audiotypes');
    $w->assign("optionlistAudiotypes", $optionlistAudiotypes);

    // Get options list videoTypes and assign var to it.
    $optionlistVideo = $moviedm->getOptionlist('videotypes');
    $w->assign("optionlistVideo", $optionlistVideo);

    // Get options list subtitle languages and assign var to it.
    $optionlistSubtitles = $moviedm->getOptionlist('language');
    $w->assign("optionlistSubtitles", $optionlistSubtitles);

    // Get options list media mpaa ratings and assign var to it.
    $optionlistMediacertifications = $moviedm->getOptionlist('mediacertifications');
    $w->assign("optionlistMediacertifications", $optionlistMediacertifications);

    // Get options list media Edition and assign var to it.
    $optionlistMediaEdition = $moviedm->getOptionlist('mediaEdition');
    $w->assign("optionlistMediaEdition", $optionlistMediaEdition);

    // Get options list media country of origin and assign var to it.
    $optionlistMediacountry= $moviedm->getOptionlist('mediacountry');
    $w->assign("optionlistMediacountry", $optionlistMediacountry);

    // Get options list genres and assign var to it.
    $categories = $moviedm->getCategories();
    $w->assign("categories", $categories);

    // Get options list showOnly and assign var to it.
    $showOnly = $moviedm->getShowList();
    $w->assign("showOnly", $showOnly);

    // Search for movies.
    if (isset($_GET["search"])) {
        $search = $_GET["search"];

        // Vars
        if (isset($_GET["sort"])) {
            $sort = $_GET["sort"];
        } else {
            $sort = "name";
        }

        if (isset($_GET["category"])) {
            $category = $_GET["category"];
        } else {
            $category = "";
        }

        if (isset($_GET["show"])) {
            $show = $_GET["show"];
        } else {
            $show = "";
        }

        if (isset($_GET["amount"])) {
            $amount = (int)$_GET["amount"];
        } else {
            $amount = -1;
        }

        if (isset($_GET["page"])) {
            $page = (int)$_GET["page"];
        } else {
            $page = 0;
        }

        // Search the database for one more movie.
        $movies = $moviedm->searchMovies($search, $sort, $category, $show, $page * $amount, $amount);

        // If there are no movies found, reload.
        while ($page > 0 && count($movies) == 0) {
            $page--;
            $movies = $moviedm->searchMovies($search, $sort, $category, $show, $page * $amount, $amount);
        }

        $w->assign("movies", $movies);

        // Get the total amount of rows.
        $totalmovies = $moviedm->getFoundRows();
        $w->assign("totalmovies", $totalmovies);
        $pages = ceil($totalmovies / $amount);
        $page++;
        $w->assign("page", $page);

        // Navigation.
        $w->assign("pages", $pages);
        $w->assign("next", $page < $pages);
        $w->assign("previous", $page != 1);

        // The amount of pages shown (N before current and N after current)
        $N = 3;

        // Define the start value of the pages.
        // Start at $page - N (or 1)
        $startAt = $page - $N;
        if ($startAt < 1) {
            $startAt = 1;
        }

        // Stop at $startAt + 2 * $N (or $pages)
        $stopAt = $startAt + 2 * $N;
        if ($stopAt > $pages) {
            $stopAt = $pages;

            // Recalculate $stopAt - 2 * $N.
            $startAt = $stopAt - 2 * $N;
            if ($startAt < 1) {
                $startAt = 1;
            }

        }
        $w->assign("startAt", $startAt);
        $w->assign("stopAt", $stopAt);

        // Statistics.
        $numbertypes = array();
        foreach ($optionlistFormats as $format) {
            $numbertypes[] = array($format, 0);
        }
        $countNumberTypes = count($numbertypes);
        $numberowned = 0;
        $numberwish = 0;
        foreach ($movies as $m) {
            for ($i = 0; $i < $countNumberTypes; $i++) {
                if ($numbertypes[$i][0] == $m->format) {
                    $numbertypes[$i][1] += 1;
                }
            }
            if ($m->own == 2) {
                $numberwish++;
            }
            if ($m->own == 1) {
                $numberowned++;
            }
        }
        $w->assign("numbertypes", $numbertypes);
        $w->assign("numberowned", $numberowned);
        $w->assign("numberwish", $numberwish);
    }

    // Retrieve a movie.
    if (isset($_GET["id"])) {
        $movie = $moviedm->getMovie($_GET["id"]);
        if ($movie) {
            // Show movie.
            $w->assign("movie", $movie);
        } else {
            // Wrong movie, go back.
            unset($movie);
            goBack();
        }
    }

    // Download full cover.
    if (isset($_GET["cover"]) && isset($movie) && file_exists($settings["foto"]["covers"] . $movie->id . ".jpg")) {
        $body = implode('', file($settings["foto"]["covers"] . $movie->id . ".jpg"));

        // Create the correct header.
        $name = preg_replace("/[^\s\.a-zA-Z0-9_-]/", "", $movie->name);
        header("Content-Disposition: attachment; filename=\"" . addslashes($name) . ".jpg\"");
        header("Content-type: application/force-download");
        header("Pragma: cache");
        header("Cache-Control: public, must-revalidate, max-age = 0");
        header("Connection: close");
        header("Expires: " . date("r", time() + 60 * 60));
        header("Last-Modified: ".date("r", time()));
        header("Content-length: " . strlen($body) . "\r\n");
        echo $body;
        exit();
    }

    // Add new movie (if loggedin and editor)
    if (isset($User) && $User->isEditor()) {

        // Search all movies on IMDb with this name.
        if (isset($_GET["imdbsearch"])) {

            // Search term?
            $imdbsearch = trim($_GET["imdbsearch"]);
            $w->assign("imdbsearch", stripslashes($imdbsearch));

            // Not empty? continue.
            if ($imdbsearch != "") {

                // Search IMDb for the movie.
                $imdb = new \Imdb\TitleSearch();
                $results = $imdb->search($imdbsearch);

                // Check if any of these results allready added to our database.
                $temp = array();
                foreach ($results as $result) {
                    $imdbmovie = $moviedm->getMovieByImdb($result['imdbid']);
                    if ($imdbmovie) {
                        $result['known'] = true;
                    } else {
                        $result['known'] = false;
                    }
                    $temp[] = $result;
                }
                $results = $temp;
                $w->assign("results", $results);
            }
        }

        // Find movie information on IMDb
        if (isset($_GET["imdbid"])) {

            // If no name, go back.
            $imdbid = trim($_GET["imdbid"]);
            if ($imdbid == "") {
                goBack();
            }

            // Already added to the database?
            $imdbmovie = $moviedm->getMovieByImdb($imdbid);
            if ($imdbmovie) {
                $w->assign("known", true);
            }

            // Search at IMDB by id.
            $movie = new \Imdb\Title($imdbid);
        }

        // jpg extension var.
        $jpg = ".jpg";

        // Add a movie.
        if (isset($_POST["add"]) && $_POST["add"] == 1) {
            $Movie = new Movie();
            $app = new Factory();
            $Movie = $app->FillObject($Movie, $_POST);
            if (!$Movie->loaned) {
                $Movie->loandate = "1000-01-01";
                $Movie->loanname = "";
            }
            $Movie->id = $moviedm->add($Movie);

            $movie = new \Imdb\Title($Movie->imdbid);

            // Save cast images.
            $cast = $movie->cast();
            foreach ($cast as $item) {
                if ($item['thumb'] != "") {
                    if (!file_exists($castpath . $item['imdb'] . $jpg)) {
                        $ch = curl_init($item['thumb']);
                        $fp = fopen($castpath . $item['imdb'] . $jpg, 'wb');
                        $Movie->curlFileHandler($ch, $fp);
                    }
                }
            }

            // Save recommendations images.
            $rec = $movie->recommendation();
            foreach ($rec as $item) {
                if ($item['img'] != "") {
                    if (!file_exists($recommendationspath . $item['imdbid'] . $jpg)) {
                        $ch = curl_init($item['img']);
                        $fp = fopen($recommendationspath . $item['imdbid'] . $jpg, 'wb');
                        $Movie->curlFileHandler($ch, $fp);
                    }
                }
            }
            
            // Save trailer images from imdb.
            $trailers = $movie->trailer();
            foreach ($trailers as $trailer) {
                if ($trailer['videoImageUrl'] != "") {
                    $videoId = $Movie->imdbTrailerId($trailer['videoUrl']);
                    $ch = curl_init($trailer['videoImageUrl']);
                    $fp = fopen($trailerspath . $videoId . $jpg, 'wb');
                    $Movie->curlFileHandler($ch, $fp);
                }
            }
            
            // Save main photo's images.
            $mainPhoto = $movie->mainphoto();
            foreach ($mainPhoto as $key => $item) {
                if ($item != "") {
                    $ch = curl_init($item);
                    $fp = fopen($mainphotopath . $Movie->id . '_' . $key . $jpg, 'wb');
                    $Movie->curlFileHandler($ch, $fp);
                }
            }

            
            // Save youtube default trailer image if available and trailer from youtube is added
            $Movie->trailerImgYoutube();

            // Save episodes images.
            if ($movie->movietype() == "TV Series" || $movie->movietype() == "TV Mini Series") {
                $episodes = $movie->episode();
                foreach ($episodes as $item) {
                    foreach ($item as $ep) {
                        if ($ep['image_url'] != "") {
                            if (!file_exists($episodespath . $ep['imdbid'] . $jpg)) {
                                $ch = curl_init($ep['image_url']);
                                $fp = fopen($episodespath . $ep['imdbid'] . $jpg, 'wb');
                                $Movie->curlFileHandler($ch, $fp);
                            }
                        }
                    }
                }
            }

            // Save Front Photo if set through file browse or from IMDb.
            $photo = $movie->photo();
            if (isset($_FILES["frontCover"]) && isset($_FILES["frontCover"]["size"]) && $_FILES["frontCover"]["size"] > 0) {
                $errorFrontCover = $Movie->addCover("frontCover", $photopath);
            } elseif (isset($photo) && $photo != '') {
                $file = $photopath . $Movie->id . $jpg;
                $ch = curl_init($photo);
                $fp = fopen($file, 'wb');
                $Movie->curlFileHandler($ch, $fp);
                $errorFrontCover = "";
            } else {
                $errorFrontCover = "";
            }
            if ($errorFrontCover != "") {
                $w->assign("imgFrontError", $errorFrontCover);
            }

            // Save Full movie dvd or blu-ray cover if set through file browse.
            if (isset($_FILES["cover"]) && isset($_FILES["cover"]["size"]) && $_FILES["cover"]["size"] > 0) {
                $errorCover = $Movie->addCover("cover", $coverpath);
            } else {
                $errorCover = "";
            }
            if ($errorCover != "") {
                $w->assign("imgError", $errorCover);
            }
            header("Location: ./?go=add");
            exit();
        }
    }

    // Update movie information (if loggedin and editor)
    if (isset($User) && $User->isEditor()) {

        // Remove a movie.
        if (isset($_GET["delete"])) {
            $movie = $moviedm->getMovie($_GET["delete"]);
            if ($movie) {
                $moviedm->remove($movie, $photopath, $coverpath, $trailerspath, $mainphotopath);
            }
        }

        // Update movie.
        if (isset($movie) && isset($_POST["update"]) && $_POST["update"] == 1 && isset($_GET["go"]) && $_GET["go"] == "edit") {
            $app = new Factory();
            $movie = $app->FillObject($movie, $_POST);
            if (!$movie->loaned) {
                $movie->loandate = "1000-01-01";
                $movie->loanname = "";
            }
            $movie->update();
            
            // Save youtube default trailer image if available and trailer from youtube is added
            $movie->trailerImgYoutube();

            // Update front photo through file upload.
            if (isset($_FILES["frontCoverEdit"]) && isset($_FILES["frontCoverEdit"]["size"]) && $_FILES["frontCoverEdit"]["size"] > 0) {
                $errorFrontCover = $movie->addCover("frontCoverEdit", $photopath);
            } else {
                $errorFrontCover = "";
            }

            // Update full movie dvd or blu-ray cover through file upload.
            if (isset($_FILES["cover"]) && isset($_FILES["cover"]["size"]) && $_FILES["cover"]["size"] > 0) {
                $errorCover = $movie->addCover("cover", $coverpath);
            } else {
                $errorCover = "";
            }
            if ($errorCover == "") {
                $w->assign("imgError", false);
            } else {
                $w->assign("imgError", true);
            }
            header("Location: ./?go=movie&id=" . $movie->id);
            exit();
        }

        // Remove full movie dvd or blu-ray cover.
        if (isset($movie) && isset($_GET["removecover"]) && $_GET["removecover"] == 1 && $movie->hasCover($coverpath)) {
            $movie->removeCover($coverpath);
            // Go back
            goBack();
        }
    }
}
?>