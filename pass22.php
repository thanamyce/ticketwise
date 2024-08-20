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
border: 2px solid black;
padding: 22.5px;
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
body{
background: url('mpass.jpg');
background-position: center; /* Center the image */
background-repeat: no-repeat; /* Do not repeat the image */
background-size: cover;
}
</style>
</head>
<body>
<
<center><div id="wrp">

<br><br><div id="pd">
    <img src="<?php echo $_FILES["image"]["name"]; ?>" height=90px; width=90px; style="position: absolute; left: 12%; border-radius: 5px; box-shadow: 1.2px 3px 3px black;">
    <span style="font-family: calibri; font-size: 20px; color: white; font-weight: solid; position: absolute; left:35%; text-shadow: 1px 1px 1px black;">Full Name:</span> 
    <span style="font-family: calibri; font-size: 20px; color: black; font-weight: solid; position: absolute; left:55%; "><?php echo $_POST['fnm']; ?></span>
    <br><span style="font-family: calibri; font-size: 20px; color: white; font-weight: solid; position: absolute; left:35%; text-shadow: 1px 1px 1px black;">User ID:</span> 
    <span style="font-family: calibri; font-size: 20px; color: black; font-weight: solid; position: absolute; left:55%; "><?php echo $_POST['un']; ?></span>
    <br><span style="font-family: calibri; font-size: 20px; color: white; font-weight: solid; position: absolute; left:35%; text-shadow: 1px 1px 1px black;">Pass:</span> 
    <span style="font-family: calibri; font-size: 17.3px; color: black; font-weight: solid; position: absolute; left:55%; "><?php echo $_POST['pass']; ?></span>
    <br><span style="font-family: calibri; font-size: 20px; color: white; font-weight: solid; position: absolute; left:35%; text-shadow: 1px 1px 1px black;">Pass on:</span> 
    <span style="font-family: calibri; font-size: 20px; color: black; font-weight: solid; position: absolute; left:55%; "><?php echo date('d/m/y'); ?></span>
<br><br></div>
 
<span style="font-family: dubai; font-size: 25px; background-color: white; padding: 2px; border-radius: 15px; position: absolute; top: 8%; left: 32.5%;">PASS PAYMENT</span>
<img src="qrs.png" height=130px; width=130px; style="position: absolute; top: 47%; left: 15%; box-shadow: 1.2px 2px 2px black; ">
<div id="l1" style="position: absolute; left: 50%; top: 44.5%;"></div>

<span style="color: black; font-size: 18px; font-family: calibri; position: absolute; top: 76%; left: 15%;">Scan this QR code<br>   using any UPI </span>
<span style="color: black; font-size: 18px; font-family: calibri; position: absolute; top: 52%; left: 67.5%;">UPI App:</span>
<a href="https://pay.google.com/about/" style="position: absolute; left: 53%; top: 61%;"><img src="gpay.png" height=50px;></a>
<a href="https://www.phonepe.com/" style="position: absolute; left: 67.5%; top: 61%;"><img src="phonepe1.png" height=50px;></a>
<a href="https://paytm.com/" style="position: absolute; left: 80%; top: 61%;"><img src="paytm1.png" height=48px; width=75px;></a>
<button id="btn" name="submit" style="position: absolute; bottom: 4.5%; left: 35%;" onclick="pass()">Done</button>
</div></center>
</body>
</html>
<?php
$fnm = $_POST['fnm'];
$pass = $_POST['pass'];
$uid = $_POST['un'];
$passon = date('d/m/y');
$m1 = date('m');
$y1 = date('y');
$target = $_FILES["image"]["name"];
$target_dir = "ticketwise/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);


switch($pass)
{
    case "Passenger Monthly Pass 900/-": $pid=5;
    break;
    case "Passenger Monthly Pass 1200/-": $pid=6;
    break;
    case "Passenger Monthly Pass 2700/-": $pid=7;
    break;
    case "Senior Monthly Pass 500/-": $pid=8;
    break;
    case "Student Monthly Pass 750/-": $pid=9;
    break;
    case "Student Annual Pass 5000/-": $pid=10;
    break;
    case "Student Half-yearly Pass 3000/-": $pid=11;
    break;
    case "Student Quarterly Pass 2000/-": $pid=12;
    break;
}

    $con = mysqli_connect("localhost","root","","project");
    $n1 = mysqli_query($con,"SELECT * FROM active");
    $name = mysqli_fetch_row($n1);
    $dur = mysqli_query($con,"SELECT duration FROM pass WHERE pid=$pid");
    $d = mysqli_fetch_row($dur);
    switch($d[0])
    {
        case "1Month":
            if($m1==12){
                $vm = 01;
                $vy = $y1+1;
            }else{
                $vm = $m1+1;
                $vy = $y1;
            }
            break;
        case "3Month":
            if($m1>=10){
                switch($m1){
                    case 10:
                        $vm = 01;
                        $vy = $y1+1;
                        break;
                    case 11:
                        $vm = 02;
                        $vy = $y1+1;
                        break;
                    case 12:
                        $vm = 03;
                        $vy = $y1+1;
                        break;        
                }
            }else{
                $vm = $m1+3;
                $vy = $y1;
            }
            break;
            case "6Month":
                if($m1==07)
                {
                    switch($m1){
                        case 7:
                            $vm = 01;
                            $vy = $y1+1;
                            break;
                        case 8:
                            $vm = 02;
                            $vy = $y1+1;
                            break;
                        case 9:
                            $vm = 03;
                            $vy = $y1+1;
                            break;  
                        case 10:
                            $vm = 04;
                            $vy = $y1+1;
                            break; 
                        case 11:
                            $vm = 05;
                            $vy = $y1+1;
                            break;  
                        case 12:
                            $vm = 06;
                            $vy = $y1+1;
                            break;                       
                    }
                }else{
                    $vm = $m1+6;
                    $vy = $y1;
                }
                break;
                case "1Year":
                    $vy = $y1+1;
                    $vm = $m1;
                break;    
            }   
            $vd = date('d'); 
    $vld = $vd."/".$vm."/".$vy;
    mysqli_query($con,"INSERT INTO monthly_pass VALUES($pid,'$name[1]','$fnm',$uid,'$passon','$vld','$target')");
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

       
    

       
       
    
       