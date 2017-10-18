<?php

include "db_link.php";
//echo 'test';
$tag_nm = $_POST["tag_nm"]!='\n' ? $_POST["tag_nm"] : null; 
$tag_desc = $_POST["tag_desc"]!='\n' ? $_POST["tag_desc"] : null; 
$db_connect= new db("root","","","127.0.0.1");
$connect = $db_connect -> tag_query($tag_nm, $tag_desc);


//echo json_encode($connect);
echo '<table class="table table-hover" id="tag_inform">';
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
	echo '<tr id='.$var['tag_cd'].' ">';
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