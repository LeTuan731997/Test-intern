<?php 
	$id = $_GET['id'];
	include('ket_noi.php');
	$hu = mysql_query("delete from nguoidung where  id ='$id'") or die("Lỗi rồi");
	if ($hu) {
		header("location: index.php");
	}
 ?>