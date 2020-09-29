<?php
$link=mysqli_connect("localhost","root","")or die("khong ket noi duoc MYSQL");
mysqli_select_db($link,"DULIEU");
$sql="select* from nhanvien";
$result=mysqli_query($link,$sql);
echo"<table border='1' width='100%'>";
echo"<caption>XOA THONG TIN NHAN VIEN</caption>";
echo"<tr><td align='center'>IDNV</td><td align='center'>Ho ten</td><td align='center'>IDPB</td><td align='center'>Dia chi</td><td align='center'>Xoa</td><tr>";
while ($row=mysqli_fetch_array($result)) {
	$idnv=$row['IDNV'];
	$hoten=$row['HoTen'];
	$idpb=$row['IDPB'];
	$diachi=$row['DiaChi'];
	echo"<tr><td align='center'>$idnv</td><td align='center'>$hoten</td><td align='center'>$idpb</td><td align='center'>$diachi</td><td align='center'><a href='xulyxoathongtinnv.php?IDNV=".$row['IDNV']."'>xxx</a></td></tr>";
}
echo"<table>";
?>