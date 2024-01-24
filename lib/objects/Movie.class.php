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
 * Movie Class Doc Comment
 * 
 * Movie Class
 * 
 * @category Movie_Extends_DataObject
 * @package  Movie
 * @author   Ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */
class Movie extends DataObject
{
    // All variables
    var $id;
    var $imdbid;
    var $name;
    var $aka;
    var $year;
    var $endyear;
    var $movietype;
    var $top250;
    var $duration;
    var $runtime;
    var $rating;
    var $metacritics;
    var $barcode;
    var $languages;
    var $country;
    var $genres;
    var $director;
    var $writer;
    var $cast;
    var $producer;
    var $composer;
    var $principalCredits;
    var $recommendations;
    var $plotoutline;
    var $plot;
    var $keywords;
    var $taglines;
    var $certifications;
    var $trailer;
    var $mainaward;
    var $episodes;
    var $regioncode;
    var $format;
    var $subtitles;
    var $externalsubtitles;
    var $audio1;
    var $audio2;
    var $video;
    var $mediacertifications;
    var $mediaEdition;
    var $mediacountry;
    var $own;
    var $notes;
    var $extramedia;
    var $trivia;
    var $quotes;
    var $alternateversions;
    var $soundtracks;
    var $locations;
    var $loaned;
    var $loandate;
    var $loanname;

    /**
     * Define constructor.
     */
    function __construct()
    {
    }

    /**
     * Create a new movie
     * 
     * @return new movie.
     */
    function Movie()
    {
    }

    /**
     * Update movie
     * 
     * @return Save update to database.
     */
    function update()
    {
        global $settings;
        $host = $settings["db"]["host"]; // Host Name
        $db = $settings["db"]["name"]; // Database Name
        $user = $settings["db"]["user"]; //  Username
        $pwd = $settings["db"]["pass"]; // Password
        $link = mysqli_connect($host, $user, $pwd, $db);

        // MySQL query.
        $query = "UPDATE movies SET ";
        $query .= "imdbid                = '".addslashes($this->imdbid)."', ";
        $query .= "name                  = '".addslashes($this->name)."', ";
        $query .= "aka                   = '".addslashes($this->aka)."', ";
        $query .= "year                  = '".addslashes($this->year)."', ";
        $query .= "endyear               = '".addslashes($this->endyear)."', ";
        $query .= "movietype             = '".addslashes($this->movietype)."', ";
        $query .= "top250                = '".addslashes($this->top250)."', ";
        $query .= "duration              = '".addslashes($this->duration)."', ";
        $query .= "runtime               = '".addslashes($this->runtime)."', ";
        $query .= "rating                = '".addslashes($this->rating)."', ";
        $query .= "metacritics           = '".addslashes($this->metacritics)."', ";
        $query .= "barcode               = '".addslashes($this->barcode)."', ";
        $query .= "languages             = '".addslashes($this->languages)."', ";
        $query .= "country               = '".addslashes($this->country)."', ";
        $query .= "genres                = '".addslashes($this->genres)."', ";
        $query .= "director              = '".addslashes($this->director)."', ";
        $query .= "writer                = '".addslashes($this->writer)."', ";
        $query .= "cast                  = '".addslashes($this->cast)."', ";
        $query .= "producer              = '".addslashes($this->producer)."', ";
        $query .= "composer              = '".addslashes($this->composer)."', ";
        $query .= "principalCredits      = '".addslashes($this->principalCredits)."', ";
        $query .= "recommendations       = '".addslashes($this->recommendations)."', ";
        $query .= "plotoutline           = '".addslashes($this->plotoutline)."', ";
        $query .= "plot                  = '".addslashes($this->plot)."', ";
        $query .= "keywords              = '".addslashes($this->keywords)."', ";
        $query .= "taglines              = '".addslashes($this->taglines)."', ";
        $query .= "certifications        = '".addslashes($this->certifications)."', ";
        $query .= "trailer               = '".addslashes($this->trailer)."', ";
        $query .= "mainaward             = '".addslashes($this->mainaward)."', ";
        $query .= "episodes              = '".addslashes($this->episodes)."', ";
        $query .= "regioncode            = '".addslashes($this->regioncode)."', ";
        $query .= "format                = '".addslashes($this->format)."', ";
        $query .= "subtitles             = '".addslashes($this->subtitles)."', ";
        $query .= "externalsubtitles     = '".addslashes($this->externalsubtitles)."', ";
        $query .= "audio1                = '".addslashes($this->audio1)."', ";
        $query .= "audio2                = '".addslashes($this->audio2)."', ";
        $query .= "video                 = '".addslashes($this->video)."', ";
        $query .= "mediacertifications   = '".addslashes($this->mediacertifications)."', ";
        $query .= "mediaEdition          = '".addslashes($this->mediaEdition)."', ";
        $query .= "mediacountry          = '".addslashes($this->mediacountry)."', ";
        $query .= "own                   = '".addslashes($this->own)."', ";
        $query .= "notes                 = '".addslashes($this->notes)."', ";
        $query .= "extramedia            = '".addslashes($this->extramedia)."', ";
        $query .= "trivia                = '".addslashes($this->trivia)."', ";
        $query .= "quotes                = '".addslashes($this->quotes)."', ";
        $query .= "alternateversions     = '".addslashes($this->alternateversions)."', ";
        $query .= "soundtracks           = '".addslashes($this->soundtracks)."', ";
        $query .= "locations             = '".addslashes($this->locations)."', ";
        $query .= "loaned                = '".addslashes($this->loaned)."', ";
        $query .= "loandate              = '".addslashes($this->loandate)."', ";
        $query .= "loanname              = '".addslashes($this->loanname)."' ";
        $query .= "WHERE id              = '".addslashes($this->id)."'";

        mysqli_query($link, $query) or die(mysqli_error($link));
        mysqli_close($link);
    }

