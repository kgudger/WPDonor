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

function create_page() {

	$retstring = <<<EOT
<form action="includes/DPO SEND_ 2 Year Donation List For Website_2 Year Donation List For Website.csv" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload" name="submit">
</form>
EOT;
	return $retstring;
}
