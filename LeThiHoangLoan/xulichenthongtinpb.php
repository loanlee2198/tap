<?php
$IDPB=$_POST['IDPB'];
$TenPB=$_POST['TenPB'];
$Mota=$_POST['Mota'];
if($IDPB==""||$TenPB==""||$Mota==""){
	header("Location:chenthongtinpb.php");
}
else
{
	$link=mysqli_connect("localhost","root","")or die("Khong the ket noi toi MYSQl");
	mysqli_select_db($link,"DULIEU");
	$rs=mysqli_query($link,"SELECT * FROM phongban where IDPB=$IDPB");
	if(mysqli_num_rows($rs)){
		die("Khong the chen do ma IDPB nay da ton tai");

	}
	else{
		$rs1=mysqli_query($link,"INSERT INTO phongban values($IDPB,'$TenPB','$Mota')");
		header("Location:xemthongtinpb.php");
	}
	mysqli_free_result($rs);
	mysqli_free_result($rs1);
	mysqli_close($link);
}
?>