<html>
<head>
<script>
function ticket()
{
window.location.href="ticketm.php";
}
</script>

<style>
    body{
            background: url('ticket1.jpg');
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover;
        
        }
#wrp{
background: transparent;
backdrop-filter: blur(7px);
background-color: rgba(255,255,255,0.2);
border-width: 10px; 
border-radius: 10px;
border-color: black;
width: 450px;
height: 520px;
box-shadow: 1px 1px 3px black;
padding: 30px;
}
#pd{
border: 2px solid black;
padding: 20px;
border-radius: 10px;
}
#l1{
height: 160px;
width: 1.5px;
background-color: black;
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

<center><div id="wrp">

<br><br><div id="pd"><span style="font-family: calibri; font-size: 22px; color: white; font-weight: solid; position: absolute; left:17%; text-shadow: 1.5px 1.5px 1.5px black;">From:</span> <span style="font-family: calibri; font-size: 20px; color: black; position: absolute; left:29%; "><?php echo $_POST['from']; ?></span>
<span style="font-family: calibri; font-size: 22px; color: white; font-weight: solid; position: absolute; left:51.5%; text-shadow: 1.5px 1.5px 1.5px black;">To:</span> <span style="font-family: calibri; font-size: 20px; color: black; position: absolute; left:58%; "><?php echo $_POST['to']; ?></span>
<br><br><span style="font-family: calibri; font-size: 22px; color: white; font-weight: solid; position: absolute; left:17%; text-shadow: 1.5px 1.5px 1.5px black;">Bus:</span> <span style="font-family: calibri; font-size: 22px; color: black; position: absolute; left:25%; ">
<?php 
$fr = $_POST['from'];
$to = $_POST['to'];
$con = mysqli_connect("localhost","root","","project");
$rno = mysqli_query($con,"SELECT rid FROM route WHERE ( deprt='$fr' AND dest='$to')or( dest='$fr' AND deprt='$to')");
$rn = mysqli_fetch_row($rno);
$bno = mysqli_query($con,"SELECT bno FROM bus_route WHERE rid=$rn[0]");
while($bn = mysqli_fetch_row($bno)){
    echo "&nbsp&nbsp&nbsp&nbsp<span style='padding:3px; border: 2px solid white; border-radius:5px;'><span>$bn[0]</span></span>";
    echo "\t";
}
mysqli_close($con);
?>
</span>
<br><br><span style="font-family: calibri; font-size: 22px; color: white; font-weight: solid; position: absolute; left:17%; text-shadow: 1.5px 1.5px 1.5px black;">Amt:</span><span style="font-family: calibri; font-size: 22px; color: black; position: absolute; left:27.5%; ">
<?php
$adt = $_POST['adult'];
$chl = $_POST['child'];
$fr = $_POST['from'];
$to = $_POST['to'];
$con = mysqli_connect("localhost","root","","project");
$amt = mysqli_query($con,"SELECT amt FROM route WHERE ( deprt='$fr' AND dest='$to')or( dest='$fr' AND deprt='$to')");
$am = mysqli_fetch_row($amt);
$h = $am[0]/2;
$h1 = floor($h);
$t = (($adt*$am[0])+($h1*$chl));
echo "FULL:".$adt."X".$am[0]." HALF:".$chl."X".$h1." Total=".$t;
mysqli_close($con);
?>
</span>
<br><br><span style="font-family: calibri; font-size: 22px; color: white; font-weight: solid; position: absolute; left:17%; text-shadow: 1.5px 1.5px 1.5px black; ">TicketOn:</span><span style="font-family: calibri; font-size: 22px; color: black; position: absolute; left:35%; ">
<?php
echo date('d-m-y')." ".date('H:i:s');
?></span>
<br><br><span style="font-family: calibri; font-size: 22px; color: white; font-weight: solid; position: absolute; left:17%; text-shadow: 1.5px 1.5px 1.5px black;">ValidTo:</span><span style="font-family: calibri; font-size: 22px; color: black; position: absolute; left:35%; ">
<?php
$h = date('H');
$h1 = $h+2;
echo date('d-m-y')." ".$h1.":".date('i:s');
?></span>
<br></div>
<span style="font-family: dubai; font-size: 25px; background-color: white; padding: 2px; border-radius: 15px; position: absolute; top: 7%; left: 30.5%;">TICKET PAYMENT</span>
<img src="qrs.png" height=130px; width=130px; style="position: absolute; top: 53.5%; left: 15%; ">
<div id="l1" style="position: absolute; left: 50%; top: 52%;"></div>
<span style="color: black; font-size: 18px; font-family: calibri; font-weight: bold; position: absolute; top: 79%; left: 14%;">Scan this QR code<br>   using any UPI </span>
<span style="color: black; font-size: 18px; font-family: calibri; position: absolute;font-weight: bold; top: 55%; left: 67.5%;">UPI App:</span>
<a href="https://pay.google.com/about/" style="position: absolute; left: 53%; top: 63%;"><img src="gpay.png" height=50px;></a>
<a href="https://www.phonepe.com/" style="position: absolute; left: 67.5%; top: 63%;"><img src="phonepe1.png" height=50px;></a>
<a href="https://paytm.com/" style="position: absolute; left: 80%; top: 63%;"><img src="paytm1.png" height=48px; width=75px;></a>
<button id="btn" style="position: absolute; bottom: 4.5%; left: 35%;" onclick="ticket()">Done</button>
</div></center>
</body>
</html>
<?php
$fr = $_POST['from'];
$to = $_POST['to'];
$adult = $_POST['adult'];
$child = $_POST['child'];
$passenger = $adult."-".$child;
$con = mysqli_connect("localhost","root","","project");
$amt = mysqli_query($con,"SELECT amt FROM route WHERE ( deprt='$fr' AND dest='$to')or( dest='$fr' AND deprt='$to')");
$am = mysqli_fetch_row($amt);
$h = $am[0]/2;
$h1 = floor($h);
$t = (($adt*$am[0])+($h1*$chl));
$h = date('H');
$h1 = $h+2;
$valid =date('d-m-y')." ".$h1.":".date('i:s');
$ticketon =date('d-m-y')." ".date('H:i:s');
$n1 = mysqli_query($con,"SELECT * FROM active");
$name = mysqli_fetch_row($n1);
$rn = mysqli_query($con,"SELECT * FROM TICKET");
$tid=1;
while($r=mysqli_fetch_row($rn))
{
    $tid++;
}
mysqli_query($con,"INSERT INTO ticket VALUES($tid,'$name[1]','$fr','$to','$passenger',$t,'$ticketon','$valid')");
$pno=0;
$ans = mysqli_query($con,"SELECT * FROM payment");
while($ans1 = mysqli_fetch_row($ans))
{
    $pno++;
}
mysqli_query($con,"INSERT INTO payment VALUES($pno,'$name[1]',$t,'$ticketon')");

mysqli_close($con);

?>