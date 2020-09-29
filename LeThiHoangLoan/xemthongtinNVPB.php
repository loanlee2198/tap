<?php
	//lấy mã phòng ban từ biến được gửi từ trang xemthontinPB.php
	$mapb=$_GET['IDPB'];
	//TẠO biến để kết nối với hệ cơ sở dữ liệu
	$link=mysqli_connect("localhost","root","") or die("khong the ket noi toi co so du lieu");
	//chọn hệ cở sở dữ liệu mà mình muốn truy cập
	mysqli_select_db($link,'dulieu');
	//chọn bảng(có điều kiện hoặc không có điều kiện) mà mình muốn làm việc 
	$sql= "select *from nhanvien where IDPB='$mapb' ";
	//kết quả trả về khi truy vấn là đây 
	$result = mysqli_query($link,$sql);
	// bắt đầu thao tác với kết quả trả về 
	if($mapb=='')
	{
		echo "ko co du lieu";
	}
	else 
	{
		echo "<table border='1' width='100%' >";
		echo "<captain<Du lieu ban nhan vien chia theo id phong ban</captain>";
		echo "<tr><th>IDNV</th><th>HoTen</th><th>IDPB</th><th>Dia chi</th></tr>";
		while ($row=mysqli_fetch_array($result)) 
		{
   	 		$IDNV=$row{'IDNV'};
    		$HoTen=$row{'HoTen'};
    		$IDPB=$row{'IDPB'};
    		$DiaChi=$row{'DiaChi'};
    		echo "<tr><td align='center'>$IDNV</td><td align='center'>$HoTen</td><td align='center'>$IDPB</td><td align='center'>$DiaChi</td></tr>";    		
		}
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