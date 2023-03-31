<?php
/**
* @file f_formpage.php
* Purpose: File Upload Form 
* Extends MainPage Class
*
* @author Keith Gudger
* @copyright  (c) 2023, Keith Gudger, all rights reserved
* @license    https://www.gnu.org/licenses/gpl-3.0.html
* @version    Release: 1.1
* @package    FSCPL
*
* @note Has processData and showContent, 
* main and checkForm in MainPage class not overwritten.
* 
*/
require_once("mainpage.php");
include_once "util.php";
include_once "dlist.php";
/**
 * Child class of MainPage used for user preferrences page.
 *
 * Implements processData and showContent
 */

class fFormPage extends MainPage {

/**
 * Process the data and insert / modify database.
 *
 * @param $uid is user id passed by reference.
 */
function processData(&$uid) {
//	$response = NULL;
//	$reCaptcha = new ReCaptcha($this->secret);

    // Process the verified data here.
	$fname   = $this->formL->getValue("fname");
	$message = $fname . "<br>" ;
	if (isset($_FILES['fname']) && $_FILES['fname']['error'] === UPLOAD_ERR_OK)
			{
		// get details of the uploaded file
			$fileTmpPath = $_FILES['fname']['tmp_name']; // uploaded file name
			$fileName = $_FILES['fname']['name'];	// original file name
			$fileSize = $_FILES['fname']['size'];
			$fileType = $_FILES['fname']['type'];
			$fileNameCmps = explode(".", $fileName);
			$fileExtension = strtolower(end($fileNameCmps));
			// sanitize file-name
			$fileNameCmps[0] = str_replace('.', "", $fileNameCmps[0]);
			$newFileName = $fileNameCmps[0] . "_" . time() . '.' . $fileExtension;
			// check if file has one of the following extensions
			$allowedfileExtensions = array('csv');
			if (in_array($fileExtension, $allowedfileExtensions))
			{
				$target_dir = "./wp-content/plugins/WPDonor/includes/";
				$target_file = $target_dir . $fileName; // filename uploaded from
				if (file_exists($fileTmpPath))
                                                chmod($fileTmpPath, 0644);
				if (move_uploaded_file($fileTmpPath, $target_file)) {
					$message = "<br>The file ".  $fileName . " was uploaded.<br>";
					$message .= get_file();
				} else {
					$message.= "Sorry, there was an error uploading your file.";
				}
			} else {
				$message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
			}
		} else {
			$message = 'There is some error in the file upload. Please check the following error.<br>';
			$message .= 'Error:' . $_FILES['fname']['error'];
		}
	$this->retstring = $message . "<br>";
}

/**
 * Display the content of the page.
 *
 * @param $title is page title.
 * @param $uid is user id passed by reference.
 */
function showContent($title, &$uid) {

	$this->retstring.= "<br>";

	$this->retstring.= $this->formL->reportErrors();
	$this->retstring.= $this->formL->start('POST', "", 'name="server_file_upload" enctype="multipart/form-data" id="server_form"');
	$this->retstring.= $this->formL->makeFileInput("fname");
	$this->retstring.= $this->formL->formatonError('fname','File Name') . "<br><br>";
	$this->retstring.= $this->formL->makeButton($value = "Submit", $name= "Submit");
	$this->retstring.=$this->formL->finish();
	return $this->retstring;
}
}
// <div id = "recap" class="g-recaptcha" data-sitekey="6LcwJagUAAAAANWRDfITT9FdTquL6DVoZRMgO4Ta"></div>

class SFTPConnection
{
    private $connection;
    private $sftp;

    public function __construct($host, $port=22)
    {
        $this->connection = @ssh2_connect($host, $port);
        if (! $this->connection)
            throw new Exception("Could not connect to $host on port $port.");
    }

    public function login($username, $password)
    {
        if (! @ssh2_auth_password($this->connection, $username, $password))
            throw new Exception("Could not authenticate with username $username " . "and password $password.");
        $this->sftp = @ssh2_sftp($this->connection);
        if (! $this->sftp)
            throw new Exception("Could not initialize SFTP subsystem.");
    }

    public function uploadFile($local_file, $remote_file)
    {
        $sftp = $this->sftp;
//		$fp = fopen("ssh2.sftp://" . intval($sftp) . $remoteFile, "r");
//      changed to intval to fix php bug
        $stream = @fopen("ssh2.sftp://" . intval($sftp) . $remote_file, 'w');
        if (! $stream)
            throw new Exception("Could not open file: $remote_file");
        $data_to_send = @file_get_contents($local_file);
        if ($data_to_send === false)
            throw new Exception("Could not open local file: $local_file.");
        if (@fwrite($stream, $data_to_send) === false)
            throw new Exception("Could not send data from file: $local_file.");
        @fclose($stream);
    }
    
        function scanFilesystem($remote_file) {
              $sftp = $this->sftp;
            $dir = "ssh2.sftp://$sftp$remote_file";  
              $tempArray = array();
            $handle = opendir($dir);
          // List all the files
            while (false !== ($file = readdir($handle))) {
            if (substr("$file", 0, 1) != "."){
              if(is_dir($file)){
//                $tempArray[$file] = $this->scanFilesystem("$dir/$file");
               } else {
                 $tempArray[]=$file;
               }
             }
            }
           closedir($handle);
          return $tempArray;
        }    

    public function receiveFile($remote_file, $local_file)
    {
        $sftp = $this->sftp;
        $stream = @fopen("ssh2.sftp://$sftp$remote_file", 'r');
        if (! $stream)
            throw new Exception("Could not open file: $remote_file");
        $contents = fread($stream, filesize("ssh2.sftp://$sftp$remote_file"));            
        file_put_contents ($local_file, $contents);
        @fclose($stream);
    }
        
    public function deleteFile($remote_file){
      $sftp = $this->sftp;
      unlink("ssh2.sftp://$sftp$remote_file");
    }
}
?>
