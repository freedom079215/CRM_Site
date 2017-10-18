<?php

include "db_link.php";
//$arr = isset($_POST["arr"]) ? $_POST["arr"] : $_GET["arr"]; 
$arr = $_GET['arr'];

//echo $_POST["8787"];
$db_connect= new db("root","","","127.0.0.1");
//$arr = ['2222','8787'];
$connect = $db_connect -> data_query($arr);

echo '<table class="table" id="tag_inform">';
foreach ($connect as $var) {
	echo '<thead class="thead-inverse">';
	echo '<tr>';
	foreach ($var  as $key => $value) {
		echo '<th>'.$key.'</th>';
		# code...
	}
	break;
	echo '</tr>';
	echo '</thead>';
	# code...
}

echo '<tbody>';
foreach ($connect as $var) {
	echo '<tr id='.$var['tag_cd'].' onclick="setItem()">';
	foreach ($var  as $key => $value) {
		echo '<td>'.$value.'</td>';
		# code...
	}
	echo '<td>';
	echo '</tr>';
	# code...
}
	echo '</tbody>';



echo '</table>';

?>