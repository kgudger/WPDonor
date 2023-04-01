<?php 
    $donors = array();
    $major = 500 ;
    $fname = "onetime.csv";
        if (($handle = fopen($fname, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			preg_match_all('!\d+!', $data[4], $matches);
			print_r($matches);
			echo($matches[0][0]);
                        if ($data[4] >= $major ) { // donors over the major donor amount
                                $message .= "<p>" . $data[0] . " " . $data[1] . "<p>";
                        } else { 
                                $donors[] = $data;
                        }
                }
        }
?>
