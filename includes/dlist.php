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
 
function get_file() {
	$row = 1;
	$recur = array();
	$one_time = array();
	$fname = "./wp-content/plugins/WPDonor/includes/DPO SEND_ 2 Year Donation List For Website_2 Year Donation List For Website.csv";
	if (($handle = fopen($fname, "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			if ($data[7] == 'Y') {
				array_push($recur, $data);
				$row++;
			}
			else if ($data[7] == 'N') {
				array_push($one_time, $data);
			}
		}
		fclose($handle);
		echo "Number of donors: " . $row . "\n";
	}
	else 
		return ("Unable to open $fname");

	$final = array_by_names($recur, 1);
	file_out("./wp-content/plugins/WPDonor/includes/recur.csv", $final);	// output recurring csv file
	$final = array_by_names($one_time, 1);
	file_out("./wp-content/plugins/WPDonor/includes/onetime.csv",$final);	// output one time csv file
	echo date('Y', strtotime($final[0][3]));
	return("Files created");
}

function file_out($fname, $arrin) {
	$fp = fopen($fname, 'w');
	// Loop through file pointer and a line
	foreach ($arrin as $fields) {
		fputcsv($fp, $fields);
	}
	fclose($fp);
}	

function array_by_names ( $array1, $index1 ) {
	$names = array_column($array1, $index1); // finds unique last names
	$names = array_unique($names);
	$namekeys = array_keys($names); // gets the indexes from the $name array
	$final = array();
	foreach ($names as $key => $value) {
	    array_push($final, $array1[$key]);	// creates array of arrays	
	}
	return $final;
}						// with unique last names


?>
