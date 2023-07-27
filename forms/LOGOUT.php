<?php
    session_start();
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $con=mysqli_connect("localhost","root","","login");
        $localun=$_POST["Uname"];
        $localpw=$_POST["Pword"];
        
        if (mysqli_connect_error())
            echo "connection error";
        else
        {
            $sqlquery1="SELECT Username from login_details WHERE Username='$localun'";
            $resultset1=mysqli_query($con,$sqlquery1);
            if($row = mysqli_fetch_array($resultset1))
            {
                $sqlquery2="SELECT Username,PASSWORD from login_details WHERE Username='$localun' AND PASSWORD ='$localpw'";
                $resultset2=mysqli_query($con,$sqlquery2);
                if($row2 = mysqli_fetch_array($resultset2))
                {
                    echo "Login Successfully done";
                    header('location:menu.php');
                }
                else
                    echo "Incorrect Password";
            }
            else
                echo"Incorrect Username";

            $con -> close();
        }
    }
?>
<html>
    <head>
        <title> Login Page </title>
        <style>
        .LOGOBOX {text-align:center; width:500px; height:100px; border: 1px solid silver; padding: 60px 25px 20px 25px; border-radius:8px;
                 margin:15% auto; background:snow; color:teal; font-size:2em;box-shadow:-2px 2px 50px teal}
                 .background-image {
                        background-image: url("pp.jpg"); 
                        height: 500px;
                        background-position: center;
                        background-repeat: no-repeat; 
                        background-size: cover;
                        }
                .background-image1 {
                        background-image: url("dd.jpg"); 
                        height: 200px;
                        background-position: center;
                        background-repeat: no-repeat; 
                        background-size: cover;
                        }
        </style>
    </head>
    <body class="background-image">
    <div class="LOGOBOX background-image1" >
            <a href="login.php">LOGGED OUT !!CLICK TO RETURN TO HOME</a>
        </div>
    </body>
</html>
<?php
    session_destroy();
?>
