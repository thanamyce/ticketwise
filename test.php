<?php
session_start();
if(isset($_POST['pass']))
{
if(empty($_SESSION['login']))
{
 header('Location:log.php');
 }
 else{
    header('Location:pass.php');
 }
}
if(isset($_POST['ticket']))
{
if(empty($_SESSION['login']))
{
 header('Location:logtest.php');
 }
 else{
    header('Location:ticketm.php');
 }
}
if(empty($_SESSION['login']))
{
    echo "<button onclick='log()'>login</button>";
}
else{
    echo "
    <button onclick='lout()'>logout</button>";
}
echo "
<script>
function log(){
    window.location.href='logtest.php';
}
function lout(){
 window.location.href='louttest.php';
}
</script>
    ";
    ?>
<html>
    <head>
        <style>
        #mn{
            color: black; 
            font-size:25px; 
             cursor: pointer; 
              backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.4); 
            padding: 2px; 
            border: 0.1px solid black;
            border-radius:15px;
            font-family: dubai;
            box-shadow: 1px 3px 6px black;
            transition: all 0.3s ease;
}
#mn:hover{
    transform: scale(1.08);
    box-shadow: 1px 1px 8px rgb(18, 255, 255);
}   
body{
            background: url('ticket1.jpg');
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover;
        
        }
        </style>

</head>

    <body>
        <form method="post">
            <button type="submit" name="pass" id="mn">PASSES</button>
            <button type="submit" name="ticket" id="mn">TICKET</button>
</form>
</body>
</html>
            