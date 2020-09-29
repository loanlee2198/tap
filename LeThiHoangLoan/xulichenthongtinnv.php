<?php
$IDNV=$_POST['IDNV'];
$HoTen=$_POST['HoTen'];
$IDPB=$_POST['IDPB'];
$DiaChi=$_POST['DiaChi'];
if($IDNV==""||$HoTen==""||$IDPB==""||$DiaChi==""){
	header("Location:chenthongtinnv.php");
}
else{
	$link=mysqli_connect("localhost","root","")or die("khong the ket noi toi mysql");
    mysqli_select_db($link,"DULIEU");
    $rs1=mysqli_query($link,"SELECT * FROM nhanvien where IDNV=$IDNV");
    $rs2=mysqli_query($link,"SELECT * FROM phongban where IDPB=$IDPB");
    if(mysqli_num_rows($rs1)!=0){
    	//header("Location:chenthongtinnv.php");
    	die("Ma IDNV nay da co");
    }
    if(mysqli_num_rows($rs2)==0){
        //header("Location:chenthongtinnv.php");
        die("Không tồn tại mã IDPB này");
    }
    $rs=mysqli_query($link,"INSERT INTO nhanvien values($IDNV,'$HoTen',$IDPB,'$DiaChi')");
    if(!$rs)die("Khong the chen");
    else
    {
	    header("Location:xemthongtinnv.php");
    }
    mysqli_free_result($rs);
    mysqli_close($link);
}

?>