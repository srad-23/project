<?php
    session_start();

        if (isset($_SESSION['status']))
        {
            if ($_SESSION['status']=="invalid")
            {
                $_SESSION['display']="PLEASE LOG IN TO CONTINUE...";
                header('location:login.php');
                exit();
            }
        }
        else
        {
            $_SESSION['display']="PLEASE LOG IN TO CONTINUE...";
            header('location:login.php');
            exit();
        }      
?>
<html>
    <head>
        <title> MENU PAGE </title>
        <style>
            .ENTRYBOX {float:left;text-align:center; width:300px; height:100px; border: 1px solid blue; padding: 60px 25px 20px 25px; border-radius:15px;
                 margin:5% 0 0 10%; background:snow; color:black; font-size:1.6em;box-shadow:-2px 2px 50px teal;font-weight: bold}

            .ENTRYBOX:hover{background:lightgrey}

            .REPORTBOX {float:left;text-align:center; width:300px; height:100px; border: 1px solid blue; padding: 60px 25px 20px 25px; border-radius:15px; 
                margin:5% 0 0 5%; top:25%; background:snow; color:black; font-size:1.6em; box-shadow:-2px 2px 50px teal;font-weight: bold}

            .REPORTBOX:hover{background:lightgrey}

            .LOGOUTBOX {float:left;text-align:center; width:300px; height:100px; border: 1px solid blue; padding: 60px 25px 20px 25px; border-radius:15px; 
                margin:5% 0 0 5%; top:25%; background:snow; color:black; font-size:1.6em;box-shadow:-2px 2px 50px teal;font-weight: bold}

            .LOGOUTBOX:hover{background:lightgrey}
            .F{font-family: "Times New Roman", Times, serif; text-align:center;font-size:2.2em;color:teal;margin:5% 0 0 0;font-weight: bold}
            .bg{background: url(mountain.jpg);background-repeat: no-repeat;background-size: auto;}
            .hero-image {
                        background-image: url("dd.jpg"); 
                        background-color: #cccccc; 
                        height: 500px;
                        background-position: center;
                        background-repeat: no-repeat; 
                        background-size: cover;
                        }
            
            
        </style> 
        
    </head>
    <body class="hero-image" >         
  
        <h1 class="F"> WELCOME TO HOME PAGE ! </h1>
        <div class="ENTRYBOX ">
            <a href="ENTRY.php">ENTRY</a>
        </div>
        <div class="REPORTBOX"> 
            <a href="REPORT.php">REPORT</a>
        </div>
        <div class="LOGOUTBOX"> 
            <a href="LOGOUT.php">LOGOUT</a>
        </div>

    </body>
</html>
    </body>
</html>
