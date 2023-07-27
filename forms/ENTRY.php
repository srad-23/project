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
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $con=mysqli_connect("localhost","root","","reg_details");
        $localcn=$_POST["cname"];
        $localcadd=$_POST["caddress"];
        $localcdegree=$_POST["cdegree"];
        $localcnum=$_POST["cnumber"];
        $localfname=$_POST["fname"];
        $localfnum=$_POST["fnumber"];
        $localcolname=$_POST["colname"];
        $localregnum=$_POST["rno"];
        if (mysqli_connect_error())
            echo "connection error";
        else
        {
            $sqlquery="INSERT INTO reg_forms values ('$localcn','$localcadd','$localcdegree','$localcnum','$localfname','$localfnum','$localcolname','$localregnum')";
            mysqli_query($con,$sqlquery);
            echo "Registration Successfully Done";
            $con -> close();
        }
    }
?>
<html>
    <head>
        <title>Registration form</title>
        <style>
            .headingstyle{color:teal; text-decoration: underline;}
            .containerdiv{margin:1.5% 0 0 15%;font-size:1.3em}
            .lbl{width:15%; display:inline-block;}
            .align{margin: 2% 0 0 12%;background:snow; color:teal; width:80px;height:30px;border:1px solid silver;font-weight: bold}
            .align:hover{background:lightgrey}
            .align_cn{display:inline-block; width:10%}
            .align_cadd{display:inline-block;width:10%}
            .align_cdeg{display:inline-block;width:10%}
            .align_cc{display:inline-block;width:10%}
            .align_fn{display:inline-block;width:10%}
            .align_fc{display:inline-block;width:10%}
            .align_clgd{display:inline-block;width:10%}
            .align_creg{display:inline-block;width:10%}
            .border_cn{border:2px solid black;font-size:14px;text-align:center;background:teal;color:black}
            .callhead{background:blue;color:white}
            .btn{margin:20px 0 0 25%; border-radius:9px;background:teal;color:white;padding:1% 5%;
                border:1px solid brown ;font-size:1.6em;font-family:"Times New Roman",Times,Serif;}
            .btn2{ width:50px; height:30x; border: 2px solid teal; padding: 3px 2px 2px 2px;font-family:"Times New Roman";color:teal;margin:20px 5px 0 290px;}
            .background-image {
                        background-image: url("pp.jpg"); 
                        height: 500px;
                        background-position: center;
                        background-repeat: no-repeat; 
                        background-size: cover;
                        }
        </style>
    </head>
    <body class="background-image">
      
        <form action="ENTRY.php" method="post">
        <h1 style="margin-left:550px;color:teal;font-family:'Times New Roman';font-weight:bold">Registration Form</h1>

        <div style="margin: 3% 0 0 23%">
            <h3 class="containerdiv headingstyle">Candidate details:</h3>
            <div class="containerdiv">
                <label class="lbl">Name:</label>
                <input type="text" name="cname" style="">
            </div>

            <div class="containerdiv">
                <label class="lbl">Address:</label>
                <input type="text" name="caddress" style="">
            </div>
            <div class="containerdiv">
                <label class="lbl">Degree:</label>
                <input type="text" name="cdegree" style="">
            </div>
            <div class="containerdiv">
                <label class="lbl">Contact:</label>
                <input type="number" name="cnumber" style="">
            </div>
            <h3 class="containerdiv headingstyle">Father Details:</h3>
            <div class="containerdiv">
                <label class="lbl">Name:</label>
                <input type="text" name="fname" style="">
            </div>
            <div class="containerdiv">
                <label class="lbl">Contact number:</label>
                <input type="number" name="fnumber" style="">
            </div>
            
            <h3 class="containerdiv headingstyle">College details:</h3>
            <div class="containerdiv">
                <label class="lbl">College Name:</label>
                <input type="text" name="colname" style="">
            </div>
            <div class="containerdiv">
                <label class="lbl">Registration number:</label>
                <input type="number" name="rno" style="">
            </div>
            <div class="containerdiv">
                <input type="submit" class="align" value="SUBMIT">
            </div>
            <div class="btn2">
                    <a href="menu.php">HOME</a>
            </div> 
        </div>
        </form>
    </body>
</html>

       