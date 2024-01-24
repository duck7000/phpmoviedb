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

require_once $loc."/lib/objects/Movie.class.php";

/**
 * MovieDataManager extends DataManager Class Doc Comment
 * 
 * MovieDataManager Class
 * 
 * @category MovieDataManager_Class
 * @package  MovieDataManager
 * @author   Ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */
class MovieDataManager extends DataManager
{
    /**
     * Add a new movie
     * 
     * @param $Movie object new movie.
     * 
     * @return save new movie and return new id.
     */
    function add($Movie)
    {
        // Query Columns.
        $query  = "INSERT INTO `movies` (";
        $query .= "imdbid, ";
        $query .= "name, ";
        $query .= "aka, ";
        $query .= "year, ";
        $query .= "endyear, ";
        $query .= "movietype, ";
        $query .= "top250, ";
        $query .= "duration, ";
        $query .= "runtime, ";
        $query .= "rating, ";
        $query .= "metacritics, ";
        $query .= "barcode, ";
        $query .= "languages, ";
        $query .= "country, ";
        $query .= "genres, ";
        $query .= "director, ";
        $query .= "writer, ";
        $query .= "cast, ";
        $query .= "producer, ";
        $query .= "composer, ";
        $query .= "principalCredits, ";
        $query .= "recommendations, ";
        $query .= "plotoutline, ";
        $query .= "plot, ";
        $query .= "keywords, ";
        $query .= "taglines, ";
        $query .= "certifications, ";
        $query .= "trailer, ";
        $query .= "mainaward, ";
        $query .= "episodes, ";
        $query .= "regioncode, ";
        $query .= "format, ";
        $query .= "subtitles, ";
        $query .= "externalsubtitles, ";
        $query .= "audio1, ";
        $query .= "audio2, ";
        $query .= "video, ";
        $query .= "mediacertifications, ";
        $query .= "mediaEdition, ";
        $query .= "mediacountry, ";
        $query .= "own, ";
        $query .= "notes, ";
        $query .= "extramedia, ";
        $query .= "trivia, ";
        $query .= "quotes, ";
        $query .= "alternateversions, ";
        $query .= "soundtracks, ";
        $query .= "locations, ";
        $query .= "loaned, ";
        $query .= "loandate, ";
        $query .= "loanname";
        $query .= ")";

        // Values
        $query .= " VALUES (";
        $query .= "'".addslashes($Movie->imdbid)."', ";
        $query .= "'".addslashes($Movie->name)."', ";
        $query .= "'".addslashes($Movie->aka)."', ";
        $query .= "'".addslashes($Movie->year)."', ";
        $query .= "'".addslashes($Movie->endyear)."', ";
        $query .= "'".addslashes($Movie->movietype)."', ";
        $query .= "'".addslashes($Movie->top250)."', ";
        $query .= "'".addslashes($Movie->duration)."', ";
        $query .= "'".addslashes($Movie->runtime)."', ";
        $query .= "'".addslashes($Movie->rating)."', ";
        $query .= "'".addslashes($Movie->metacritics)."', ";
        $query .= "'".addslashes($Movie->barcode)."', ";
        $query .= "'".addslashes($Movie->languages)."', ";
        $query .= "'".addslashes($Movie->country)."', ";
        $query .= "'".addslashes($Movie->genres)."', ";
        $query .= "'".addslashes($Movie->director)."', ";
        $query .= "'".addslashes($Movie->writer)."', ";
        $query .= "'".addslashes($Movie->cast)."', ";
        $query .= "'".addslashes($Movie->producer)."', ";
        $query .= "'".addslashes($Movie->composer)."', ";
        $query .= "'".addslashes($Movie->principalCredits)."', ";
        $query .= "'".addslashes($Movie->recommendations)."', ";
        $query .= "'".addslashes($Movie->plotoutline)."', ";
        $query .= "'".addslashes($Movie->plot)."', ";
        $query .= "'".addslashes($Movie->keywords)."', ";
        $query .= "'".addslashes($Movie->taglines)."', ";
        $query .= "'".addslashes($Movie->certifications)."', ";
        $query .= "'".addslashes($Movie->trailer)."', ";
        $query .= "'".addslashes($Movie->mainaward)."', ";
        $query .= "'".addslashes($Movie->episodes)."', ";
        $query .= "'".addslashes($Movie->regioncode)."', ";
        $query .= "'".addslashes($Movie->format)."', ";
        $query .= "'".addslashes($Movie->subtitles)."', ";
        $query .= "'".addslashes($Movie->externalsubtitles)."', ";
        $query .= "'".addslashes($Movie->audio1)."', ";
        $query .= "'".addslashes($Movie->audio2)."', ";
        $query .= "'".addslashes($Movie->video)."', ";
        $query .= "'".addslashes($Movie->mediacertifications)."', ";
        $query .= "'".addslashes($Movie->mediaEdition)."', ";
        $query .= "'".addslashes($Movie->mediacountry)."', ";
        $query .= "'".addslashes($Movie->own)."', ";
        $query .= "'".addslashes($Movie->notes)."', ";
        $query .= "'".addslashes($Movie->extramedia)."', ";
        $query .= "'".addslashes($Movie->trivia)."', ";
        $query .= "'".addslashes($Movie->quotes)."', ";
        $query .= "'".addslashes($Movie->alternateversions)."', ";
        $query .= "'".addslashes($Movie->soundtracks)."', ";
        $query .= "'".addslashes($Movie->locations)."', ";
        $query .= "'".addslashes($Movie->loaned)."', ";
        $query .= "'".addslashes($Movie->loandate)."', ";
        $query .= "'".addslashes($Movie->loanname)."')";

        $this->db->insert($query);
        $Movie->id = $this->db->insertId();

        // Update the movie.
        $Movie->update();

        return $Movie->id;
    }

