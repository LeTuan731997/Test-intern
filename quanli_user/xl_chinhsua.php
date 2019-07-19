<?php 
	include('ket_noi.php');
	include('thaydoithongtin.php');
	if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
	    if ($_FILES['fileUpload']['error'] > 0){
	        $link = '../upload/no-image-news.png';
	      }
	    else {
	        move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../upload/' . $_FILES['fileUpload']['name']);
	        $link = '../upload/'. $_FILES['fileUpload']['name'];
	    }
	}
	$id= $_POST['id'];
	$gioitinh   = $_POST['txtSex'];
	$hoten = $_POST['txtFullname'];
	$ngaysinh   = $_POST['txtBirthday'];
	$qr = mysql_query("UPDATE nguoidung SET 
	    gioitinh = N'$gioitinh',
	    hoten = N'$hoten',
	    ngaysinh = N'$ngaysinh',
	    anh = '$link'
	    WHERE id = '$id'") or die("Lỗi truy vấn");
	if($qr){
		header("location:index.php");
	}
 ?>