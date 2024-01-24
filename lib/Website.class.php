<?php
/**
 * PHPMovieDB is a movie database program.
 *
 * PHP version 7 and 8.1
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
 * website Class Doc Comment
 * 
 * 
 * @category Website
 * @package  Website
 * @author   Ed <ed@domain.com>
 * @license  http://www.gnu.org/licenses/ GNU
 * @link     http://localhost/
 */
class Website
{
    var $settings;
    var $_tpl_vars;
    var $posterView;

    /**
     * Define constructor.
     * 
     * @param string $settings constuctor settings
     */
    function __construct($settings = null)
    {
        if (!empty($settings)) {
            global $posterView;
            if (isset($settings["mobile_template_include_dir"]) && isset($posterView)) {
                $this->template_include_dir = $settings["mobile_template_include_dir"];
            } else {
                if (isset($settings["template_include_dir"])) {
                $this->template_include_dir = $settings["template_include_dir"];
            }
            }
        }
    }
    
        /**
     * assigns values to template variables
     *
     * @param array|string $tpl_var the template variable name(s)
     * @param mixed $value the value to assign
     */
    function assign($tpl_var, $value = null)
    {
        if (is_array($tpl_var)){
            foreach ($tpl_var as $key => $val) {
                if ($key != '') {
                    $this->_tpl_vars[$key] = $val;
                }
            }
        } else {
            if ($tpl_var != '') {
                $this->_tpl_vars[$tpl_var] = $value;
            }
        }
    }
}
?>