    /**
     * Get youtube trailer id
     * 
     * @return trailer id.
     */
    function getYouTubeTrailerId($url = "")
    {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches)) {
            return trim($matches[1]);
        }
        return false;
    }

    /**
     * Get ImdB trailer id in Update, add or movie page
     * 
     * @return trailer id.
     */
    function imdbTrailerId($url)
    {
        return preg_replace('!^.*vi(\d+).*$!ims', '$1', $url);
    }

    /**
     * Create genres list
     * 
     * @param string $field input string.
     * 
     * @return Genre list separated by comma.
     */
    function listGenre($field)
    {
        $temp = trim($this->{$field});
        $temp = str_replace("\n", "<br />", $temp);
        $genre = explode('<br />', $temp);
        $n = array_slice($genre, 0, 1);
        $t = join(', ', $n);
        return rtrim($t, ",");
    }

    /**
     * Trim and strip linebreaks
     * 
     * @param string $field input string.
     * 
     * @return Stripped string.
     */
    function getList($field)
    {
        $temp = trim($this->{$field});
        $temp = str_replace("\r", "", $temp);
        $temp = str_replace("\n", ', ', $temp);
        return $temp;
    }

    /**
     * Trim and strip linebreaks
     * 
     * @param string $field input string.
     * 
     * @return array country.
     */
    function getListCL($field)
    {
        $temp = str_replace("\r", "", trim($this->{$field}));
        $cl = explode("\n", $temp);
        return $cl;
    }

    /**
     * Trim and replace linebreaks with <br />
     * 
     * @param string $field input string.
     * 
     * @return Stripped string.
     */
    function getListBr($field)
    {
        $temp = trim($this->{$field});
        $temp = str_replace("\r", "", $temp);
        $temp = str_replace("\n", "<br>", $temp);
        return rtrim($temp, ",");
    }

    /**
     * Trim and strip linebreaks
     * 
     * @param string $field input string.
     * 
     * @return Stripped string.
     */
    function getListGenres()
    {
        $genres = trim($this->genres);
        $temp = str_replace("\r", "", $genres);
        $genresSplit = explode("\n", $temp);
        foreach ($genresSplit as $key => $genre) {
            echo '<span class="genreTop">' . $genre . '</span>';
            if ($key == 4) {
                break;
            }
        }
    }

    /**
     * create input checked mark
     * 
     * @return checked if 1 or nothing.
     */
    function ownYes()
    {
        if ($this->own == 1) {
            echo ' checked';
        }
    }

    /**
     * create input checked mark
     * 
     * @return checked if 0 or nothing.
     */
    function ownNo()
    {
        if ($this->own == 0) {
            echo ' checked';
        }
    }

    /**
     * create input checked mark
     * 
     * @return checked if 2 or nothing.
     */
    function ownWish()
    {
        if ($this->own == 2) {
            echo ' checked';
        }
    }

    /**
     * create string classname
     * 
     * @return string classname
     */
    function loanDisplay()
    {
        if ($this->loaned == 1) {
            echo ' class="loandateInit"';
        } else {
            echo ' class="loandateNone"';
        }
    }

    /**
     * create input checked mark
     * 
     * @return checked if 1 or nothing.
     */
    function loanYes()
    {
        if ($this->loaned == 1) {
            echo ' checked';
        }
    }

    /**
     * create input checked mark
     * 
     * @return checked if 0 or nothing.
     */
    function loanNo()
    {
        if ($this->loaned == 0) {
            echo ' checked';
        }
    }

    /**
     * create loandatevalue
     * 
     * @return string loandate value.
     */
    function loanDateValue()
    {
        if ($this->loandate != "1000-01-01") {
            $val = $this->loandate;
        } else {
            $val = "YYYY-MM-DD";
        }
        return $val;
    }

    /**
     * get color based on format value
     * 
     * @return echo with right color.
     */
    function formatColor($field)
    {
        global $settings;
        $template_dir = $settings["template_include_dir"];
        $format = $this->$field;
        if ($format == "BLU-RAY") {
            $img = 'bluray.png';
        } elseif ($format == "DVD") {
            $img = 'dvd.png';
        } elseif ($format == "MKV") {
            $classname = 'class="mkv"';
        } else {
            $classname = 'class="formatDefault"';
        }

        if (isset($img)) {
            echo '<img src="' . $template_dir . 'images/icons/' . $img . '"
                       alt=""
                       title="' . $format . '">';
        } else {
            echo '<span ' . $classname . 'title="' . $format . '">' . $format . '</span>';
        }
    }

    /**
     * get color based on format value
     * 
     * @return echo with right color.
     */
    function formatColorIcon($field)
    {
        global $settings;
        $template_dir = $settings["template_include_dir"];
        $format = $this->$field;
        if ($format == "BLU-RAY") {
            $img = 'bluray_icon.png';
            $classnameColor = 'class="blurayIcon"';
        } elseif ($format == "DVD") {
            $img = 'dvd_icon.png';
            $classnameColor = 'class="dvdIcon"';
        } elseif ($format == "MKV") {
            $classnameColor = 'class="mkvIcon"';
        } else {
            $classnameColor = 'class="formatDefaultIcon"';
        }
        
        echo '<div id="formatPosterDiv" ' . $classnameColor . '>';
            if (isset($img)) {
                echo '<img src="' . $template_dir . 'images/icons/' . $img . '"
                           alt=""
                           title="' . $format . '">';
            } else {
                echo '<span title="' . $format . '">' . $format . '</span>';
            }
        echo '</div>';
    }

    /**
     * Create search anchor
     * 
     * @return html anchor
     */
    function searchLink()
    {
        global $settings;
        $template_dir = $settings["template_include_dir"];
        $imgSrc = $template_dir . 'images/search-img.png';
        $name = urlencode($this->name);
        $year = urlencode($this->year);
        $alt = 'Search: Google Images';
            echo '<a href="https://www.google.com/search?q=' . $name . '+' . $year . '+cover&tbm=isch"
                     target="_blank">';
                echo '<img src="' . $imgSrc . '"
                           alt="' . $alt . '"
                           title="' . $alt . '">';
            echo '</a>';
    }
    
        /**
     * Create search anchor Youtube
     * 
     * @return html anchor
     */
    function searchLinkYoutube()
    {
        global $settings;
        $template_dir = $settings["template_include_dir"];
        $imgSrc = $template_dir . 'images/youtube.png';
        $name = urlencode($this->name);
        $year = urlencode($this->year);
        $alt = 'Search: Youtube Video';
        echo '<a href="https://www.youtube.com/results?search_query=' . $name . '+' . $year . '+trailer"
                    target="_blank">';
            echo '<img src="' . $imgSrc . '"
                       alt="' . $alt . '"
                       title="' . $alt . '">';
        echo '</a>';
    }

    /**
     * Create control buttons
     * 
     * @return html button
     */
    function controlButton($control)
    {
        global $settings;
        $template_dir = $settings["template_include_dir"];
        $coverpath = $settings["foto"]["covers"];
        $imgSrc = $template_dir . 'images/icons/';
        if ($control == "download") {
            $onclick = 'location.href=\'./&#63;go=movie&amp;id=' . $this->id . '&amp;cover=download\'';
            $img = 'download.png';
            $alt = 'Download full size Cover';
            echo '<button onclick="' . $onclick . '" type="button" class="controlAnchor">';
                echo '<img src="' . $imgSrc . $img . '"
                       alt="' . $alt . '"
                       title="' . $alt . '">';
            echo '</button>';
        } elseif ($control == "imdb") {
            $onclick = 'window.open(\'https://www.imdb.com/title/tt' . $this->imdbid . '/\')';
            $img = 'imdb.png';
            $alt = 'Visit IMDb page of this movie';
            echo '<button onclick="' . $onclick . '" type="button" class="controlAnchor">';
                echo '<img src="' . $imgSrc . $img . '"
                       alt="' . $alt . '"
                       title="' . $alt . '">';
            echo '</button>';
        } elseif ($control == "edit") {
            $onclick = 'location.href=\'./&#63;go=edit&amp;id=' . $this->id . '\'';
            $img = 'edit.png';
            $alt = 'Edit Movie';
            echo '<button onclick="' . $onclick . '" type="button" class="controlAnchor">';
                echo '<img src="' . $imgSrc . $img . '"
                       alt="' . $alt . '"
                       title="' . $alt . '">';
            echo '</button>';
        } elseif ($control == "delete") {
            $onclick = 'javascript:deleteMovie(\'' . $this->id . '\')';
            $img = 'delete.png';
            $alt = 'Delete Movie';
            echo '<button onclick="' . $onclick . '" type="button" class="controlAnchor">';
                echo '<img src="' . $imgSrc . $img . '"
                       alt="' . $alt . '"
                       title="' . $alt . '">';
            echo '</button>';
        } elseif ($control == "back") {
            $onclick = 'location.href=\'./\'';
            $img = 'back.png';
            $alt = 'Go Back';
            echo '<button onclick="' . $onclick . '" type="button" class="controlAnchor">';
                echo '<img src="' . $imgSrc . $img . '"
                       alt="' . $alt . '"
                       title="' . $alt . '">';
            echo '</button>';
        } elseif ($control == "editBack") {
            $onclick = 'location.href=\'./&#63;go=movie&amp;id=' . $this->id . '\'';
            $img = 'back.png';
            $alt = 'Go Back';
            echo '<button onclick="' . $onclick . '" type="button" class="controlAnchor">';
                echo '<img src="' . $imgSrc . $img . '"
                       alt="' . $alt . '"
                       title="' . $alt . '">';
            echo '</button>';
        } elseif ($control == "update") {
            if (!empty($this->imdbid)) {
                $onclick = 'location.href=\'./&#63;go=update&amp;id=' . $this->id . '\';
                        loader(document.getElementById(\'loaderEdit\'));';
                $img = 'update.png';
                $alt = 'Update This Movie';
                echo '<button onclick="' . $onclick . '" type="button" class="controlAnchor">';
                    echo '<img src="' . $imgSrc . $img . '"
                        alt="' . $alt . '"
                        title="' . $alt . '">';
                echo '</button>';
            }
        }
    }

    /**
     * Create output loaned name and date
     * 
     * @return html loaned name and date
     */
    function loanedList()
    {
        if ($this->loanname != "") {
            echo '<div class="moviepage_td">Name:</div>';
            echo '<div class="moviepage_td2">' . $this->loanname . '</div>';
        }
        if ($this->loandate != "1000-01-01") {
            echo '<div class="moviepage_td">Date:</div>';
            echo '<div class="moviepage_td2">' . $this->loandate . '</div>';
        }
    }

    /**
     * Create cover img output
     * 
     * @return html cover image.
     */
    function coverImgList()
    {
        global $settings;
        $template_dir = $settings["template_include_dir"];
        $coverpath = $settings["foto"]["covers"];
        if ($this->hasCover($coverpath)) {
            echo '<a href="#img2">';
                echo '<img id="coverImg1"
                           src="' . $coverpath . 'tn_'. $this->id . '.jpg"
                           alt="Full Cover-' . $this->name . '"
                           title="See Fullscreen Cover-' . $this->name . '">';
            echo '</a>';

            echo '<a href="#_" class="lightbox" id="img2">';
                echo '<img src="' . $coverpath . $this->id . '.jpg"
                           alt="Full Cover-' . $this->name . '_big"
                           title="See Fullscreen Cover-' . $this->name . '">';
            echo '</a>';
        } else {
            echo '<img id="coverImg2" src="' . $template_dir . 'images/noBackPoster.jpg"
                       alt="No back cover available">';
        }
    }

    /**
     * Check if endyear exists
     * 
     * @param int $endyear input string.
     * 
     * @return endyear if exists or empty.
     */
    function endYear()
    {
        if ($this->endyear === $this->year) {
            $endYear = '';
        } elseif ($this->endyear === '') {
            $endYear = '';
        } else {
            $endYear= "&#8211;" . $this->endyear;
        }
        return $endYear;
    }

    /**
     * List page runtime
     * 
     * @return runtime minutes
     */
    function listPageRuntime()
    {
        $runtimes = $this->runtimes();
        return $runtimes[0]['time'];
    }

    /**
     * Process topRuntime data
     * 
     * @param string $topRuntime input string.
     * 
     * @return runtime in hours and minutes
     */
    function topDuration($topRuntime)
    {
        if ($topRuntime >= 60) {
            $hours = floor($topRuntime / 60);
            $min = $topRuntime - $hours * 60;
            if ($min == 0) {
                return $hours . "h ";
            } else {
                return $hours . "h " . $min . "min";
            }
        } else {
            return $topRuntime . "min";
        }
    }

    /**
     * Process movietype data
     * 
     * @param string $movietype input string.
     * 
     * @return movietype
     */
    function type()
    {
        $movietype = $this->movietype;
        if ($movietype != "") {
            return $movietype;
        } else {
            return false;
        }
    }

    /**
     * Proces runtimes
     * 
     * @return array runtimes
     */
    function runtimes()
    {
        $temp = str_replace("\r", "", trim($this->duration));
        $run = explode("\n~\n", $temp);
        $runtimes = array();
        foreach ($run as $item) {
            if (strpos($item, "\n") !== false) {
                $runtime = explode("\n", $item);
                $time = $runtime[0];
                $desc = $runtime[1];
            } else {
                $time = $item;
                $desc = "";
            }
            $runtimes[] = array('time'=>$time, 'desc'=>$desc);
        }
        return $runtimes;
    }

    /**
     * create subText Title Bar string
     * 
     * @return html subText
     */
    function subTextTitlebar()
    {
        global $settings;
        $template_dir = $settings["template_include_dir"];
        $photopath = $settings["foto"]["movies"];
        $runtimes = $this->runtimes();
        $movietype = $this->type();
        $sep = '<span class="separator">|</span>';
        $output = '';
        if ($movietype != false) {
            $output = '<span>' . $movietype . '</span>';
        }
        if ($this->year != "") {
            $output .= $sep . '<span><strong>' . $this->year . $this->endYear() . '</strong></span>';
        }
        if ($runtimes[0]['time'] > 0) {
            $output .= $sep . '<span>' . $this->topDuration($runtimes[0]['time']). '</span>';
        }
        return $output;
    }

    /**
     * create moviepage photo img
     * 
     * @return html moviepage photo
     */
    function moviepagePhoto()
    {
        global $settings;
        $template_dir = $settings["template_include_dir"];
        $photopath = $settings["foto"]["movies"];
        if ($this->hasPhoto($photopath)) {
            echo '<img src="' . $photopath . $this->id . '.jpg"
                       alt="' . $this->name . ' (' . $this->year . ')"
                       title="' . $this->name . ' (' . $this->year . ')">';
        } else {
            echo '<img src="' . $template_dir . 'images/noFrontPoster.jpg"
                       alt="No Front Photo Available"
                       title="No Front Photo Available">';
        }
    }

    /**
     * Create output principalCredits list
     * 
     * @return html principalCredits list: Director, Writer, Creator or Stars.
     */
    function principalCreditsList()
    {
        $temp = str_replace("\r", "", trim($this->principalCredits));
        $column = explode("\n~\n", $temp);
        foreach ($column as $key => $item) {
            $n = explode("\n", $item);
            $category = trim(htmlspecialchars($n[0]));
            if ($category == "Writer") {
                if ($this->movietype == "TV Series" || $this->movietype == "TV Mini Series") {
                    $category = 'Creator';
                }
            }
            echo '<div class="principalCredits">';
                if (count($n) - 1 > 1) {
                    if ($category != "Archive Sound") {
                        $category = $category . 's';
                    }
                }
                echo '<h4>' . $category . '</h4>';
                foreach ($n as $keyName => $part) {
                    if ($keyName > 0) {
                        $nameParts = explode(",", $part);
                        echo '<span>';
                            if (isset($nameParts[1])) {
                                echo '<a href="https://www.imdb.com/name/nm' . $nameParts[1] . '/"
                                         target="_blank">' . $nameParts[0] . '</a>';
                            } else {
                                echo $nameParts[0];
                            }
                        echo '</span>';
                        if ($keyName < count($n) - 1) {
                            echo '<span class="principalCreditsSpan"></span>';
                        }
                    }
                }
            echo '</div>';
        }
    }

    /**
     * create html metacritics
     * 
     * @return html metacritics
     */
    function metacriticsList()
    {
        $score = $this->metacritics;
        if ($score <= 39) {
            $classname = 'metascoreRed';
        } elseif ($score >= 61) {
            $classname = 'metascoreGreen';
        } else {
            $classname = 'metascoreYellow';
        }
        echo '<div id="metacriticsDiv2" class="' . $classname . '">';
            echo '<span>' . $score . '</span>';
        echo '</div>';
        echo '<div id="metaScore">';
            echo '<a href="https://www.imdb.com/title/tt' . $this->imdbid . '/criticreviews"
                     target="blank_">Metascore</a>';
        echo '</div>';
    }

    /**
     * create top250 if available
     * 
     * @return html top250
     */
    function top250()
    {
        $movietype = $this->movietype;
        if ($movietype == "TV Series" || $movietype == "TV Mini Series") {
            $movietype = "TV";
        }
        $top250 = $this->top250;
        if ($top250 != 0) {
            echo '<span id="yellowTop250"><a href="https://www.imdb.com/chart/toptv"
                        target="_blank">';
                echo 'Top Rated ' . $movietype . ' #' . $top250;
            echo '</a></span>';
        } else {
            echo '<span id="yellowTop250Blank"></span>';
        }
    }

    /**
     * create main Awards if available
     * 
     * @return html Awards
     */
    function mainAward()
    {
        if (!empty($this->mainaward)) {
            $mainAwards = explode("\n", $this->mainaward);
            $s = '';
            if (isset($mainAwards[2]) && trim($mainAwards[2]) != 0) {
                if ($mainAwards[2] > 1) {
                    $s = 's';
                }
                echo '<span id="awardSpan">';
                    echo '<span>Won ' . $mainAwards[2] . ' ' . trim($mainAwards[0]) . $s . '</span>';
                echo '</span>';
            } elseif (isset($mainAwards[1]) && trim($mainAwards[1]) != 0) {
                if ($mainAwards[1] > 1) {
                    $s = 's';
                }
                echo '<span id="awardSpan">';
                    echo '<span>Nominated for ' . $mainAwards[1] . ' ' . trim($mainAwards[0]) . $s . '</span>';
                echo '</span>';
            }
        }
    }
    
        /**
     * create main photo images
     * 
     * @return html
     */
    function mainPhoto()
    {
        global $settings;
        $mainPhotoImagePath = $settings["foto"]["mainphoto"];
        $imageUrls = array(
            $mainPhotoImagePath . $this->id . '_0.jpg',
            $mainPhotoImagePath . $this->id . '_1.jpg',
            $mainPhotoImagePath . $this->id . '_2.jpg',
            $mainPhotoImagePath . $this->id . '_3.jpg',
            $mainPhotoImagePath . $this->id . '_4.jpg',
            $mainPhotoImagePath . $this->id . '_5.jpg'
        );
        foreach ($imageUrls as $photoUrl) {
            if (file_exists($photoUrl)) {
                echo '<div class="mainphotoDiv">';
                    echo '<img src="' . $photoUrl . '"
                               alt="Photo image">';
                echo '</div>';
            }
        }
    }

        /**
     * check if there is at least 1 photo
     * 
     * @return true
     */
    function mainPhotoCheck()
    {
        global $settings;
        $mainPhotoImagePath = $settings["foto"]["mainphoto"];
        $img1 = $mainPhotoImagePath . $this->id . '_0.jpg';
        if (file_exists($img1)) {
            return true;
        }
    }

    /**
     * create trailer image html and player
     * 
     * @return html trailer image and iframe through javascript
     */
    function trailerImg()
    {
        global $settings;
        $trailerImagePath = $settings["foto"]["trailers"];
        $urls = explode("\n", $this->trailer);
        if (isset($urls[0]) && !empty($urls[0])) {
            foreach ($urls as $url) {
                if (stripos($url, "imdb") !== false) {
                    $trailerId = $this->imdbTrailerId($url);
                    $domain = 'imdb';
                    if ($this->hasTrailerCover($trailerImagePath, $trailerId)) {
                        $src = $trailerImagePath . $trailerId . ".jpg";
                    } else {
                        $src = $trailerImagePath . 'imdb.noimage.png';
                    }
                } elseif (stripos($url, "youtu") !== false) {
                    $trailerId = $this->getYouTubeTrailerId($url);
                    $domain = 'youtube';
                    if ($this->hasTrailerCover($trailerImagePath, $trailerId, ".jpg")) {
                        $src = $trailerImagePath . $trailerId . '.jpg';
                    } else {
                        $src = $trailerImagePath . 'youtube.noimage.png';
                    }
                } else {
                    $trailerId = '';
                    $domain = '';
                    // not supported link
                }
                if (!empty($trailerId) && !empty($domain)) {
                    echo '<div class="trailerFull" onclick="injectIframe(\'' . $trailerId . '\', \'' . $domain . '\')">';
                        echo '<img class="trailerImg"
                                   src="' . $src . '"
                                   alt="Trailer background image">';
                    echo '</div>';
                } else {
                    echo '<div class="trailerFull">';
                        echo '<div class="invalidId">Invalid Or Not Supported!</div>';
                    echo '</div>';
                }
            }
        }
    }

    /**
     * Save youtube default background play image if available
     * 
     * @return nothing, save image if available
     */
    function trailerImgYoutube()
    {
        global $settings;
        $trailerImagePath = $settings["foto"]["trailers"];
        $urls = explode("\n", $this->trailer);
        foreach ($urls as $url) {
            if (stripos($url, "youtu") !== false) {
                $trailerId = $this->getYouTubeTrailerId($url);
                $imgJpg = 'https://img.youtube.com/vi/' . $trailerId . '/default.jpg';
                if ($imgJpg != "" && file_get_contents($imgJpg) !== false) {
                    $dest = imagecreatefromstring(file_get_contents($imgJpg));
                    $newImage = imagescale($dest, 200, 150);
                    $src = $trailerImagePath . "youtube.overlay.png";
                    $overlay = imagecreatefrompng($src);
                    imagecopy($newImage, $overlay, 0, 0, 0, 0, 200, 150);
                    $file = $trailerImagePath . $trailerId . '.jpg';
                    imagejpeg($newImage, $file);
                }
            }
        }
    }

    /**
     * Create html episodes
     * 
     * @return html Seasons and episodes.
     */
    function episodesList()
    {
        global $settings;
        $template_dir = $settings["template_include_dir"];
        $noEpImg = $template_dir . 'images/icons/noEpisodesImage.jpg';
        $epImg = $settings["foto"]["episodes"];
        $link = '<a href="https://www.imdb.com/title/tt';
        $seasonData = $this->episodes();
        foreach ($seasonData as $seasonIndex => $seasonsEpisodes) {
            $checked = '';
            if ($seasonIndex == 1) {
                $checked = ' checked';
            }
            if ($seasonIndex == -1) {
                $seasonIndex = 'Unknown';
            }
            echo '<input id="tabfree' . $seasonIndex . '" type="radio" name="mytabs"' . $checked . '>';
            echo '<label for="tabfree' . $seasonIndex . '">' . $seasonIndex . '</label>';
            echo '<div class="tab">';
                echo '<div class="episodesList">';
                    foreach ($seasonsEpisodes as $ep) {
                        echo '<div class="episodeColorRow">';
                            echo '<div class="episodeImg">';
                                if ($this->hasCastCover($epImg, $ep['imdb'])) {
                                    $epiImg = $epImg . $ep['imdb'] . '.jpg';
                                    $classname = ' class="episodeImgShadow" ';
                                } else {
                                    $epiImg = $noEpImg;
                                    $classname = ' ';
                                }
                                echo $link . $ep['imdb'] . '/" target="_blank">';
                                    echo '<img' . $classname . 'src="' . $epiImg . '"
                                                                alt="' . $ep['title'] . '"
                                                                title=""
                                                                loading="lazy">';
                                echo '</a>';
                            echo '</div>';
                            if ($seasonIndex != "Unknown") {
                                $seEp = 'S' . $seasonIndex;
                            } else {
                                $seEp = $seasonIndex;
                            }
                            if ($ep['episode'] != -1) {
                                $seEp .= '.E' . $ep['episode'] . '&nbsp;&#8231;&nbsp;';
                            } else {
                                $seEp .= '.Unknown' . '&nbsp;&#8231;&nbsp;';
                            }
                            echo '<div class="titleDetails">';
                                echo '<span class="link">';
                                    echo $link . $ep['imdb'] . '/" target="_blank">' . $seEp . $ep['title'] . '</a>';
                                echo '</span>';
                                echo '<div class="airdate">' . $ep['airdate'] . '</div>';
                                echo '<div class="plot">' . $ep['plot'] . '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        }
    }

    /**
     * Create array with all seasons and episodes of tv series
     * 
     * @return array Seasons and episodes.
     */
    function episodes()
    {
        $temp = str_replace("\r", "", trim($this->episodes));
        $column = explode("\n~\n", $temp);
        $seasonData = array();
        foreach ($column as $data) {
            $seasonPart = explode("#", $data, 2);
            $season = trim($seasonPart[0]);
            $episodes = explode("@", $seasonPart[1]);
            $epData = array();
            foreach ($episodes as $episode) {
                $ep = array();
                $splitEp = explode("\n", trim($episode));
                $imdb = '';
                $title = '';
                $airdate = '';
                $plot = '';
                $episode = $splitEp[0];
                if (isset($splitEp[1]) && $splitEp[1] != '') {
                    $imdb = $splitEp[1];
                }
                if (isset($splitEp[2]) && $splitEp[2] != '') {
                    $title = $splitEp[2];
                }
                if (isset($splitEp[3]) && $splitEp[3] != '') {
                    $airdate = $splitEp[3];
                }
                if (isset($splitEp[4]) && $splitEp[4] != '') {
                    $plot = $splitEp[4];
                }
                $ep = array(
                    'episode' => $episode,
                    'imdb' => $imdb,
                    'title' => $title,
                    'airdate' => $airdate,
                    'plot' => $plot
                );
                $epData[] = $ep;
            }
            $seasonData[$season] = $epData;
        }
        return $seasonData;
    }

    /**
     * get regioncode color
     * 
     * @param string $field input regioncode string.
     * 
     * @return bold tag regioncode in color
     */
    function regionColor($regioncode, $id)
    {
        $codes = array("2", "ALL", "NONE", "FREE", "B", "A B", "B C", "A B C");
        if (in_array($regioncode, $codes)) {
            $idName = "Div2Span2";
        } else {
            $idName = "Div2Span3";
        }
        return '<b id="' . $id . $idName . '">' . $regioncode . '</b>';
    }

    /**
     * process own not own and whislist
     * 
     * @param string $own input value own.
     * 
     * @return string yes, no or wishlist
     */
    function ownList($own)
    {
        if ($own == 1) {
            $out = 'Yes';
        } elseif ($own == 2) {
            $out = 'Wishlist';
        } else {
            $out = 'No';
        }
        return $out;
    }

    /**
     * Create html output with all media fields
     * 
     * @return html media.
     */
    function media()
    {
        $mediaList = array(
          'Own' => $this->own,
          'Format' => $this->format,
          'Runtime' => $this->runtime,
          'Region Code' => $this->regioncode,
          'Media Subtitle' => $this->subtitles,
          'External Subtitle' => $this->externalsubtitles,
          'Video' => $this->video,
          'Audio Track 1' => $this->audio1,
          'Audio Track 2' => $this->audio2,
          'Barcode' => $this->barcode,
          'Country of Origin' => $this->mediacountry,
          'Certification' => $this->mediacertifications,
          'Edition' => $this->mediaEdition);
        foreach ($mediaList as $name => $value) {
            $value = trim(htmlspecialchars($value));
            if ($value != "" && $value != "0") {
                echo '<div class="moviepage_td moviepage_media">' . $name;
                    echo '<span class="moviepage_td moviepage_media_span">';
                        if ($name == "Runtime" && $value != "0") {
                            echo '<span>' . $this->topDuration($value) . '</span>';
                        } elseif ($name == "Region Code" && $value != "") {
                            echo $this->regionColor($value, "media");
                        } elseif ($name == "Own" && $value != "") {
                            echo $this->ownList($value);
                        } elseif ($value != "") {
                            echo $value;
                        }
                    echo '</span>';
                echo '</div>';
            }
        }
    }

    /**
     * Create html output with all extra media fields
     * 
     * @param string $this->extramedia input string.
     * 
     * @return html extra media.
     */
    function extraMedia()
    {
        $temp = trim($this->extramedia);
        $temp = str_replace("\r", "", $temp);
        $column = explode("\n", $temp);
        foreach ($column as $key=>$item) {
            $item = explode(":", $item, 2);
            $name = trim($item[0]);
            if (isset($item[1]) && $item[1] != "") {
                $value = trim(htmlspecialchars($item[1]));
            } else {
                $value = "";
            }
            if ($value != "" && $value != "0") {
                echo '<div class="moviepage_td moviepage_media">' . $name;
                    echo '<span class="moviepage_td moviepage_media_span">';
                        if ($key == 2 && $value != "0") {
                            echo '<span>' . $this->topDuration($value) . '</span>';
                        } elseif ($key == 3 && $value != "") {
                            echo $this->regionColor($value, "media2");
                        } elseif ($value != "") {
                            echo $value;
                        }
                    echo '</span>';
                echo '</div>';
            }
        }
    }

    /**
     * Create director, writer, cast, producer and composer output
     * 
     * @return html
     */
    function castCrewList($field, $flag = "list", $limit = 10)
    {
        global $settings;
        $castPath = $settings["foto"]["cast"];
        $template_dir = $settings["template_include_dir"];
        $noCastImg = $template_dir . 'images/icons/noCastImage.png';
        $temp = str_replace("\r", "", $this->$field);
        $column = explode("\n~\n", $temp);
        if ($flag == "list") {
            $link = '<a href="https://www.imdb.com/name/nm';
            foreach ($column as $key => $value) {
                if ($key < $limit) {
                    $classname = $field . 'DivInit';
                } else {
                    $classname = $field . 'DivNone';
                }
                $split = explode("\n", $value);
                echo '<div class="' . $classname . '">';
                    if (isset($split[1]) && $split[1] != "") {
                        if ($field == "cast") {
                            echo '<div class="castImg">';
                            if ($this->hasCastCover($castPath, $split[1])) {
                                $castImg = $castPath . $split[1] . '.jpg';
                            } else {
                                $castImg = $noCastImg;
                            }
                            echo $link . $split[1] . '/" target="_blank">';
                                echo '<img src="' . $castImg . '"
                                           alt="' . $split[0] . '"
                                           title=""
                                           loading="lazy">';
                            echo '</a>';
                            echo '</div>';
                        }
                        echo '<div class="nameSpan">';
                            echo $link . $split[1] . '/" target="_blank">' . $split[0] . '</a>';
                        echo '</div>';
                        if (isset($split[2]) && $split[2] != "") {
                            echo '<div class="sepSpan">...</div>';
                            echo '<div class="roleSpan">'. $split[2] . '</div>';
                        }
                    } else {
                        if ($field == "cast") {
                            echo '<div class="castImg">';
                                echo '<img src="' . $noCastImg . '"
                                           alt="' . $split[0] . '"
                                           title="">';
                            echo '</div>';
                        }
                        echo '<div class="nameSpan">' . $split[0] . '</div>';
                        if (isset($split[2]) && $split[2] != "") {
                            echo '<div class="sepSpan">...</div>';
                            echo '<div class="roleSpan">'. $split[2] . '</div>';
                        }
                    }
                echo '</div>';
            }
        }
        if ($flag == "more" && count($column) > $limit) {
            return true;
        }
    }

    /**
     * Count how many slides are needed
     * 
     * @return Slides count.
     */
    function recSlides()
    {
        $rec = $this->recArray();
        $slideCount = ceil(count($rec) / 4);
        return $slideCount;
    }

    /**
     * Create output recommendation
     * 
     * @param string $flag toggle.
     * 
     * @return html recommendation.
     */
    function recList($flag = "list")
    {
        $rec = $this->recArray();
        global $settings;
        $recPath = $settings["foto"]["recommendations"];
        $template_dir = $settings["template_include_dir"];
        $noImg = $template_dir . 'images/icons/noRecImage.png';
        $ratingStar = $template_dir . 'images/full_star.png';
        $darkStar = $template_dir . 'images/dark_star.png';
        $link = '<a href="https://www.imdb.com/title/tt';
        foreach ($rec as $value) {
            echo '<div class="carousel__item carousel__item--mobile-in-1 carousel__item--tablet-in-2 carousel__item--desktop-in-4">';
                echo '<div class="rec-img">';
                    if ($this->hasRecCover($recPath, $value['imdb'])) {
                        $img_src = $recPath . $value['imdb'] . '.jpg';
                    } else {
                        $img_src = $noImg;
                    }
                    echo '<div class="rec-image">';
                        echo $link . $value['imdb'] . '/" target="_blank">';
                            echo '<img src="' . $img_src . '"
                                       alt="' . $value['title'] . '"
                                       title="">';
                        echo '</a>';
                    echo '</div>';
                    echo '<div class="rec-rating">';
                        if ($value['rating'] != -1) {
                            $star = $ratingStar;
                        } else {
                            $star = $darkStar;
                        }
                        echo '<img src="' . $star . '"
                                   alt="rating-star"
                                   title="">';
                        if ($value['rating'] != -1) {
                            echo '<span>' . $value['rating'] . '</span>';
                        }
                        if ($value['year'] !== '') {
                            echo '<span>(' . $value['year'] . ')</span>';
                        }
                    echo '</div>';
                    echo '<div class="rec-title">';
                        echo $link . $value['imdb'] . '/" target="_blank">' . $value['title'] . '</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }

    /**
     * Create array with all movie recommendation data
     * 
     * @return array recommendation data.
     */
    function recArray()
    {
        $temp = str_replace("\r", "", trim($this->recommendations));
        $column = explode("\n~\n", $temp);
        $multi = array();
        foreach ($column as $item) {
            $imdb = "";
            $year = "";
            $rating = "";
            $parts = explode("\n", $item);
            if (isset($parts[1]) && $parts[1] != "") {
                $imdb = $parts[1];
            }
            if (isset($parts[2]) && $parts[2] != "") {
                $year = $parts[2];
            }
            if (isset($parts[3]) && $parts[3] != "") {
                $rating = $parts[3];
            }
            $multi[] = array(
              'title' => htmlspecialchars($parts[0]),
              'imdb' => $imdb,
              'year' => $year,
              'rating' => $rating
            );
        }
        return $multi;
    }

    /**
     * Create plot output
     * 
     * @return html plot.
     */
    function plotList()
    {
        $temp = str_replace("\r", "", $this->plot);
        $column = explode("\n~\n", $temp);
        $plotCount = count($column);
        if ($plotCount > 0) {
            if ($plotCount == 1) {
                $key = 0;
            } elseif ($plotCount > 1) {
                $key = 1;
            }
            $loc = explode("\n", $column[$key]);
            $el = count($loc);
            if ($el == 2) {
                echo '<div class="plotInit">' . $loc[0];
                    echo '<div>&mdash;<em class="writerName">' . $loc[1] . '</em></div>';
                echo '</div>';
            } else {
                echo '<div class="plotInit">' . $loc[0] . '</div>';
            }
        }
    }

    /**
     * Create keywords output
     * 
     * @param string $flag toggle.
     * 
     * @return html keywords
     */
    function keywordsList($flag = "list", $limit = 10)
    {
        $temp = str_replace("\r", "", $this->keywords);
        $column = explode("\n", $temp);
        $count = count($column);
        if ($flag == "list") {
            foreach ($column as $key => $value) {
                $linkKeyword = str_replace(" ", "-", $value);
                $classname = 'keywordsNone';
                if ($key < $limit) {
                    $classname = 'keywordsInit';
                }
                echo '<div class="' . $classname . '">';
                    echo '<a href="https://www.imdb.com/search/keyword?keywords=' . $linkKeyword . '"
                            target="_blank">';
                        echo '<span>' . $value . '</span>';
                    echo '</a>';
                echo '</div>';
            }
        }
        if ($flag == "more" && $count > $limit) {
            return true;
        }
    }

    /**
     * Create taglines output
     * 
     * @return html taglines.
     */
    function taglinesList()
    {
        $temp = str_replace("\r", "", $this->taglines);
        $column = explode("\n", $temp);
        if (count($column) > 1) {
            echo '<h4>Taglines</h4>';
        } else {
            echo '<h4>Tagline</h4>';
        }
        foreach ($column as $key => $value) {
            if ($key == 0) {
                if (count($column) > 1) {
                    $classname = "taglinesInit initArrowRight";
                    $onClick = 'onclick="didYouKnow(\'taglines\' , \'More\');"';
                } else {
                    $classname = "taglinesInit";
                    $onClick = '';
                }
            } else {
                $classname = "taglinesNone";
                $onClick = 'onclick="didYouKnow(\'taglines\' , \'Less\');"';
            }
            echo '<div class="' . $classname . '" ' . $onClick . '><i>' . $value . '</i></div>';
        }
    }

    /**
     * Create html certifications prefered Country (from settings)
     * If prefered country not found return as is.
     * 
     * @return html certifications
     */
    function certificationsList()
    {
        global $settings;
        $mpaaCountry = $settings['mpaa']['country'];
        $certifications = $this->getListCertifications();
        $count = count($certifications);
        if ($count > 1) {
            echo '<h4>Certificates</h4>';
        } else {
            echo '<h4>Certificate</h4>';
        }
        foreach ($certifications as $key => $value) {
            if ($key == 0) {
                if ($count > 1) {
                    $classname = "certificationsInit initArrowRight";
                    $onClick = 'onclick="didYouKnow(\'certifications\' , \'More\');"';
                } else {
                    $classname = "certificationsInit";
                    $onClick = '';
                }
            } else {
                $classname = "certificationsNone";
                $onClick = 'onclick="didYouKnow(\'certifications\' , \'Less\');"';
            }
            $default = $value["country"];
            if ($value["country"] == $mpaaCountry) {
                $default = '<b>' . $value["country"] . '</b>';
            }
            echo '<div class="' . $classname . '" ' . $onClick . '>';
                echo '<span class="certValue">' . $default
                            . ': ' . $value["rating"] . '</span>';
                if (!empty($value["comment"])) {
                    echo '<span class="certComment">' . $value["comment"] . '</span>';
                }
            echo '</div>';
        }
    }

    /**
     * Create array certifications (MPAA)
     * 
     * @param string $field input string.
     * 
     * @return array certifications => country, rating, comment.
     */
    function getListCertifications()
    {
        $temp = str_replace("\r", "", $this->certifications);
        $column = explode("\n~\n", $temp);
        $certifications = array();
        foreach ($column as $value) {
            $comment = '';
            $rating = '';
            $raw = explode("\n", $value);
            if (isset($raw[1])) {
                $rating = $raw[1];
            }
            if (isset($raw[2])) {
                $comment = $raw[2];
            }
            $certifications[] = array(
                'country' => $raw[0],
                'rating' => $rating,
                'comment' => $comment
            );
        }
        return $certifications;
    }

    /**
     * Create languages output
     * 
     * @return html languages.
     */
    function langCountryGenresList($field, $flag = "list")
    {
        $temp = str_replace("\r", "", $this->$field);
        $column = explode("\n", $temp);
        $count = count($column) - 1;
        if ($flag == "list") {
            foreach ($column as $key => $value) {
                if ($key < $count) {
                    echo '<div class="langDiv">' . $value . '</div>';
                    echo '<span class="langSep"></span>';
                } else {
                    echo $value;
                }
            }
        }
        if ($flag == "more" && count($column) > 1) {
            return true;
        }
    }

    /**
     * Create also known as output
     * 
     * @return html AKA
     */
    function akaList($flag = "list")
    {
        $temp = str_replace("\r", "", $this->aka);
        $column = explode("\n~\n", $temp);
        if ($flag == "list") {
            echo '<h4>Also Known As</h4>';
            foreach ($column as $key => $value) {
                $split = explode("\n", $value);
                $country = $split[0];
                if (isset($split[1])) {
                    $title = $split[1];
                } else {
                    $title = "";
                }
                if ($key == 0) {
                    if (count($column) > 1) {
                        $classname = "akaColorRowInit initArrowRight";
                        $onClick = 'onclick="didYouKnow(\'akaColorRow\' , \'More\');"';
                    } else {
                        $classname = "akaColorRowInit";
                        $onClick = '';
                    }
                } else {
                    $classname = "akaColorRowNone";
                    $onClick = 'onclick="didYouKnow(\'akaColorRow\' , \'Less\');"';
                }
                echo '<div class="' . $classname . '" ' . $onClick . '>';
                    echo '<div class="akaCountry">' . $country . '</div>';
                    echo '<div class="akaTitle">' . $title . '</div>';
                echo '</div>';
            }
        }
        if ($flag == "listPage") {
            $split = explode("\n", $column[0]);
            $country = $split[0];
            if (isset($split[1])) {
                $title = $split[1];
            } else {
                $title = "";
            }
            echo '<span>' . $title . ' </span>';
            echo '<span>' . $country . '</span>';
        }
    }

    /**
     * Create locations output
     * 
     * @return html locations.
     */
    function locationsList()
    {
        $temp = str_replace("\r", "", $this->locations);
        $column = explode("\n~\n", $temp);
        if (count($column) > 1) {
            echo '<h2>Filming Locations</h2>';
        } else {
            echo '<h2>Filming Location</h2>';
        }
        foreach ($column as $value) {
            $locSplit = explode("\n", $value);
            $real = urlencode($locSplit[0]);
            echo '<div class="locationsInit">';
                echo '<a href="https://www.imdb.com/search/title?locations=' . $real . '"
                            target="_blank">';
                    echo $locSplit[0];
                echo '</a>';
                if (isset($locSplit[1]) && !empty(trim($locSplit[1]))) {
                    echo '<div>' . $locSplit[1] . '</div>';
                }
            echo '</div>';
        }
    }

    /**
     * Create html runtimes
     * 
     * @return html runtimes
     */
    function runtimesList()
    {
        $runtimes = $this->runtimes();
        foreach ($runtimes as $key => $value) {
            echo '<span>';
                echo $value['time'] . ' Min';
                if ($value['desc'] != "") {
                    echo '<span class="runtimeDescription"> ' . $value['desc'] . '</span>';
                }
            echo '</span>';
        }
    }

    /**
     * Count how many runtimes there are
     * 
     * @return int runtimes
     */
    function countRuntimes()
    {
        $runtimes = count($this->runtimes());
        return $runtimes;
    }

    /**
     * Create trivia output
     * 
     * @return html trivia.
     */
    function triviaList()
    {
        $temp = str_replace("\r", "", $this->trivia);
        $column = explode("\n~\n", $temp);
        echo '<h4>Trivia</h4>';
        foreach ($column as $key => $value) {
            if ($key == 0) {
                if (count($column) > 1) {
                    $classname = "triviaInit initArrowRight";
                    $onClick = 'onclick="didYouKnow(\'trivia\' , \'More\');"';
                } else {
                    $classname = "triviaInit";
                    $onClick = '';
                }
            } else {
                $classname = "triviaNone";
                $onClick = 'onclick="didYouKnow(\'trivia\' , \'Less\');"';
            }
            echo '<div class="' . $classname . '" ' . $onClick . '>' . $value . '</div>';
        }
    }

    /**
     * Create quotes output
     * 
     * @return html quotes.
     */
    function quotesList()
    {
        $temp = str_replace("\r", "", $this->quotes);
        $column = explode("\n~\n", $temp);
        $count = count($column);
        if ($count > 1) {
            echo '<h4>Quotes</h4>';
        } else {
            echo '<h4>Quote</h4>';
        }
        foreach ($column as $key => $value) {
            if ($key == 0) {
                if ($count > 1) {
                    $classname = "quotesInit initArrowRight";
                    $onClick = 'onclick="didYouKnow(\'quotes\' , \'More\');"';
                } else {
                    $classname = "quotesInit";
                    $onClick = '';
                }
            } else {
                $classname = "quotesNone";
                $onClick = 'onclick="didYouKnow(\'quotes\' , \'Less\');"';
            }
            if ($value != "") {
                echo '<div class="' . $classname . '" ' . $onClick . '>';
                    $quote = explode("\n", trim($value));
                    foreach ($quote as $item) {
                        $q = explode(":", $item, 2);
                        if (count($q) == 1) {
                            if (strpos($q[0], "]") !== false) {
                                echo '<span>[' . trim($q[0], "[] ") . '] </span>';
                            } else {
                                echo '<span class="quotesName">' . trim($q[0]) . '</span>';
                                echo '<span>: </span>';
                            }
                        } else {
                            if (strpos($q[1], "]") !== false) {
                                $t = explode("]", $q[1]);
                                echo '<span class="quotesName">' . trim($q[0]) . '</span>';
                                echo '<span>: </span>';
                                echo '<span>[' . trim($t[0], "[] ") . '] </span>';
                                echo '<span>' . trim($t[1], "[] ") . '</span>';
                            } else {
                                echo '<span class="quotesName">' . trim($q[0]) . '</span>';
                                echo '<span>: </span>';
                                echo '<span>' . trim($q[1], "[] ") . '</span>';
                            }
                        }
                        echo '<br>';
                    }
                echo '</div>';
            }
        }
    }

    /**
     * Create alternateversions output
     * 
     * @return html alternateversions.
     */
    function alternateversionsList()
    {
        $temp = str_replace("\r", "", $this->alternateversions);
        $column = explode("\n~\n", $temp);
        $count = count($column);
        if ($count > 1) {
            echo '<h4>Alternate Versions</h4>';
        } else {
            echo '<h4>Alternate Version</h4>';
        }
        foreach ($column as $key => $value) {
            if ($key == 0) {
                if ($count > 1) {
                    $classname = "alternateversionsInit initArrowRight";
                    $onClick = 'onclick="didYouKnow(\'alternateversions\' , \'More\');"';
                } else {
                    $classname = "alternateversionsInit";
                    $onClick = '';
                }
            } else {
                $classname = "alternateversionsNone";
                $onClick = 'onclick="didYouKnow(\'alternateversions\' , \'Less\');"';
            }
            echo '<div class="' . $classname . '" ' . $onClick . '>' . $value . '</div>';
        }
    }

    /**
     * Create soundtracks output
     * 
     * @return html soundtracks.
     */
    function soundtracksList()
    {
        $temp = str_replace("\r", "", $this->soundtracks);
        $column = explode("\n~\n", $temp);
        $countColumn = count($column);
        if ($countColumn > 1) {
            echo '<h4>Soundtracks</h4>';
        } else {
            echo '<h4>Soundtrack</h4>';
        }
        foreach ($column as $key => $value) {
            if ($key == 0) {
                if ($countColumn > 1) {
                    $classname = "soundtracksInit initArrowRight";
                    $onClick = 'onclick="didYouKnow(\'soundtracks\' , \'More\');"';
                } else {
                    $classname = "soundtracksInit";
                    $onClick = '';
                }
            } else {
                $classname = "soundtracksNone";
                $onClick = 'onclick="didYouKnow(\'soundtracks\' , \'Less\');"';
            }
            $item = explode("\n", $value);
            $count = count($item);
            echo '<div class="' . $classname . '" ' . $onClick . '>';
                foreach ($item as $index => $track) {
                    if ($index == 0) {
                        echo '<span class="soundtracksName">' . $track . '</span>';
                        if ($index < $count) {
                            echo '<br>';
                        }
                    } else {
                        echo '<span>' . $track . '</span>';
                        if ($index < $count) {
                            echo '<br>';
                        }
                    }
                }
            echo '</div>';
        }
    }

    /**
     * Reverse date format
     * 
     * @param string $field input string.
     * 
     * @return date string.
     */
    function stripAdded($field)
    {
        $n = trim($this->{$field});
        $temp = substr($n, 0, 10);
        $date = date_create_from_format('Y-m-d', $temp);
        $temp = date_format($date, 'd-m-Y');
        return $temp;
    }

    /**
     * Reformat string
     * 
     * @param string $field     input string.
     * @param string $separator space.
     * 
     * @return string separated by spaces.
     */
    function getLine($field, $separator = " ")
    {
        $temp = trim($this->{$field});
        $temp = str_replace("\r", "", $temp);
        $temp = str_replace("\n", $separator, $temp);
        return rtrim($temp, ",");
    }

    /**
     * Check photo dir for file exists
     * 
     * @param string $dir search directory.
     * 
     * @return string true or false.
     */
    function hasPhoto($dir = "")
    {
        return file_exists($dir.$this->id.".jpg");
    }

    /**
     * Check cover dir for file exists
     * 
     * @param string $dir search directory.
     * 
     * @return string true or false.
     */
    function hasCover($dir = "")
    {
        return file_exists($dir.$this->id.".jpg");
    }

    /**
     * Remove photo if file exists
     * 
     * @param string $dir search directory.
     * 
     * @return nothing.
     */
    function removePhoto($dir = "")
    {
        if ($this->hasPhoto($dir)) {
            unlink($dir.$this->id.".jpg");
        }
    }

    /**
     * Remove cover and thumbnail if file exists
     * 
     * @param string $dir search directory.
     * 
     * @return nothing.
     */
    function removeCover($dir = "")
    {
        if ($this->hasCover($dir)) {
            unlink($dir.$this->id.".jpg");
            unlink($dir."tn_".$this->id.".jpg");
        }
    }
    
        /**
     * Check trailer images dir for file exists
     * 
     * @param string $dir search directory.
     * 
     * @return string true or false.
     */
    function hasTrailerCover($dir, $videoId, $ext = ".jpg")
    {
        return file_exists($dir . $videoId . $ext);
    }
    
    /**
     * Remove trailer background images if file exists
     * 
     * @param string $dir search directory.
     * 
     * @return nothing.
     */
    function removeTrailerImages($dir = "")
    {
        $urls = explode("\n", $this->trailer);
        foreach ($urls as $url) {
            $imdbId = $this->imdbTrailerId($url);
            $youtubeId = $this->getYouTubeTrailerId($url);
            if ($this->hasTrailerCover($dir, $imdbId)) {
                unlink($dir . $imdbId . ".jpg");
            }
            if ($this->hasTrailerCover($dir, $youtubeId, ".png")) {
                unlink($dir . $youtubeId . ".png");
            }
        }
    }
    
    /**
     * Remove main photo images if file exists
     * 
     * @param string $dir search directory.
     * 
     * @return nothing.
     */
    function removeMainPhotoImages($dir, $id)
    {
        $imageUrls = array(
            $dir . $id . '_0.jpg',
            $dir . $id . '_1.jpg',
            $dir . $id . '_2.jpg',
            $dir . $id . '_3.jpg',
            $dir . $id . '_4.jpg',
            $dir . $id . '_5.jpg'
        );
        foreach ($imageUrls as $photoUrl) {
            if (file_exists($photoUrl)) {
                unlink($photoUrl);
            }
        }
    }

    /**
     * Check cast cover dir for file exists
     * 
     * @param string $path search directory.
     * @param string $imdb imddb id.
     * 
     * @return string true or false.
     */
    function hasCastCover($path, $imdb)
    {
        return file_exists($path.$imdb.".jpg");
    }

    /**
     * Check recommendations cover dir for file exists
     * 
     * @param string $path search directory.
     * @param string $imdb imddb id.
     * 
     * @return string true or false.
     */
    function hasRecCover($path, $imdb)
    {
        return file_exists($path.$imdb.".jpg");
    }

    /**
     * Check uploaded images > size, extension, upload ok, type and mimetype
     * 
     * @param string $field input path.
     * 
     * @return Nothing if clean, error otherwise.
     */
    function checkUploadImage($field)
    {
        // Set variables.
        $error = "";
        $inputError = $_FILES[$field]['error'];
        $inputSize = $_FILES[$field]['size'];
        $inputName = $_FILES[$field]['name'];
        $inputTmpName = $_FILES[$field]['tmp_name'];

        // Set allowed types array.
        $allowed = array('jpeg','jpg','webp','png','image/jpeg','image/webp','image/png');

        if ($inputError !== UPLOAD_ERR_OK) {
            $error .= "Upload failed with error code " . $inputError;
            return $error;
        }
        if ($inputSize > 5000000) {
            $error .= "Uploaded file exceeds 5MB!";
            return $error;
        }
        $info = getimagesize($inputTmpName);
        if ($info === false) {
            $error .= "Unable to determine image type!";
            return $error;
        }
        $filename = strtolower($inputName);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $error .= "Only jpg, jpeg, webp or png allowed!";
            return $error;
        }
        $mime = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $inputTmpName);
        if (!in_array($mime, $allowed)) {
            $error .= "Mimetype mismatch, only jpeg, jpg, webp or png mimetype allowed!";
            return $error;
        }
    }

    /**
     * Check source image type
     * 
     * @param string $field input path.
     * 
     * @return extension
     */
    function checkSourceImageType($field)
    {
        // Set variables.
        $inputName = $_FILES[$field]['name'];
        $inputTmpName = $_FILES[$field]['tmp_name'];
        $filename = strtolower($inputName);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if ($ext == 'jpg' || $ext == 'jpeg') {
            return @imagecreatefromjpeg($inputTmpName);
        }
        if ($ext == 'webp') {
            return @imagecreatefromwebp($inputTmpName);
        }
        if ($ext == 'png') {
            return @imagecreatefrompng($inputTmpName);
        }
    }

    /**
     * Add uploaded images
     * 
     * @param string $field input file.
     * @param string $dir   save directory.
     * 
     * @return Save the image.
     */
    function addCover($field, $dir = "")
    {
        // Set variables.
        global $settings;
        $size = 200;
        $bestand = $dir.$this->id.".jpg";
        $inputTmpName = $_FILES[$field]['tmp_name'];
        $inputName = $_FILES[$field]['name'];

        //Check uploaded file.
        $error = $this->checkUploadImage($field);
        if ($error != "") {
            return $error;
        }
        //Check image source type and create imageCopy
        $sourceImg = $this->checkSourceImageType($field);
        if ($sourceImg == FALSE) {
            return;
        }

        $width = imagesx($sourceImg);
        $height = imagesy($sourceImg);
        $targetImg = imagecreatetruecolor($width, $height);
        imagecopy($targetImg, $sourceImg, 0, 0, 0, 0, $width, $height);
        if (file_exists($bestand)) {
            unlink($bestand);
        }
        imagejpeg($targetImg, $bestand);

        //Check and make thumbnail if nessecary.
        if ($field == "cover") {
            if (file_exists($bestand)) {
                unlink($dir."tn_".$this->id.".jpg");
            }
            if ($width > $size) {
                $thumbWidth = $size;
                @$thumbHeight = ($thumbWidth / $width) * $height;
                $targetThumb = ImageCreateTrueColor($thumbWidth, $thumbHeight);
                @imagecopyresampled($targetThumb, $sourceImg, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);
                imagejpeg($targetThumb, $dir."tn_".$this->id.".jpg");
                imagedestroy($targetThumb);
            } else {
                imagejpeg($targetImg, $dir."tn_".$this->id.".jpg");
            }
        }
        imagedestroy($sourceImg);
        imagedestroy($targetImg);
    }

    /**
     * Curl file handler
     * 
     * @param string $ch input image url.
     * @param string $fp save path.
     * 
     * @return nothing, saved file.
     */
    function curlFileHandler($ch, $fp)
    {
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
}
?>