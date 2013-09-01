<?php  

/**
* Simple sorting class. 
* See http://www.hashbangcode.com/blog/array-sorting-algorithms-php-103.html
*/
class Sorter {  
  public function doTest() {
    return "You've reached doTest()";
  }

  /**
  * Wraps PHP's sort method
  * @param Array $array
  */
  public function phpSort($array) {
  	sort($array);
  	return $array;
  }

  /**
  * Quicksort implementation.
  * @param Array $array
  */
  public function quickSort($array) {
    if(count($array) < 2) return $array;
 
    $left = $right = array();
 
    reset($array);
    $pivot_key = key($array);
    $pivot = array_shift($array);
 
    foreach($array as $k => $v) {
        if($v < $pivot)
            $left[$k] = $v;
        else
            $right[$k] = $v;
    }
 
    return array_merge($this->quicksort($left), array($pivot_key => $pivot), $this->quicksort($right));
	}

  /**
  * Shell sort implementation.
  * @param Array $array
  */
  public function shellSort($array) {
		if (!$length = count($array)) {
			return $array;
		}
		$k = 0;
		$gap[0] = (int)($length/2);
		while($gap[$k]>1){
		  $k++;
		  $gap[$k] = (int)($gap[$k-1]/2);
		}
		 
		for ($i = 0; $i <= $k; $i++) {
		  $step = $gap[$i];
		  for ($j = $step; $j<$length; $j++) {
		   	$temp = $array[$j];
		   	$p = $j-$step;
		   	while ($p >= 0 && $temp < $array[$p]) {
		    	$array[$p+$step] = $array[$p];
		    	$p = $p-$step;
		   	}
		   	$array[$p+$step] = $temp;
		  }
		}
		return $array;
	}
 
 	/**
  * Bubble sort implementation.
  * @param Array $array
  */
	public function bubbleSort($array) {
 		if (!$length = count($array)) {
  		return $array;
 		}      
 		for ($outer = 0; $outer < $length; $outer++) {
  		for ($inner = 0; $inner < $length; $inner++) {
   			if ($array[$outer] < $array[$inner]) {
    			$tmp = $array[$outer];
    			$array[$outer] = $array[$inner];
    			$array[$inner] = $tmp;
   			}
  		}
 		}
 		return $array;
	}
 
}  

?>  