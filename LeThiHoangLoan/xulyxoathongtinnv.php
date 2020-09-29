<?php
$idnv=$_REQUEST['IDNV'];
$link=mysqli_connect("localhost","root","")or die("khong the ket noi co so du lieu toi MYSQL");
mysqli_select_db($link,"DULIEU");
$rs=mysqli_query($link,"DELETE FROM nhanvien WHERE IDNV=$idnv");
if(!$rs)die("khong the thuc hien cau lenh ");
    header("Location:xemthongtinnv.php");
mysqli_free_result($rs);
mysqli_close($link);
?>