<html>

<head>
  <title>Vitorious Homework Sorter</title>
  <style>
  body, input, select {font-family:Arial,Helvetica,sans-serif;
        font-size: 11px;}
  </style>
</head>  

<body>

<form>
  <select name="sort" onchange="this.form.submit()">
    <option value="">&raquo; Select sort</option>
    <option value="quickSort"  <?php if (isset($_REQUEST['sort']) && $_REQUEST['sort'] == "quickSort"){echo 'selected';} ?>>Quicksort  </option>
    <option value="shellSort"  <?php if (isset($_REQUEST['sort']) && $_REQUEST['sort'] == "shellSort"){echo 'selected';} ?>>Shell sort </option>
  </select>
</form>  

<?php
require_once 'src/FileHandler.php';
require_once 'src/Sorter.php';

$sortHandler = new FileHandler;
$sorter = new Sorter;
$sort_list = array("quickSort", "shellSort");

if (isset($_REQUEST['sort']) && in_array($_REQUEST['sort'], $sort_list)) {  
  // read input file into array
  $int_array = $sortHandler->readFile("int_array.txt");

  echo '<div>';
  // sort and output array
  if (count($int_array) > 0) {
    $start = microtime(true);
    $int_array = $sorter->$_REQUEST['sort']($int_array);
    $end = microtime(true);

    echo 'Sort execution time: ', ($end - $start), ' (sec)<br/>';

    foreach($int_array as $val) {
        echo $val, ' ';
    }
}
echo '</div>';
}
else {
  echo '<div>Please select sort.</div>';
}

?>

</body>

</html>