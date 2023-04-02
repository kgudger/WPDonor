<?php
/*
Plugin Name: DonorList
Plugin URI:  http://www.github.com/kgudger/
Description: Parse donor csv into lists for website
Version:     0.9
Author:      Keith Gudger
Author URI:  http://www.github.com/kgudger
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'Ah ah ah, you didn\'t say the magic word' );
add_shortcode('f_form', 'f_form_fun');
add_shortcode('l_form', 'l_form_fun');

/**
 * Function to upload the file and process it
 */
function f_form_fun() {

include_once("includes/dlist.php");
include_once("includes/f_formpage.php");
include_once("includes/f_formpage.php");

/**
 * The checkArray defines what checkForm does so you don't
 * have to overwrite it in the derived class. */

$checkArray = array(
//	array("isEmpty","fname", "Please select a file."),
//	array("isEmpty","directory", "Please select a destination folder.")
);

/// a new instance of the derived class (from MainPage)
$fform = new fFormPage($db,$sessvar,$checkArray,$secret3a,$sftpacct,$sftppwd,$sftpurl,$sftpsftp,$sftpport) ;
/// and ... start it up!  
return $fform->main("File Upload Form", $uid, "", "");
}

/** Function to display the donors on a page
 */
function l_form_fun() {
	include_once("includes/list.php");
	return list_donors();;
}

