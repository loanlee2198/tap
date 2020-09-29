<?php
	$link = mysqli_connect("localhost","root","") or die('Could not connect '.mysqli_error());
	mysqli_select_db($link,"DULIEU");
	$IDPB = $_POST['m_textboxt1'];
    $Tenpb= $_POST['m_textboxt2'];
    $Mota = $_POST['m_textboxt3'];
    if($Tenpb==""&&$Mota=="")
    {
    	header('Location:bang_capnhat.php');
    }
    else if($Tenpb=="")
    {
    	$rs = mysqli_query($link,"UPDATE phongban set MoTa='$Mota' where IDPB='$IDPB'");
    	header('Location:bang_capnhat.php');
    }
    else if($Mota=="")
    {
    	$rs = mysqli_query($link,"UPDATE phongban set TenPB='$Tenpb' where IDPB='$IDPB'");
    	header('Location:bang_capnhat.php');
    }
    else
    {
    	$rs = mysqli_query($link,"UPDATE phongban set TenPB='$Tenpb',MoTa='$Mota' where IDPB='$IDPB'");
    	header('Location:bang_capnhat.php');
    }
?>