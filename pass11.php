<html>
<head>
<script>
function pass()
{
window.location.href="pass.php";
}
</script>

<style>
#wrp{
background: transparent;
backdrop-filter: blur(7px);
background-color: rgba(255,255,255,0.2);
border-width: 10px; 
border-radius: 10px;
border-color: black;
width: 450px;
height: 445px;
box-shadow: 1px 1px 3px black;
padding: 30px;
}
#pd{
border: 2px solid white;
padding: 20px;
border-radius: 10px;
}
#l1{
height: 160px;
width: 1.5px;
background-color: white;
}
#btn{
height: 35px;
width:150px;
background-color: white;
color: black;
border-color: black;
font-family: dubai;
font-size: 15px;
border-width: 2px;
border-radius: 10px;
font-weight: bold;
cursor: pointer;
}
</style>
</head>
<body>
<img src="head1.jpg" height=540.4px; width=1022.8px; style="position: absolute; top: 0%; left: 0%; ">
<center><div id="wrp">

<br><br><div id="pd"><span style="font-family: calibri; font-size: 22px; color: white; font-weight: solid; position: absolute; left:10%; ">User ID:</span> <span style="font-family: calibri; font-size: 22px; color: black; position: absolute; left:25%; "><?php echo $_POST['uid']; ?></span>
<span style="font-family: calibri; font-size: 22px; color: white; font-weight: solid; position: absolute; left:42%; ">Pass on:</span> <span style="font-family: calibri; font-size: 22px; color: black; position: absolute; left:57%; "><?php echo date('m-d-y')." ".date('H:i:s'); ?></span>
<br><br><span style="font-family: calibri; font-size: 22px; color: white; font-weight: solid; position: absolute; left:10%; ">Gen:</span> <span style="font-family: calibri; font-size: 22px; color: black; position: absolute; left:25%; "><?php echo $_POST['gen']; ?></span>
<span style="font-family: calibri; font-size: 22px; color: white; font-weight: solid; position: absolute; left:42%; ">Valid to:</span> <span style="font-family: calibri; font-size: 22px; color: black; position: absolute; left:57%; "><?php echo date('m-d-y')." "."23:59:59"; ?></span>
<br><br><span style="font-family: calibri; font-size: 22px; color: white; font-weight: solid; position: absolute; left:10%; ">Pass:</span> <span style="font-family: calibri; font-size: 22px; color: black; position: absolute; left:25%; "><?php echo $_POST['pass']; ?></span>
<br></div>
<span style="font-family: dubai; font-size: 25px; background-color: white; padding: 2px; border-radius: 15px; position: absolute; top: 8%; left: 32.5%;">PASS PAYMENT</span>
<img src="qrs.png" height=130px; width=130px; style="position: absolute; top: 47%; left: 15%; ">
<div id="l1" style="position: absolute; left: 50%; top: 44.5%;"></div>
<span style="color: white; font-size: 18px; font-family: calibri; position: absolute; top: 76%; left: 15%;">Scan this QR code<br>   using any UPI </span>
<span style="color: white; font-size: 18px; font-family: calibri; position: absolute; top: 52%; left: 67.5%;">UPI App:</span>
<a href="https://pay.google.com/about/" style="position: absolute; left: 53%; top: 61%;"><img src="gpay.png" height=50px;></a>
<a href="https://www.phonepe.com/" style="position: absolute; left: 67.5%; top: 61%;"><img src="phonepe1.png" height=50px;></a>
<a href="https://paytm.com/" style="position: absolute; left: 80%; top: 61%;"><img src="paytm1.png" height=48px; width=75px;></a>
<button id="btn" style="position: absolute; bottom: 4.5%; left: 35%;" onclick="pass()">Done</button>
</div></center>
</body>
</html>
<?php
$uid = $_POST['uid'];
$pass = $_POST['pass'];
$gen = $_POST['gen'];
$passon = date('m-d-y')." ".date('H:i:s');
$valid = date('m-d-y')." "."23:59:59";
switch($pass)
{
case "P.M.C 40/-": $pid = 1;
break;
case "P.C.M.C 40/-": $pid = 2;
break;
case "P.M.C&P.C.M.C 50/-": $pid = 3;
break;
case "Senior Citizen 40/-": $pid = 4;
break;
}
$con = mysqli_connect("localhost","root","","project");
$n1 = mysqli_query($con,"SELECT * FROM active");
$name = mysqli_fetch_row($n1);
mysqli_query($con,"INSERT INTO p_udetail VALUES($pid,'$name[1]','$valid',$uid,'$gen','$passon')");
$pno=0;
$ans = mysqli_query($con,"SELECT * FROM payment");
while($ans1 = mysqli_fetch_row($ans))
{
    $pno++;
}
$a = mysqli_query($con,"SELECT price FROM pass WHERE pid=$pid");
$amt = mysqli_fetch_row($a);
mysqli_query($con,"INSERT INTO payment VALUES($pno,'$name[1]',$amt[0],'$passon')");
mysqli_close($con);
?>


