<!DOCTYPE html>
<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
    $localuname=$_POST["Uname"];
    $localpword=$_POST["Pword"];
    $con=mysqli_connect("localhost","root","","login");
    $sqlquery="select username from logindetails where username='$localuname' ";
    $res=mysqli_query($con,$sqlquery);
    if($row=mysqli_fetch_array($res))
    {   
        
        $sqlquery1="select username from logindetails where username='$localuname' and password='$localpword'";
        $res2=mysqli_query($con,$sqlquery1);
        if($row2=mysqli_fetch_array($res2))
        {
            $_SESSION["validation"]="valid";
            $_SESSION["Displaymsg"]="Logged in succesfully!";
            header('Location:menu.php');
            exit();
        }
        else
        {
            $_SESSION["validation"]="Invalid";
            $_SESSION["Displaymsg"]="Password is incorrect...";
        }
    }
    else
    {
        $_SESSION["validation"]="Invalid";
        $_SESSION["Displaymsg"]="Username is incorrect.";
    }
}
if(isset($_SESSION["Displaymsg"]))
{
    if(!empty($_SESSION['Displaymsg']))
    {
        echo "<div id='msg' class='echostyle'>".$_SESSION["Displaymsg"].
            "<span class='close' onclick='clearMessage()'>X</span>"."</div>";
        echo "<span id='showmsg' onclick='showmessage()' class='reopen'>!</span>";
        $_SESSION["Displaymsg"]="";
    }
}
?>
<html>
    <head>
        <title> Login Page </title>
        <style>
            .loginbox {text-align:center; width:50%; border-radius:8px; margin:0 auto; top:25%; 
                position:absolute; left:0; right:0; background:snow; color:teal; font-size:1.3em;
                box-shadow:-2px 2px 10px teal;}
            .loginhead{float:left; width:100%;text-align:center;font-size:1.8em;line-height:150%;
                background:white;color:teal;border-radius:8px 8px 0 0; border-bottom:3px solid teal; 
                padding:3px 0 3px 0; }
            .logindetails{ padding:15% 0 6% 0;}    
            .logindetails div{line-height:150%;margin-left:18%;text-align:left;}
            .logindetails input{border-radius:5px;font-size:90%;width:50%;line-height:160%;
                border:1px solid silver}
            .btn{margin:20px 0 0 25%; border-radius:9px;background:teal;color:white;padding:1% 5%;
                border:1px solid brown ;font-size:1.6em;font-family:"Times New Roman",Times,Serif;}
            .btn:hover{background:white;color:green;}
            .echostyle{float:left; border-radius:5px;background:coral;color:white; position:relative; width:25%;
                border: 1px solid black;margin-left:40%;margin-top:5%;padding:0 8px 0 8px}
            .close{display:inline-block; float:right; background:white;color:red}
            .close:hover{cursor:pointer;background:silver;}
            .reopen{position:absolute; left:50%;top:5%; display:none; text-align:center; cursor:pointer;
                    width:20px; height:20px; border-radius:50%; border:2px solid yellowgreen;}
            .reopen:hover{background:yellowgreen; color:white;}
        </style>
        <script>
            function clearMessage()
            {
                document.getElementById("msg").style.display="none";
                document.getElementById("showmsg").style.display="block";
            }
            function showmessage()
            {
                document.getElementById("msg").style.display="block";
                document.getElementById("showmsg").style.display="none";

            }
        </script>
    </head>
    <body>
        <form action="login.php" method="POST">
        <div class="loginbox">
            <label class="loginhead"> Login </label>
            <div class="logindetails">
                
                <div>
                    <label> Username </label>
                    <input type="text" name="Uname"/>  
                </div>
                <div style="margin-top:7%;">
                    <label> Password </label>
                    <input type="Password" name="Pword"/>  
                </div>
                <div>
                    <input type="Submit" value="Login" class="btn"/>
                </div>   
            </div>
        </div>
        <form>
    </body>
</html>