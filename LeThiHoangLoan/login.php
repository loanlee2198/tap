<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<style type="text/css" media="screen">
		.cha {
                width:500px;
                height:500px;
		}
	</style>
</head>
<body bgcolor=#BBFFCC>
	<div class="cha">
		<form action="xulilogin.php" method="post">
		<table  align="center">
			<caption>LOGIN</caption>
			
				<tr>
					<th>Username</th>
					<th><input type="text" name="username" >
				</tr>
			
			
				<tr>
					<th>Password</th>
					<td ><input type="text" name="password" ></td>
				</tr>
				<tr>
					<td><input type="submit" name="" value="Submit"></td>
					<td><input type="reset" value="Reset"></td>

				</tr>
			
		</table>	
		</form>
	</div>
</body>
</html>