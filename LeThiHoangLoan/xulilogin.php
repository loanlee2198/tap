<?php
    $user = $_POST['username'];
    $password = md5($_POST['password']);
    if($user == "" || $password == "")
    {
        header('Location:login.php');
    } else
    {
        $link = mysqli_connect("localhost", "root", "") or die ("Couldn't connect".mysqli_error());
        mysqli_select_db($link, 'dulieu');
        $db_selected ="select * from admin where username='$user'";
        $rs = mysqli_query($link,$db_selected );
        $row = mysqli_fetch_array($rs);
        if($row['password'] == $password)
        {
    		header('Location: danhsach.php');
        } else
       
        {
    	   echo "<h2 align='center'>Wrong username or password</h2>";
    	   echo "<h2 align='center'><a href='login.php' >Thử lại</a></h2>";
        }
    }
    mysqli_free_result($rs);
    mysqli_close($link);
?>
