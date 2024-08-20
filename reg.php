<html>
<head>
<style>
#wrp{
background: transparent;
backdrop-filter: blur(7px);
background-color: rgba(255,255,255,0.2);
border-width: 10px; 
border-radius: 10px;
border-color: black;
width: 355px;
height: 398px;
box-shadow: 1px 1px 3px black;
padding: 35px;
}
#i1{
position: absolute;
top:0%;
left:0%;
}
#inp{
background: transparent;
backdrop-filter: blur(7px);
background-color: rgba(255,255,255,1.5);
border-color:white;
border-radius: 10px;
width: 100%;
height: 35px;
color: black;
padding: 10px;
}
#btn{
height: 42px;
width: 80px;
background: transparent;
backdrop-filter: blur(7px);
background-color: background-color: rgba(255,255,255,0.4);
border-width: 2px;
border-color: black;
font-size:20px;
color: black;
border-radius:5px;
box-shadow: 0px 1px 0px black;
padding-left: 10px;
padding-right: 10px;

}
</style>
</head>
<body>
<img src="reg.jpg" height=540.4px; width=1022.8px; id="i1">
<center>
<br><div id="wrp">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<span style="font-family: Gadugi; color: white; font-size:36px; font-weight: bold; position: relative; top: -3%; text-shadow: 1px 1px 1px black;  " >Registration</span>
<br><br><input type="text" name="nm" placeholder="Name" id="inp" required>     
<br><br><input type="textarea" name="add" placeholder="Address" id="inp" required>
<br><br><span style="font-size:23px; ">Gender:</span> 
<br><input type="radio" name="gen" value="male"><span style="font-size:20px; ">Male</span>    &nbsp&nbsp<input type="radio" name="gen" value="female"><span style="font-size:20px; ">Female</span> 
<br><br><input type="text" name="mob" placeholder="Mob No." id="inp" required>    
<br> <br><input type="text" name="pass" placeholder="Password" id="inp" required>
<br><br><br><input type="submit" id="btn" name="submit" style="position:relative; left: -8.5%;">  <input type="reset" id="btn" name="Reset" style="position: relative; left:5%;">
</form>
</div>
</body>
</html>  
<?php
if(isset($_POST['submit']))
{
$nm=$_POST['nm'];
$gen=$_POST['gen'];
$add=$_POST['add'];
$mob=$_POST['mob'];
$pass=$_POST['pass'];
$con=mysqli_connect("localhost","root","","project");
mysqli_query($con,"INSERT INTO udetail VALUES('$nm','$gen','$add',$mob,'$pass')");
mysqli_close($con);
echo '<script>alert("Username: "+$nm+"Password: "+$pass);</script>';
header('Location:log.php');
}
?>
   
