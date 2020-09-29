<!DOCTYPE html>
<html>
<head>
	<title>form cap nhat</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body onload="document.form2.m_textboxt2.focus()" bgcolor="#AADDEE" topmargin="15">
	<FORM name="form2" action="xulicapnhap_test.php" method="post">
	<table align="center">
		<caption>FORM CAP NHAT</caption>
		<?php
			$IDPB = isset($_GET['IDPB']) ? $_GET['IDPB'] : '';
			echo '<tr><td>IDPB: </td><td>'.$IDPB.'<input type="hidden" name="m_textboxt1" value="'.$IDPB.'"></td></tr>';
		?>
		<tr>'
			<td>Ten PB: </td>
			<td><input type="Text" name="m_textboxt2" size="15"></td>
		</tr>
		<tr>
			<td>Mo ta: </td>
			<td><input type="Text" name="m_textboxt3" size="15"></td>
		</tr>
		<tr align="center"><td colspan="3">
			<input type="Submit" name="m_capnhat" value="Cap nhat">
			<input type="Reset" name="m_reset" value="Reset">
		</td></tr>
	</table>
	</FORM>
</body>
</html>