    /**
     * Remove movie from database incl. photo and cover
     * 
     * @param $Movie     object movie.
     * @param $photopath photo path.
     * @param $coverpath cover path.
     * @param $trailerspath trailer images path.
     * 
     * @return remove movie, delete photo, cover and trailer images.
     */
    function remove($Movie, $photopath = "", $coverpath = "", $trailerspath = "", $mainphotopath = "")
    {
        // Query.
        $query = "DELETE FROM `movies` WHERE id = '".addslashes($Movie->id)."'";
        $this->db->delete($query);

        // Remove photo.
        if ($photopath == "") {
            $Movie->removePhoto();
        } else {
            $Movie->removePhoto($photopath);
        }

        // Remove cover.
        if ($coverpath == "") {
            $Movie->removeCover();
        } else {
            $Movie->removeCover($coverpath);
        }
        
        // Remove trailer images.
        if ($trailerspath !== "") {
            $Movie->removeTrailerImages($trailerspath);
        }
        
        // Remove main photo images.
        if ($mainphotopath !== "") {
            $Movie->removeMainPhotoImages($mainphotopath, $Movie->id);
        }
    }

    /**
     * Search for movies
     * 
     * @param $search   search string.
     * @param $sort     sorting by type.
     * @param $category catagory to show.
     * @param $show     show type.
     * @param $page     amount of pages.
     * @param $amount   amount per page.
     * 
     * @return found movies object.
     */
    function searchMovies($search, $sort = "name", $category = "", $show = "", $page = 0, $amount = -1)
    {
        // List to fill and return.
        $return = array();

        // Split search string into Words.
        $words = preg_split("/\s+/", $search);
        $wordCount = count($words);

        // Query.
        $query = "SELECT SQL_CALC_FOUND_ROWS * FROM `movies` WHERE 1 = 1";
        if ($wordCount > 0 && $words[0] != "") {
            $query .= " AND ((";
            for ($i = 0; $i < $wordCount; $i++) {
                $word = $words[$i];
                $query .= "(";
                $query .= "`name` LIKE '%" . addslashes($word) . "%' OR ";
                $query .= "`aka` LIKE '%" . addslashes($word) . "%' OR ";
                $query .= "`year` LIKE '%" . addslashes($word) . "%' OR ";
                $query .= "`barcode` LIKE '%" . addslashes($word) . "%' OR ";
                $query .= "`country` LIKE '%" . addslashes($word) . "%' OR ";
                $query .= "`languages` LIKE '%" . addslashes($word) . "%' OR ";
                $query .= "`imdbid` LIKE '%" . addslashes($word) . "%'";
                $query .= ")";

                // Next word.
                if ($i + 1 < $wordCount) {
                    $query .= " AND ";
                }
            }
            // Whole search string.
            $wordAsString = implode(' ', $words);
            $query .= ") OR (";
            $query .= "`cast` LIKE '%" . addslashes($wordAsString) . "%' OR ";
            $query .= "`writer` LIKE '%" . addslashes($wordAsString) . "%' OR ";
            $query .= "`producer` LIKE '%" . addslashes($wordAsString) . "%' OR ";
            $query .= "`director` LIKE '%" . addslashes($wordAsString) . "%'";
            $query .= "))";
        }

        // Category / Genres.
        if ($category != "") {
            $query .= " AND `genres` LIKE '%" . addslashes($category) . "%'";
        }

        // Show.
        if ($show != "") {
            $query .= " AND `movietype` LIKE '%" . addslashes($show) . "%'";
        }

        //sort.
        if ($sort && strlen(trim($sort)) > 0) {
            $query .= " ORDER BY " . addslashes($sort) . ", name";
        }

        //Amount.
        if ($amount != -1) {
            $query .= " LIMIT " . addslashes($page) . "," . addslashes($amount);
        }

        if ($rs = $this->db->select($query)) {
            // Create all movies.
            while ($row = $rs->getNextRow()) {
                $Movie = new Movie();
                $app = new Factory();
                $Movie = $app->FillObject($Movie, $row);
                $return[] = $Movie;
            }
        }
        return $return;
    }

