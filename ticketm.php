<html>
<head>
<script>
function home()
{
window.location.href="index1.php";
}
function pass1()
{
window.location.href="ticket.html";
}
function pass2()
{
window.location.href="bus.html";
}

</script>
<style>

#mn{
background-color: white;
}
#d1
{
background-color: white;
box-shadow: 1px 5px 8px black;
height: 200px;
width: 175px;
cursor: pointer;
border-radius: 10px;
transition: all 0.3s ease;
}
#d1:hover{
transform: scale(1.1);
color: red;
}
body{

background-color: lightgreen;
}
#hb{
width: 1023px;
height: 90px;
background-color: red;

position: absolute;
top: -1.7%;
left: -0.9%;
box-shadow: 1px 1px 2px black;
}


</style>
</head>

<body>
<img src="ticketm.jpg" height=540.4px; width=1022.5px; style="position: absolute; top: 0%; left: 0%; ">


<center>
<div>
<p style="font-family: Freestyle Script; color:white; position: absolute; top:-10%; left: 41.5%; font-size:60px; color:white; cursor: pointer; text-shadow: 2px 2px 3px black;" onclick="home()" >TicketWise.</p>
<br><br><br><p style=" color: black; font-family: dubai; font-size:38px; 
 width: 450px; padding: 2px; border-radius:15px; box-shadow: 2px 2px 6px black; padding-left: 10px; padding-right: 10px; position: absolute; top: 10%; left: 27.5%;" id="mn">BOOK YOUR TICKET NOW!</p>
<center><p style="font-size: 22.5px; font-family: Footlight MT; position: absolute; top:28%; left:32%;  ">Make your travel hastle free with Tickets </p></center>
<br><br><div id="d1" style="position: absolute; left:28%; top:47.5%" onclick="pass1()">
<img src="ticket.png" height=145px; width=172.5px; style="position: relative; top:4.5%; left: 1%;" >
<p style=" position: absolute; top: 67%; left: 26.5%; font-size: 25px; font-weight: bold;">Tickets</p></div> 
<div id="d1" style="position: absolute; left:55%; top:47.5%" onclick="pass2()">
<img src="bus.png" height=135px; width=130px; style="position: relative; top: 7%; left: -1%;" >
<p style=" position: absolute; top: 70%; left: 31.5%; font-size: 23px; font-weight: bold;">Busses</p></div> 
</div>
</center>
<center><span style="font-family: dubai;  background-color: white; border-width: 2.5px; border-color: white; font-size: 30px; border-bottom-left-radius:15px; border-bottom-right-radius:15px; padding: 15px; padding-bottom: 10px; position: absolute; left: 47.5%; top: 120%; box-shadow: 0.2px 1.5px 3px black;">TICKETS</span></center>
</body>
</html>
<?php
$con = mysqli_connect("localhost","root","","project");
$nm = mysqli_query($con,"SELECT name FROM active");
$name = mysqli_fetch_row($nm);
$res = mysqli_query($con,"SELECT * FROM ticket WHERE name='$name[0]'");
echo "<div style='position: absolute; top: 120%; left: 25%; border: 2.5px solid black; padding: 50px; padding-left: 150px; padding-right: 150px; padding-top: 110px; border-radius: 10px;'>";
while($det = mysqli_fetch_row($res))
{
    $fr = $det[2];
    $to = $det[3];
    $p = explode("-",$det[4]);
    $amt = mysqli_query($con,"SELECT amt FROM route WHERE ((deprt='$fr')and(dest='$to'))or((deprt='$to')and(dest='$fr'))");
    $a = mysqli_fetch_row($amt);
    $h = $a[0]/2;
    $h1 = floor($h);
    $f1 = ($a[0]*$p[0]);
    $hf = ($h1*$p[1]);
    echo "<center><div style = 'background-color: white; border-radius: 15px; width: 250px; padding: 20px; box-shadow: 1px 3px 6px black; position: relative; top: 20%; '>
<center><span style = 'font-family: calibri; font-size: 20px; font-weight: bold;'>TicketWise.com</span></center>
<br><center><span style = 'font-family: calibri; font-size: 15px; font-weight: bold;'>$det[6]</span></center>
<br><center><span style = 'font-family: calibri; font-size: 15px; font-weight: bold;'>$det[2] to $det[3]</span></center>
<br><center><span style = 'font-family: calibri; font-size: 15px; font-weight: bolder;'>AMT</span></center>
<center><span style = 'font-family: calibri; font-size: 15px; font-weight: bold;'>FULL: $a[0] X $p[0] = $f1 <br> HALF: $h1 X $p[1] = $hf <br>TOTAL: $det[5] </span></center>
<br><center><span style = 'font-family: calibri; font-size: 15px; font-weight: bold;'>BUS:<br>";
$rno = mysqli_query($con,"SELECT rid FROM route WHERE ((deprt='$fr')and(dest='$to'))or((deprt='$to')and(dest='$fr'))");
$rn = mysqli_fetch_row($rno);
$bn = mysqli_query($con,"SELECT bno FROM bus_route WHERE rid=$rn[0]");
while($bno = mysqli_fetch_row($bn))
{
    echo $bno[0]."&nbsp";
}
echo "</span></center>
<br><center><span style = 'font-family: calibri; font-size: 15px; font-weight: bold;'>Valid Upto:</span><span style = 'font-family: calibri; color: red; font-size: 15px; '> $det[7]</span></center>
</div></center><br><br>";
}
echo "</div>";
mysqli_close($con);
?>
