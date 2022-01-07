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
          <a href="student-p.php" class="waves-effect white purple-text waves-indigo"><i class="fa fa-user" style="color: purple"></i> Info</a>
        </li>

        <li style="padding-bottom:5px;">
          <a href="sbook.php" class="waves-effect white-text waves-indigo"><i class="fa fa-book" style="color:white"></i> Books</a>
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
          
             <div class="col s12 m12" style="height:auto;">
              
            <?php

             $s = $_SESSION['student'];
              $sel = $con->query("SELECT * FROM student WHERE email = '$s'");
              if($sel->num_rows > 0){
                while($f = $sel->fetch_object()){

            ?>

              <table class="table">
                    <tbody>
                     <tr style="background:#fff;">
                        <td style="width: 170px">
                        <i class="fa fa-info-circle" style="color:black;font-size: 80px;"></i>
                        
                        </td>
                        <td style="color:#000;font-size: 25px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 2 0px;"></i> <?=$f->matric?>
                        </td>
                      </tr>

                      <tr style="color:black">
                        <td style="width: 170px">
                        <i class="fa fa-user" style="color:black;font-size: 80px;"></i>
                        </td>
                        <td style="color:#000;font-size: 25px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 2 0px;"></i> <?=$f->fname?>
                        </td>
                      </tr>

                      <tr style="background:#fff;">
                        <td style="width: 170px">
                        <i class="fa fa-phone" style="color:black;font-size: 80px;"></i>
                        </td>
                        <td style="color:#000;font-size: 25px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 2 0px;"></i> <?=$f->phone?>
                        </td>
                      </tr>

                      <tr style="background:#fff;">
                        <td style="width: 170px">
                        <i class="fa fa-envelope" style="color:black;font-size: 80px;"></i>
                        </td>
                        <td style="color:#000;font-size: 25px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 2 0px;"></i> <?=$f->email?>
                        </td>
                      </tr>

                      <tr style="background:#fff;">
                        <td style="width: 170px">
                        <i class="fa fa-building-o" style="color:black;font-size: 80px;"></i>
                        </td>
                        <td style="color:#000;font-size: 25px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 2 0px;"></i> <?=$f->department?>
                        </td>
                      </tr>

                      <tr style="background:#fff;">
                        <td style="width: 170px;height:100px;">
                        <i class="fa fa-arrow-up" style="color:black;font-size: 40px;"></i>
                        <i class="fa fa-arrow-down" style="color:black;font-size: 40px;"></i>
                        </td>
                        <td style="color:#000;font-size: 25px">
                        <i class="fa fa-arrow-right" style="color:black;font-size: 2 0px;"></i> <?=$f->level?>
                        </td>
                      </tr>
                      
                    </tbody>
                </table>

             <?php
              }}else{
                echo'<h5 style="color:red">No affiliators !!</h5>';
              }
             ?>

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