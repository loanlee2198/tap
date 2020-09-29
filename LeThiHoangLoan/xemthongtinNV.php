<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Document</title>

    <?php
$link=mysqli_connect("localhost","root","") or die ("Khong the ket noi csdl mysql");
mysqli_select_db($link,'DULIEU');
$sql='select *from nhanvien';
$result=mysqli_query($link,$sql);
echo "<table border='1' width='100%' text>";
echo "<h1 align='center'> Dữ liệu bảng nhân viên</h1>";
//echo "<caption>Du lieu bang nhan vien</caption>";
echo "<tr><th>IDNV</th><th>HoTen</th><th>IDPB</th><th>Dia chi</th></tr>";
while($row=mysqli_fetch_array($result)){
    $IDNV=$row{'IDNV'};
    $HoTen=$row{'HoTen'};
    $IDPB=$row{'IDPB'};
    $DiaChi=$row{'DiaChi'};
    echo "<tr><td align='center'>$IDNV</td><td align='center'>$HoTen</td><td align='center'>$IDPB</td><td align='center'>$DiaChi</td></tr>";
}
echo "</table>";
mysqli_free_result($result);
mysqli_close($link);
?>

</head>
<body bgcolor=#BBFFCC>		
	
</body>
</html>