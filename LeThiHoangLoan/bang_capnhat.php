<?php
$link=mysqli_connect("localhost","root","") or die("Khong the ket noi csdl mysql ");
mysqli_select_db($link,'DULIEU');
$sql='select *from phongban';
$result=mysqli_query($link,$sql);
echo "<table border='1' width='100%' text>";
//Tiêu đề của bảng trên web
echo "<h1 align='center'> Danh sách phòng ban</h1>";
//echo "<caption>Du lieu bang phong ban</caption>";
// các trường / cột hiển thị trên bảng 
echo "<tr><th>IDPB</th><th>TenPB</th><th>MoTa</th><th>Cap nhap</th></tr>";
//Hiển thị từng hàng 
while ($row=mysqli_fetch_array($result)) {
    $IDPB=$row{'IDPB'};
    $TenPB=$row{'TenPB'};
    $MoTa=$row{'MoTa'};
    echo "<tr><td align='center'>$IDPB</td><td align='center'>$TenPB</td><td align='center'>$MoTa</td><td align='center'><a href='form_capnhap.php?IDPB=$IDPB'>XXX</a></td></tr>";
}
echo "</table>";
mysqli_free_result($result);
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body bgcolor=#BBFFCC>		
	
</body>
</html>