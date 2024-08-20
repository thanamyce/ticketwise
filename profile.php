<html>
<head>
    <style>
        body{
            background-color: lightgreen;
        }
        .pro{
            padding: 10px;
            font-family: calibri;
            border: 2px solid black;
            border-radius: 10px;
            font-size: 20px;
            background-color: white;
           font-weight: bold;

        }
        .pro1{
            padding: 10px;
            font-family: calibri;
            border: 2px solid black;
            border-radius: 10px;
            font-size: 20px;
            padding-right: 125px;
           font-weight: bold;
           background-color: lightgrey;

        }
        .pro3{
            padding: 10px;
            font-family: calibri;
            border: 2px solid black;
            border-radius: 10px;
            font-size: 20px;
            text-align: center;
           font-weight: bold;
           background-color: lightgrey;

        }
        .pro4{
            padding: 10px;
            font-family: calibri;
            border: 2px solid black;
            border-radius: 10px;
            font-size: 20px;
            
           font-weight: bold;
           background-color: white;

        }

    </style>

</head>
<body>
    <br><br>
<center><span style="background-color: red; padding: 10px; padding-left: 40px; padding-right: 40px; border-radius: 35px; color: white; font-family: dubai; font-size: 35px; box-shadow: 2px 2px 8px black; font-weight: bold;">USER PROFILE</span></center>
<center>
<br><br><br><br>
<div style="background-color: rgb(230, 224, 166); padding: 25px; border-radius: 150px; margin-right: 5px; margin-left: 5px; box-shadow: 1px 1px 12px black;">
<img src="profile.png" height=250px; width=250px; style="position: absolute; top: 44.5%; left: 17%; border-radius: 150px; ">
<div style="padding: 25px; border: 2.5px solid black; border-radius: 15px; margin-right: 105px;  margin-left: 450px;  ">
    <table>
        <tr>
            <td class="pro">NAME:</td>
            <td class="pro1"><?php 
            $con = mysqli_connect("localhost","root","","project");
            $nm = mysqli_query($con,"SELECT name FROM active");
            $name = mysqli_fetch_row($nm);
            echo $name[0];
            mysqli_close($con);
            ?>
            </td>
    </tr>
    <tr>
        <td class="pro">GENDER:</td>
        <td class="pro1"><?php 
            $con = mysqli_connect("localhost","root","","project");
            $nm = mysqli_query($con,"SELECT name FROM active");
            $name = mysqli_fetch_row($nm);
            $g = mysqli_query($con,"SELECT gen FROM udetail WHERE name='$name[0]'");
            $gen = mysqli_fetch_row($g);
            echo $gen[0];
            mysqli_close($con);
            ?>
            </td>
    </tr>
    <tr>
        <td class="pro">ADDRESS:</td>
        <td class="pro1"><?php 
            $con = mysqli_connect("localhost","root","","project");
            $nm = mysqli_query($con,"SELECT name FROM active");
            $name = mysqli_fetch_row($nm);
            $a = mysqli_query($con,"SELECT addr FROM udetail WHERE name='$name[0]'");
            $addr = mysqli_fetch_row($a);
            echo $addr[0];
            mysqli_close($con);
            ?>
            </td>
    </tr>
    <tr>
        <td class="pro">MOB NO.:</td>
        <td class="pro1"><?php 
            $con = mysqli_connect("localhost","root","","project");
            $nm = mysqli_query($con,"SELECT name FROM active");
            $name = mysqli_fetch_row($nm);
            $m = mysqli_query($con,"SELECT mob FROM udetail WHERE name='$name[0]'");
            $mob = mysqli_fetch_row($m);
            echo $mob[0];
            mysqli_close($con);
            ?>
            </td>
    </tr>
    </table></center>
    </div>
    </div>
    <br><br><br><br><br>
    <center><span style="font-family: dubai; font-size: 35px; padding: 7.5px; border-radius: 5px; font-weight: bold; border: 2px solid red;">PAYMENT HISTORY:</span></center>
   <br>
   <br>
    <?php
    $con = mysqli_connect("localhost","root","","project");
    $nm = mysqli_query($con,"SELECT name FROM active");
    $name = mysqli_fetch_row($nm);
    $p = mysqli_query($con,"SELECT * FROM payment WHERE name='$name[0]'");
    echo "<center>
        <table>
        <tr>
        <th class='pro4'>Payment ID</th>
        <th class='pro4'>Amount</th>
        <th class='pro4'>Payment On</th>
        </tr> 
        ";
    while($pmt = mysqli_fetch_row($p))
    {
     echo "<tr>
     <td class='pro3'>$pmt[0]</td>
     <td class='pro3'>$pmt[2]</td>
     <td class='pro3'>$pmt[3]</td>
     </tr>
     ";
    }
    echo "</table></center>";
    mysqli_close($con);
    ?>
    <br>
    <br>
    <br>
    <span>.</span>
    </body>
    </html>



