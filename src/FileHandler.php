<?php  

/**
* FileHandler class. Offers file read/write operations. 
*/
class FileHandler {  

	/**
  * Reads input file and returns file lines in array.
  * @param String $file
  */
	public function readFile($file) {
		$input_array = array();

		try {
			if(file_exists($file) && is_readable($file)) {
				$file_handle = fopen($file, "r");
			    while (!feof($file_handle)) {
			      $line = fgets($file_handle);
			      
			      // skip empty lines
			      if (strlen(trim($line)) > 0) {
			        //echo $line, ' <=> ', intval($line), ' <=> ', (int)$line, '<br/>';
			        array_push($input_array, (int)$line);
			      }
			    }
		  }
		  else {
		    echo "File not found.<br/>";
		  }
		}
		catch (Exception $e) {
		  echo 'Exception: ', $e->getMessage();
		}
		if (isset($file_handle)) {
			//echo "closed input file";
		  fclose($file_handle);
		}
		return $input_array;
	}
}  

?>  