<html>
<head>
<script>    
function home()
{
window.location.href="index1.php";
}
function pass1()
{
window.location.href="pass1.html";
}
function pass2()
{
window.location.href="pass2.html";
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
width: 1015px;
height: 140px;
background-color: red;
border-bottom-left-radius: 150px;
border-bottom-right-radius: 150px;
position: absolute;
top: -1.7%;
left: -0.9%;
box-shadow: 1px 5px 4px black;
}


</style>
</head>

<body>
<img src="passm.jpg" height=540.4px; width=1022.5px; style="position: absolute; top: 0%; left: 0%; ">

<center>
<div>
<p style="font-family: Freestyle Script; color:white; position: absolute; top:-9%; left: 41.5%; font-size:60px; color:white; cursor: pointer; text-shadow: 2px 2px 3px black;" onclick="home()" >TicketWise.</p>
<br><br><br><p style=" color: black; font-family: dubai; font-size:40px; 
 width: 450px; padding: 2px; border-radius:15px; box-shadow: 2px 2px 6px black; padding-left: 10px; padding-right: 10px; position: absolute; top: 10%; left: 27.5%;" id="mn">SELECT YOUR BUS PASS  </p>
<center><p style="font-size: 22.5px; font-family: Footlight MT; position: absolute; top:28%; left:32%; color: black;">Make your travel hastle free with passes </p></center>
<br><br><div id="d1" style="position: absolute; left:28%; top:47.5%" onclick="pass1()">
<img src="time1.png" height=160px; width=165px; style="position: relative; top: 5.5%; left: -3%;" >
<p style=" position: absolute; top: 67%; left: 18%; font-size: 25px; font-weight: bold;">Daily Pass</p></div> 
<div id="d1" style="position: absolute; left:55%; top:47.5%" onclick="pass2()">
<img src="time2.png" height=145px; width=150px; style="position: relative; top: 10%; left: -3%;" >
<p style=" position: absolute; top: 70%; left: 13%; font-size: 23px; font-weight: bold;">Monthly Pass</p></div> 
</div>
</center>
<center><span style="font-family: dubai;  background-color: white; border-width: 2.5px; border-color: white; font-size: 30px; border-bottom-left-radius:15px; border-bottom-right-radius:15px; padding: 15px; padding-bottom: 10px; position: absolute; left: 45.5%; top: 120%; box-shadow: 0.2px 1.5px 3px black;">PASSES</span></center>
</body>
</html>

<?php
$con = mysqli_connect("localhost","root","","project");
$nm = mysqli_query($con,"SELECT name FROM active");
$name = mysqli_fetch_row($nm);
$res = mysqli_query($con,"SELECT * FROM p_udetail where name = '$name[0]'");
$res1 = mysqli_query($con,"SELECT * FROM monthly_pass where name = '$name[0]'");
echo "<div style='position: absolute; top: 120%; left: 25%; border: 2.5px solid black; padding: 50px; padding-left: 100px; padding-right: 100px; padding-top: 110px; border-radius: 10px;'>";
while( $det = mysqli_fetch_row($res))
{
$p = mysqli_query($con,"SELECT * FROM pass WHERE pid=$det[0]");
$pass =  mysqli_fetch_row($p);
echo "<center><div style = 'background-color: white; border-radius: 15px; width: 250px; padding: 20px; box-shadow: 1px 3px 6px black; position: relative; top: 20%; '>
<center><span style = 'font-family: calibri; font-size: 20px; font-weight: bold;'>TicketWise.com</span></center>
<br><center><span style = 'font-family: calibri; font-size: 15px; font-weight: bold;'>$det[5]</span></center>
<br><center><span style = 'font-family: calibri; font-size: 15px; font-weight: bold;'>Daily Pass $pass[1]/-</span></center>
<br><center><span style = 'font-family: calibri; font-size: 15px; font-weight: bold;'>$pass[3]</span></center>
<br><center><span style = 'font-family: calibri; font-size: 15px; font-weight: bold;'>ID No.</span><span style = 'font-family: calibri; font-size: 15px; '>$det[3]</span></center>
<br><center><span style = 'font-family: calibri; font-size: 15px; font-weight: bold;'>$det[4]</span></center>
<br><center><span style = 'font-family: calibri; font-size: 15px; font-weight: bold;'>Amt = Rs.</span><span style = 'font-family: calibri; font-size: 15px; '>$pass[1]</span></center>
<br><center><span style = 'font-family: calibri; font-size: 15px; font-weight: bold;'>Valid Upto:</span><span style = 'font-family: calibri; font-size: 15px; color: red; '>$det[2]</span></center>
</div></center><br><br>";
}
while( $det1 = mysqli_fetch_row($res1))
{
    $p1 = mysqli_query($con,"SELECT * FROM pass WHERE pid=$det1[0]");
    $pass1 =  mysqli_fetch_row($p1); 
    echo "<center><div style='background-color: white; border-radius: 15px; width: 250px; padding: 30px; padding-left: 50px; padding-right: 50px; box-shadow: 1px 3px 6px black; position: relative; top: 20%;'>
    <center><span style = 'font-family: calibri; font-size: 20px; font-weight: bold;'>TicketWise.com</span></center>
    <center><span style = 'font-family: calibri; font-size: 19px; font-weight: bold;'>$pass1[4]</span></center>
    <img src='$det1[6]' height=90px; width=90px; style='position: absolute; left: 7.5%; top:44%; border-radius: 5px; box-shadow: 1.2px 3px 3px black;'>
    <br><span style = 'font-family: calibri; font-size: 15px; font-weight: bold; position: absolute; left:38%;'>Name: </span>
    <span style = 'font-family: calibri; font-size: 15px; position: absolute; left: 58%;'>$det1[2]</span>
    <br><span style = 'font-family: calibri; font-size: 15px; font-weight: bold; position: absolute; left:38%;'>User ID: </span>
    <span style = 'font-family: calibri; font-size: 15px; position: absolute; left: 58%;'>$det1[3]</span>  
    <br><span style = 'font-family: calibri; font-size: 15px; font-weight: bold; position: absolute; left:38%;'>Amount: </span>
    <span style = 'font-family: calibri; font-size: 15px; position: absolute; left: 58%;'>$pass1[1]</span>
    <br><span style = 'font-family: calibri; font-size: 15px; font-weight: bold; position: absolute; left:38%;'>Pass on:</span>
    <span style = 'font-family: calibri; font-size: 15px; position: absolute; left: 58%;'>$det1[4]</span> 
    <br><span style = 'font-family: calibri; font-size: 15px; font-weight: bold; position: absolute; left:38%;'>Valid to:</span>
    <span style = 'font-family: calibri; color: red; font-size: 15px; position: absolute; left: 58%;'>$det1[5]</span><br>
    </div></center><br><br>";
}
echo "</div>";

mysqli_close($con);
?>



