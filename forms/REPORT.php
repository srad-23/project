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
            .headingstyle{color:blue; text-decoration: underline;}
            .containerdiv{margin:15% 0 0 10%;}
            .lbl{width:15%; display:inline-block;}
            .align{margin: 2% 0 0 12%;background:violet; color:white; border-radius:5px}
            .align:hover{background:lightpink}
            .align_cn{display:inline-block; width: 10%;}
            .align_cadd{display:inline-block;width:10%}
            .align_cdeg{display:inline-block;width:10%}
            .align_cc{display:inline-block;width:10%}
            .align_fn{display:inline-block;width:10%}
            .align_fc{display:inline-block;width:10%}
            .align_clgd{display:inline-block;width:10%}
            .align_creg{display:inline-block;width:10%}
            .border_cn{border:0.5px solid black;font-size:14px;text-align:center;background:snow;color:black}
            .callhead{background:snow;color:black;font-weight:bold;}
            .btn{font-family:"Times New Roman";width:50px; height:30x; border: 2px solid teal; 
                padding: 3px 2px 2px 2px;font-family:"Times New Roman";color:teal;margin:10% 0 0 35%}
            .background-image {
                        background-image: url("pp.jpg"); 
                        height: 500px;
                        background-position: center;
                        background-repeat: no-repeat; 
                        background-size: cover;
                        }
            
            
        </style>
    </head>
    <body>
    <h1 style="margin-left:550px;color:teal;font-family:'Times New Roman';font-weight:bold">REPORTS</h1>

    <div class="containerdiv background-image">
    <div style='font-size:0;'>
            <span class='align_cn border_cn callhead'>Candidate_name</span>
            <span class='align_cadd border_cn callhead'>Candidate_address</span>
            <span class='align_cdeg border_cn callhead'>Candidate_degree</span>
            <span class='align_cc border_cn callhead'>Candidate_contact</span>
            <span class='align_fn border_cn callhead'>Father_name</span>
            <span class='align_fc border_cn callhead'>father_contact</span>
            <span class='align_clgd border_cn callhead'>college_details</span>
            <span class='align_creg border_cn callhead'>college_regno</span>
        </div>
        <?php
            $con=mysqli_connect("localhost","root","","reg_details");
            $sqlquery= "SELECT * FROM reg_forms";
            $resultset=mysqli_query($con,$sqlquery);
            while($row = mysqli_fetch_array($resultset))
            {
            ?>
                <div style='font-size:0'>
                    <span class='align_cn border_cn'><?php echo $row['Cand_name']?></span>
                    <span class='align_cadd border_cn '><?php echo $row['Cand_address']?></span>
                    <span class='align_cdeg border_cn'><?php echo $row['cand_degree']?></span>
                    <span class='align_cc border_cn'><?php echo $row['cand_contact']?></span>
                    <span class='align_fn border_cn'><?php echo $row['f_name']?></span>
                    <span class='align_fc border_cn'><?php echo $row['f_contact']?></span>
                    <span class='align_clgd border_cn'><?php echo $row['college_d']?></span>
                    <span class='align_creg border_cn'><?php echo $row['college_regno']?></span>
                </div>
            <?php
            }
            ?>
    <div class="btn">
                    <a href="menu.php">HOME</a>
    </div> 

        
    </div>
    </body>
</html>