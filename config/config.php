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

$settings = array();

// Database settings: Host, Database Name, Username and Password.
$settings['db'] = array();
$settings['db']['host'] = "localhost";
$settings['db']['name'] = "phpmoviedb";
$settings['db']['user'] = "";
$settings['db']['pass'] = "";

//IMDb Certification and MPAA Rating country's:
/*
Argentina, Australia, Austria, Belgium, Brazil, Bulgaria, Canada, Chile, China,
Colombia, Denmark, Estonia, Finland, France, Germany, Greece, Hong Kong, Hungary,
Iceland, India, Indonesia, Ireland, Italy, Jamaica, Japan, Kazakhstan, Kuwait,
Latvia, Malaysia, Maldives, Malta, Mexico, Netherlands, New Zealand, Nigeria,
Norway, Philippines, Poland, Portugal, Romania, Russia, Saudi Arabia, Singapore,
South Africa, South Korea, Spain, Sweden, Switzerland, Taiwan, Thailand, Turkey,
United Arab Emirates, United Kingdom, United States, Venezuela, Vietnam
*/

//Set IMDb Certification and MPAA Rating desired country
// The selected country is shown in bold in movie page mpaa
//If not found mpaa list is shown as is.
$settings['mpaa']['country'] = "Netherlands";

// Paths to image directorys: Front photo, Full cover, Cast photo and Episodes photo)
$settings["foto"]["movies"]          = "./images/";
$settings["foto"]["covers"]          = $settings["foto"]["movies"]."covers/";
$settings["foto"]["cast"]            = $settings["foto"]["movies"]."cast/";
$settings["foto"]["recommendations"] = $settings["foto"]["movies"]."recommendations/";
$settings["foto"]["episodes"]        = $settings["foto"]["movies"]."episodes/";
$settings["foto"]["trailers"]        = $settings["foto"]["movies"]."trailers/";
$settings["foto"]["mainphoto"]       = $settings["foto"]["movies"]."mainphoto/";

// This setting controls if trailers are updated if you update a movie.
// value: true or false
$settings["trailer"] = false;

// Can guest visitors view your movies?
$settings["user"]["guestview"] = true;

// default template directory
$settings["template_include_dir"] = "tpl/default/";

//Mobile template directory
$settings["mobile_template_include_dir"] = "tpl/mobile/";
?>
