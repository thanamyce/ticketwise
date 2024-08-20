<?php
session_start();
$_SESSION['login']=null;
$con = mysqli_connect("localhost","root","","project");
$res=mysqli_query($con,"DELETE from active");
mysqli_close($con);
if($res)
{
header('Location:index1.php');
}
?>