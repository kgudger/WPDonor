<?php
/*
Plugin Name: DonorList
Plugin URI:  http://www.github.com/kgudger/
Description: Parse donor csv into lists for website
Version:     0.j
Author:      Keith Gudger
Author URI:  http://www.github.com/kgudger
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'Ah ah ah, you didn\'t say the magic word' );
add_shortcode('f_form', 'f_form_fun');
function f_form_fun() {
/**
 * dbstart.php opens the database and gets the user variables
 */

include_once("includes/dlist.php");


return $fform->main("File Upload Form", $uid, "", "");
}