    /**
     * Get the amount of rows when doing the search limited
     * 
     * @return found rows, or 0 if nothing found.
     */
    function getFoundRows()
    {
        $query  = "SELECT FOUND_ROWS()";
        if ($rs = $this->db->select($query)) {
            if ($row = $rs->getNextRow()) {
                return $row["FOUND_ROWS()"];
            }
        }
        return 0;
    }

    /**
     * Get a movie by its id
     *
     * @param $id search id.
     * 
     * @return found Movie object or false if nothing found.
     */
    function getMovie($id)
    {
        // Query.
        $query = "SELECT * FROM `movies` WHERE id = '" . addslashes($id) . "'";

        if ($rs = $this->db->select($query)) {
            if ($row = $rs->getNextRow()) {
                $Movie = new Movie();
                $app = new Factory();
                $Movie = $app->FillObject($Movie, $row);
                return $Movie;
            }
        }
        // Nothing found.
        return false;
    }

    /**
     * Get a movie by its IMDbid
     *
     * @param $imdbid search id.
     * 
     * @return found Movie object or false if nothing found.
     */
    function getMovieByImdb($imdbid)
    {
        // Query.
        $query = "SELECT * FROM `movies` WHERE `imdbid` = '" . addslashes($imdbid) . "'";

        if ($rs = $this->db->select($query)) {
            if ($row = $rs->getNextRow()) {
                $Movie = new Movie();
                $app = new Factory();
                $Movie = $app->FillObject($Movie, $row);
                return $Movie;
            }
        }
        // Nothing found.
        return false;
    }

    /**
     * Retrieve options list for multiple html5 datalists
     *
     * @param $field input field name.
     * 
     * @return array options.
     */
    function getOptionlist($field)
    {
        $options = array();

        $query = "SELECT " . $field . " FROM " . $field . " ORDER BY " . $field . "";
        if ($rs = $this->db->select($query)) {
            while ($row = $rs->getNextRow()) {
                $options[] = $row[$field];
            }
        }
        return $options;
    }

    /**
     * Retrieve genres list for html5 datalist
     * 
     * @return array genres.
     */
    function getCategories()
    {
        $categories = array();
        $query = "SELECT `genres` FROM `movies`";
        if ($rs = $this->db->select($query)) {
            while ($row = $rs->getNextRow()) {
                foreach ($row as $temp) {
                    $cat = preg_split("/,|\n/", $temp);
                    foreach ($cat as $category) {
                        $cat = trim($category);
                        if (strlen($cat) > 0) {
                            $categories[$cat] = $category;
                        }
                    }
                }
            }
        }
        $categories = array_keys($categories);
        sort($categories);
        return $categories;
    }

    /**
     * Retrieve movietypes list for html5 datalist
     * 
     * @return array movietypes.
     */
    function getShowList()
    {
        $movieTypes = array();
        $query = "SELECT `movietype` FROM `movies`";
        if ($rs = $this->db->select($query)) {
            while ($row = $rs->getNextRow()) {
                foreach ($row as $temp) {
                    $movieTypes[$temp] = $temp;
                }
            }
        }
        $movieTypes = array_keys($movieTypes);
        sort($movieTypes);
        return $movieTypes;
    }
}
?>
