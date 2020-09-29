<?php

$link=mysqli_connect("localhost","root","")or die("khong the ket noi den co so du lieu MySQL");
mysqli_select_db($link,"DULIEU");
if(isset($_POST['choice'])){
	foreach ($_POST['choice'] as $value) {
		
		$rs=mysqli_query($link,"DELETE FROM nhanvien WHERE IDNV=$value");
}
}
header("Location:xoatatca.php");
mysqli_free_result($rs);
mysqli_close($link);

?>