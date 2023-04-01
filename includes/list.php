<?php
function list_donors() {
$message = <<<EOT
<div class="fusion-fullwidth fullwidth-box fusion-builder-row-8 fusion-flex-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;border-width: 0px 0px 0px 0px;border-color:#eae9e9;border-style:solid;" >
<div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start" style="max-width:1144px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
	<div class="fusion-layout-column fusion_builder_column fusion-builder-column-7 fusion_builder_column_1_1 1_1 fusion-flex-column">
		<div class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-column" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;padding: 0px 0px 0px 0px;">
			<div class="fusion-text fusion-text-8"><p style="text-align: center;"><span style="font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt; color: #333333;"><b>KINDRED SPIRITS</b></span></p>
<p style="text-align: center;"><span style="font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt; color: #333333;"><i><span style="font-weight: 400;">Donors who have generously given $500 or more</span></i></span></p>
			</div>
		</div>
	</div>
</div>
<div class="fusion-fullwidth fullwidth-box fusion-builder-row-4 fusion-flex-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;border-width: 0px 0px 0px 0px;border-color:#eae9e9;border-style:solid;" >
	<div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start" style="max-width:1144px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
		<div class="fusion-layout-column fusion_builder_column fusion-builder-column-3 fusion_builder_column_1_1 1_1 fusion-flex-column">
			<div class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-column" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;padding: 0px 0px 0px 0px;">
				<div class="fusion-text fusion-text-4 fusion-text-split-columns fusion-text-columns-3" style=" -webkit-column-count:3; -webkit-column-gap:2em; -webkit-column-width:100px; -moz-column-count:3; -moz-column-gap:2em; -moz-column-width:100px; column-count:3; column-gap:2em; column-width:100px;"><p>Anonymous</p>
EOT;

    $donors = array();
    $major = 500 ;
    $fname = "./wp-content/plugins/WPDonor/includes/onetime.csv";
        if (($handle = fopen($fname, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			preg_match_all('!\d+!', $data[4], $matches);
			if ($matches[0][0] >= $major ) { // donors over the major donor amount
				$message .= "<p>" . $data[0] . " " . $data[1] . "<p>";
			} else { 
				$donors[] = $data;
			}
		}
	}

$message .= <<<EOT
				</div>
			</div><style type="text/css">.fusion-body .fusion-builder-column-3{width:100% !important;margin-top : 0px;margin-bottom : 20px;}.fusion-builder-column-3 > .fusion-column-wrapper {padding-top : 0px !important;padding-right : 0px !important;margin-right : 1.92%;padding-bottom : 0px !important;padding-left : 0px !important;margin-left : 1.92%;}@media only screen and (max-width:1024px) {.fusion-body .fusion-builder-column-3{width:100% !important;order : 0;}.fusion-builder-column-3 > .fusion-column-wrapper {margin-right : 1.92%;margin-left : 1.92%;}}@media only screen and (max-width:640px) {.fusion-body .fusion-builder-column-3{width:100% !important;order : 0;}.fusion-builder-column-3 > .fusion-column-wrapper {margin-right : 1.92%;margin-left : 1.92%;}}</style>
		</div>
	</div><style type="text/css">.fusion-body .fusion-flex-container.fusion-builder-row-4{ padding-top : 0px;margin-top : 0px;padding-right : 30px;padding-bottom : 0px;margin-bottom : 0px;padding-left : 30px;}</style>
</div>
<div class="fusion-fullwidth fullwidth-box fusion-builder-row-5 fusion-flex-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;border-width: 0px 0px 0px 0px;border-color:#eae9e9;border-style:solid;" >
	<div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start" style="max-width:1144px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
		<div class="fusion-layout-column fusion_builder_column fusion-builder-column-4 fusion_builder_column_1_1 1_1 fusion-flex-column">
			<div class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-column" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;padding: 0px 0px 0px 0px;">
				<div class="fusion-separator fusion-full-width-sep" style="align-self: center;margin-left: auto;margin-right: auto;margin-top:8px;margin-bottom:8px;width:100%;">
					<div class="fusion-separator-border sep-double" style="border-color:#ffffff;border-top-width:6px;border-bottom-width:6px;">
					</div>
				</div>
			<div class="fusion-text fusion-text-5"><p style="text-align: center;"><span style="font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt; color: #000000;"><b>SUSTAINING DONORS</b></span></p>
<p style="text-align: center;"><span style="font-size: 14pt; font-family: tahoma, arial, helvetica, sans-serif;"><i><span style="font-weight: 400;">Donors with a monthly, recurring gift</span></i></span></p>
		</div>
	</div><style type="text/css">.fusion-body .fusion-builder-column-4{width:100% !important;margin-top : 0px;margin-bottom : 20px;}.fusion-builder-column-4 > .fusion-column-wrapper {padding-top : 0px !important;padding-right : 0px !important;margin-right : 1.92%;padding-bottom : 0px !important;padding-left : 0px !important;margin-left : 1.92%;}@media only screen and (max-width:1024px) {.fusion-body .fusion-builder-column-4{width:100% !important;order : 0;}.fusion-builder-column-4 > .fusion-column-wrapper {margin-right : 1.92%;margin-left : 1.92%;}}@media only screen and (max-width:640px) {.fusion-body .fusion-builder-column-4{width:100% !important;order : 0;}.fusion-builder-column-4 > .fusion-column-wrapper {margin-right : 1.92%;margin-left : 1.92%;}}</style>
</div>
<div class="fusion-layout-column fusion_builder_column fusion-builder-column-5 fusion_builder_column_1_1 1_1 fusion-flex-column">
	<div class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-row" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;padding: 0px 0px 0px 0px;">
		<div class="fusion-text fusion-text-6">
		</div>
	</div><style type="text/css">.fusion-body .fusion-builder-column-5{width:100% !important;margin-top : 0px;margin-bottom : 20px;}.fusion-builder-column-5 > .fusion-column-wrapper {padding-top : 0px !important;padding-right : 0px !important;margin-right : 1.92%;padding-bottom : 0px !important;padding-left : 0px !important;margin-left : 1.92%;}@media only screen and (max-width:1024px) {.fusion-body .fusion-builder-column-5{width:100% !important;order : 0;}.fusion-builder-column-5 > .fusion-column-wrapper {margin-right : 1.92%;margin-left : 1.92%;}}@media only screen and (max-width:640px) {.fusion-body .fusion-builder-column-5{width:100% !important;order : 0;}.fusion-builder-column-5 > .fusion-column-wrapper {margin-right : 1.92%;margin-left : 1.92%;}}</style>
<style type="text/css">.fusion-body .fusion-flex-container.fusion-builder-row-8{ padding-top : 0px;margin-top : 0px;padding-right : 30px;padding-bottom : 0px;margin-bottom : 0px;padding-left : 30px;}</style>
</div>
</div><style type="text/css">.fusion-body .fusion-flex-container.fusion-builder-row-5{ padding-top : 0px;margin-top : 0px;padding-right : 30px;padding-bottom : 0px;margin-bottom : 0px;padding-left : 30px;}</style>
</div>
<div class="fusion-fullwidth fullwidth-box fusion-builder-row-6 fusion-flex-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;border-width: 0px 0px 0px 0px;border-color:#eae9e9;border-style:solid;" >
	<div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start" style="max-width:1144px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
		<div class="fusion-layout-column fusion_builder_column fusion-builder-column-6 fusion_builder_column_1_1 1_1 fusion-flex-column">
			<div class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-column" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;padding: 0px 0px 0px 0px;">
				<div class="fusion-text fusion-text-7 fusion-text-split-columns fusion-text-columns-3" style=" -webkit-column-count:3; -webkit-column-gap:2em; -webkit-column-width:100px; -moz-column-count:3; -moz-column-gap:2em; -moz-column-width:100px; column-count:3; column-gap:2em; column-width:100px;">

EOT;

    $fname = "./wp-content/plugins/WPDonor/includes/recur.csv";
        if (($handle = fopen($fname, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$message .= "<p>" . $data[0] . " " . $data[1] . "<p>";
		}
	}

$message .= <<<EOT
				</div>
			</div><style type="text/css">.fusion-body .fusion-builder-column-6{width:100% !important;margin-top : 0px;margin-bottom : 20px;}.fusion-builder-column-6 > .fusion-column-wrapper {padding-top : 0px !important;padding-right : 0px !important;margin-right : 1.92%;padding-bottom : 0px !important;padding-left : 0px !important;margin-left : 1.92%;}@media only screen and (max-width:1024px) {.fusion-body .fusion-builder-column-6{width:100% !important;order : 0;}.fusion-builder-column-6 > .fusion-column-wrapper {margin-right : 1.92%;margin-left : 1.92%;}}@media only screen and (max-width:640px) {.fusion-body .fusion-builder-column-6{width:100% !important;order : 0;}.fusion-builder-column-6 > .fusion-column-wrapper {margin-right : 1.92%;margin-left : 1.92%;}}</style>
		</div>
	</div><style type="text/css">.fusion-body .fusion-flex-container.fusion-builder-row-6{ padding-top : 0px;margin-top : 0px;padding-right : 30px;padding-bottom : 0px;margin-bottom : 0px;padding-left : 30px;}</style>
</div>
<div class="fusion-fullwidth fullwidth-box fusion-builder-row-7 fusion-flex-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;border-width: 0px 0px 0px 0px;border-color:#eae9e9;border-style:solid;" >
	<div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start" style="max-width:1144px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
	</div><style type="text/css">.fusion-body .fusion-flex-container.fusion-builder-row-7{ padding-top : 0px;margin-top : 0px;padding-right : 30px;padding-bottom : 0px;margin-bottom : 0px;padding-left : 30px;}</style>
</div>
EOT;

$message.= <<<EOT
<div class="fusion-fullwidth fullwidth-box fusion-builder-row-8 fusion-flex-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;border-width: 0px 0px 0px 0px;border-color:#eae9e9;border-style:solid;" >
<div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start" style="max-width:1144px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
	<div class="fusion-layout-column fusion_builder_column fusion-builder-column-7 fusion_builder_column_1_1 1_1 fusion-flex-column">
		<div class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-column" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;padding: 0px 0px 0px 0px;">
			<div class="fusion-text fusion-text-8"><p style="text-align: center;"><span style="font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt; color: #333333;"><b>DONORS</b></span></p>
<p style="text-align: center;"><span style="font-family: tahoma, arial, helvetica, sans-serif; font-size: 14pt; color: #333333;"></span></p>
			</div>
		</div>
	</div>
</div>
<div class="fusion-fullwidth fullwidth-box fusion-builder-row-4 fusion-flex-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;border-width: 0px 0px 0px 0px;border-color:#eae9e9;border-style:solid;" >
	<div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start" style="max-width:1144px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
		<div class="fusion-layout-column fusion_builder_column fusion-builder-column-3 fusion_builder_column_1_1 1_1 fusion-flex-column">
			<div class="fusion-column-wrapper fusion-flex-justify-content-flex-start fusion-content-layout-column" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;padding: 0px 0px 0px 0px;">
				<div class="fusion-text fusion-text-4 fusion-text-split-columns fusion-text-columns-3" style=" -webkit-column-count:3; -webkit-column-gap:2em; -webkit-column-width:100px; -moz-column-count:3; -moz-column-gap:2em; -moz-column-width:100px; column-count:3; column-gap:2em; column-width:100px;">
EOT;

	foreach ($donors as $donor) {
		$message .= "<p>" . $donor[0] . " " . $donor[1] . "<p>";
	}

$message .= <<<EOT
				</div>
			</div><style type="text/css">.fusion-body .fusion-builder-column-6{width:100% !important;margin-top : 0px;margin-bottom : 20px;}.fusion-builder-column-6 > .fusion-column-wrapper {padding-top : 0px !important;padding-right : 0px !important;margin-right : 1.92%;padding-bottom : 0px !important;padding-left : 0px !important;margin-left : 1.92%;}@media only screen and (max-width:1024px) {.fusion-body .fusion-builder-column-6{width:100% !important;order : 0;}.fusion-builder-column-6 > .fusion-column-wrapper {margin-right : 1.92%;margin-left : 1.92%;}}@media only screen and (max-width:640px) {.fusion-body .fusion-builder-column-6{width:100% !important;order : 0;}.fusion-builder-column-6 > .fusion-column-wrapper {margin-right : 1.92%;margin-left : 1.92%;}}</style>
		</div>
	</div><style type="text/css">.fusion-body .fusion-flex-container.fusion-builder-row-6{ padding-top : 0px;margin-top : 0px;padding-right : 30px;padding-bottom : 0px;margin-bottom : 0px;padding-left : 30px;}</style>
</div>
<div class="fusion-fullwidth fullwidth-box fusion-builder-row-7 fusion-flex-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;border-width: 0px 0px 0px 0px;border-color:#eae9e9;border-style:solid;" >
	<div class="fusion-builder-row fusion-row fusion-flex-align-items-flex-start" style="max-width:1144px;margin-left: calc(-4% / 2 );margin-right: calc(-4% / 2 );">
	</div><style type="text/css">.fusion-body .fusion-flex-container.fusion-builder-row-7{ padding-top : 0px;margin-top : 0px;padding-right : 30px;padding-bottom : 0px;margin-bottom : 0px;padding-left : 30px;}</style>
</div>
EOT;

return $message;
} // end of function
?>
