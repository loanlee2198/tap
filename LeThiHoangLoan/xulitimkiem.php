<?php
	// gán dữ liệu đã gửi lên từ url cho các biến cố định, dễ sử dùng sau này
	$IDNV=$_POST['txtmanv'];
	$HoTen=$_POST['txthoten'];
	
		//bắt đầu code
		//tạo biến để kết nối với hệ cơ sở dữ liệu
		$link=mysqli_connect("localhost","root","");
		// chọn cơ sở dữ liệu để thao tác trong hệ cơ sở dữ liệu
		mysqli_select_db($link,'dulieu');
		//chọn bảng mà ta muốn thao tác với cơ sở dữ liệu đó
		$sql= "select *from nhanvien where IDNV='$IDNV' and HoTen='$HoTen'";
		// trả về kết quả là các bảng ghi / hàng 
		$result=mysqli_query($link,$sql);
		//tạo biến hàng để lấy giá trị số hàng mà kết quả trả về được 
		$rows=mysqli_num_rows($result);
		if($rows=='0')
		{
				echo "<h2 align='center'>Không có danh sách nhân viên cần tìm !</h2>";
				echo "<h2 align='center'><br><a href='timkiem.php'>Thử lại</a></h2>";
		}
		else 
		{
			echo "<table border='1' width='100%' >";
			echo "<h1 align='center'>Danh sách nhân viên được tìm thấy </h1>";
			//echo "<caption>Danh sach nhan vien duoc tim thay</caption>";
			echo "<tr><td align='center'>IDNV</td><td align='center'>HoTen</td><td align='center'>IDPB</td><td align='center'>DiaChi</td></tr>";
			while($row=mysqli_fetch_array($result))
			{
				$IDNV=$row{'IDNV'};
				$Hoten=$row{'HoTen'};
				$IDPB=$row{'IDPB'};
				$DiaChi=$row{'DiaChi'};
				echo "<tr><td align='center'>$IDNV</td><td align='centesr'>$Hoten</td><td align='center'>$IDPB</td><td align='center'>$DiaChi</td></tr>";
			}
			echo "</table>";
		}
	
	
	//giải phóng biến kết quả để cho nhẹ máy và để tái sử dụng tên result
		mysqli_free_result($result);
		// đóng kết nối với hệ cơ sở dữ liệu 
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