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
padding: 30px;
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
#sel
{
background: transparent;
backdrop-filter: blur(7px);
background-color: rgba(255,255,255,1.5);
padding: 5px;
font-size: 15px;
border-radius: 10px;
}
#tt{
backdrop-filter: blur(10px);
background-color: rgba(255,255,255,1);
}
#btn{
background-color: white;
color: red;
border-color: red;
border-radius: 25px;
height: 35px;
width: 200px;
padding-top: 2px;
font-size:20px;
font-family: calibri;
cursor: pointer;
}
#btn:hover{
background-color: red;
color: white;
border-color: white;
}

</style>
</head>
<body>
<img src="head1.jpg" height=540.4px; width=1022.8px; style="position: absolute; top: 0%; left: 0%; ">
<br><center><div id="wrp">
<center><p style=" font-family: Freestyle Script; color:black; font-size:60px; position: absolute; top: -10%; left: 28%;">TicketWise.</p></center>
<center><span style="font-family: Century Schoolbook; font-size:25px; position: absolute; top: 21%; left: 33%; color: red; border-radius: 7px; padding: 5px;" id="tt">Daily Pass</span></center> 
<br><br><br><br><br>
<form action="pass11.php" method="post">
<br><br><span style="font-size: 25px; color:red; position: absolute; left:8%; font-family: calibri;">Enter Unique Id No.</span>
<br><br><input type="text" placeholder="last 4 digit of Adhar/Pan/Other..." id="inp" name="uid" required>
<br><br><br><span style="font-size: 25px; color:red; position: absolute; left:8%; font-family: calibri;">Select Pass: </span>
<select name="pass" id="sel" style="position: absolute; left:42.5%;">
<option value="pu40">P.M.C 40/-</option>
<option value="pc40">P.C.M.C 40/-</option>
<option value="p50">P.M.C&P.C.M.C 50/-</option>
<option value="s40">Senior Citizen 40/-</option>
</select>
<br><br><br><span style="font-size: 25px; color:red; position: absolute; left:8%; font-family: calibri;">Gender: </span>
<div style="position: absolute; left: 38%; top: 71.5%;"><input type="radio" name="gen" value="male"><span style="font-size:23px; ">Male</span></div>  
<div style="position: absolute; left: 58%; top: 71.5%;"><input type="radio" name="gen" value="female"><span style="font-size:23px; ">Female</span></div>  
<br><br><br><input type="submit" name="sub" id="btn" value="PASS">
</form>
</div></center>


</body>

</html>