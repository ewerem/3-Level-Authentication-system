<?php

session_start();
ob_start();
include'access/access.php';

if(!isset($_SESSION['student'])){

  header('location:login.php');

}

?>



<!DOCTYPE html>
<html>
<head>
	<title>student</title>

	<link rel="stylesheet" type="text/css" href="style/materialize.css"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css"/>

<style type="text/css">
  
  #v{
    text-decoration: none;
    color:#000066;
    
  }
  #vd:hover{
    background: black;
    color:white;
    padding:5px;
  }
  #plink{
    color:#000055 !important;
    border-bottom: 1px solid #ccc;
    font-family: candara;
    font-size: 14px;
  }
  #plink:hover{
    background: black !important;
    color:white !important;
  }
  #rm:hover{
    background: red;
    color:white !important;
    padding:5px;
  }

</style>

</head>
<body>

<!-- navigation -->
    <div class="col s3 l3 hide-on-med-and-down">
      <ul class="side-nav fixed purple" id="pro-nav2">
         <center style="">
          <br/>
           <?php
              $s = $_SESSION['student'];
              $sel = $con->query("SELECT * FROM student WHERE email = '$s'");
              if($sel->num_rows > 0){
                while($f = $sel->fetch_object()){

            ?>
           <img src="<?=$f->photo?>" style="padding:10px;margin-left: 10px;width: 150px;height: 150px;border-radius: 100%; border: 2px solid #fff;"/>

           <?php
           }}

           ?>
           <br/><br>
          </center>

          <br/>

        <li style="padding-bottom:5px;">
          <a href="student-p.php" class="waves-effect white-text waves-indigo"><i class="fa fa-user" style="color: white"></i> Info</a>
        </li>

        <li style="padding-bottom:5px;">
          <a href="sbook.php" class="waves-effect white purple-text waves-indigo"><i class="fa fa-book" style="color:purple"></i> Books</a>
        </li>

        <li style="padding-bottom:5px;">
          <a href="logout.php" class="waves-effect yellow-text waves-red"><i class="fa fa-power-off" style="color: gold;"></i> Logout</a>
        </li>

      </ul>
    </div>

<div class="row">

    <div class="col s12 m12 l9 offset-l3">
          <div class="row">
            
            <h4 style="font-family:times new roman;color:#000055; letter-spacing: 1px;font-weight: bold;">
            I - Portal | Student
              
            </h4>

            <br/>
          <br/>
             <div class="col s12 m12" style="height:auto;">

             <div class="row">
              

                <div class="col s12 m6 l3">

                <center>
                    <img src="image/s.jpg" style="height:220px;width:190px;border:3px groove #000;border-radius: 5px;" />
                    <p style="color:#000;font-size: 16px;"><i class="fa fa-book"></i> Internet of Things</p>
                    <a href="" style="color:#fff;padding: 3px;border:1px solid black;border-radius: 10px;background: black;">View Ebook</a>&nbsp&nbsp
                </center>
                <br>
                </div>

                <div class="col s12 m6 l3">

                <center>
                    <img src="image/s.jpg" style="height:220px;width:190px;border:3px groove #000;border-radius: 5px;" />
                    <p style="color:#000;font-size: 16px;"><i class="fa fa-book"></i> Internet Security</p>
                    <a href="" style="color:#fff;padding: 3px;border:1px solid black;border-radius: 10px;background: black;">View Ebook</a>&nbsp&nbsp
                </center>
                <br>
                </div>

                <div class="col s12 m6 l3">

                <center>
                    <img src="image/s.jpg" style="height:220px;width:190px;border:3px groove #000;border-radius: 5px;" />
                    <p style="color:#000;font-size: 16px;"><i class="fa fa-book"></i> Internet of Things Two</p>
                    <a href="" style="color:#fff;padding: 3px;border:1px solid black;border-radius: 10px;background: black;">View Ebook</a>&nbsp&nbsp
                </center>
                <br>
                </div>

                <div class="col s12 m6 l3">

                <center>
                    <img src="image/s.jpg" style="height:220px;width:190px;border:3px groove #000;border-radius: 5px;" />
                    <p style="color:#000;font-size: 16px;"><i class="fa fa-book"></i> Internet Security  Two</p>
                    <a href="" style="color:#fff;padding: 3px;border:1px solid black;border-radius: 10px;background: black;">View Ebook</a>&nbsp&nbsp
                </center>
                <br>
                </div>

                <div class="col s12 m6 l3">

                <center>
                    <img src="image/s.jpg" style="height:220px;width:190px;border:3px groove #000;border-radius: 5px;" />
                    <p style="color:#000;font-size: 16px;"><i class="fa fa-book"></i> Internet Things</p>
                    <a href="" style="color:#fff;padding: 3px;border:1px solid black;border-radius: 10px;background: black;">View Ebook</a>&nbsp&nbsp
                </center>
                <br>
                </div>
             
              </div>
             <br/>

          	</div>
         </div>



    </div>
</div>
 


<!-- scripting -->

<script src="javascript/jquery-2.1.1.min.js"></script>
<script src="javascript/materialize.js"></script>
<script src="javascript/init.js"></script>

</body>
</html>