<?php

session_start();
ob_start();
include'access/access.php';

?>



<!DOCTYPE html>
<html>
<head>
	<title>Reg</title>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css" />
    <link rel="stylesheet" href="style/materialize.css" type="text/css"/>
    <link rel="stylesheet" href="style/scroll.css" type="text/css"/>
    <link rel="stylesheet" href="style/mystyle.css" type="text/css"/>
</head>
<body style="background: #fff;">

<nav id="navigate" class="nav-wrappers">

	<img src="image/pad.jpg" style="width:60px;height:60px;position:relative;margin-left:80px;">

	<a href="#" data-activates="slide-out" class="button-collapse" style="font-weight:bold;text-decoration: none;color:#770000;font-size:25px;letter-spacing: 1px;">&nbsp<i class="fa fa-list"></i></a>

	<ul id="slide-out" class="side-nav">
	  	<li style="visibility: hidden;">creating space</li>

	  	<li style="padding-bottom: 15px !important;" id="myn-l">
	    	<a href="forum" id="mynav"><i class="fa fa-comments" style="color:white;font-size:20px !important;"></i>&nbsp Forum</a>
	    </li>
		    
		    
	</ul>
<!-- dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd -->
	
	<ul class="right hide-on-med-and-down" style="margin-right: 35% !important;">
       
	   
	    <li id="myn2">
	    	<a href="reg.php" id="mynav2"><i class="fa fa-user" style="font-size: 16px"></i> Student Registration</a>
	    </li>
	    <li id="myn2">
	    	<a href="login.php" id="mynav2"><i class="fa fa-sign-in" style="font-size: 16px"></i> Student Login</a>
	    </li>
     </ul>


</nav>

 <div class="nav-wrapper" style="margin-top: -15px;background:purple ;">
    <p style="visibility: hidden;"> sjchvjsvhj </p>
 </div>

 <div class="container">

	<center style="border-bottom: 2px solid purple;">
	 	<h6 style="color:black;letter-spacing: 2px;padding: 5px;">
	 		<i>Please upload photo......</i>	 	
	 	</h6>
	</center>
	<br>

	<div class="row">

		<div class="col s12 m12" style="height:auto;">

             <center style="color:black;">

            <?php

              $em = $_GET['em'];

              $query = $con->query("SELECT photo FROM student WHERE email = '$em'");
              if($query->num_rows > 0){

                while($f = $query->fetch_object()){
            ?>
              
              <img src="<?=$f->photo?>" style="border:1px solid black;height: 140px;width: 150px;border-radius: 5px;">

            <?php
              
              }
            }

            ?>  


              <form method="post" enctype="multipart/form-data">

                <input type="file" name="photo" style="border:1px solid black;padding:5px;" required />
                <br/><br/>


                <?php

                  $em = $_GET['em'];

                  $query = $con->query("SELECT photo FROM student WHERE email = '$em'");
                  if($query->num_rows > 0){

                    $f = $query->fetch_object();

                    $gp = $f->photo;

                    if($gp == 'image/boy.jpg'){

                  ?>


                <button name="sub" class="btn purple waves-effect waves-light">
                  upload <i class="fa fa-send"></i>
                </button>

                  <?php
              
                    }else{

                      echo'<a href="login.php" class="btn purple waves-effect waves-light">
                        proceed to login <i class="fa fa-arrow-right"></i>
                      </a>';

                    }
                  }

                  ?>  


                
              </form>

            </center>

              <?php

                if(isset($_POST['sub'])){

                  $photo = $_FILES['photo']['tmp_name'];
                  $photo_name = $_FILES['photo']['name'];
                  $location = "photo/". $photo_name;
                  move_uploaded_file($photo, $location);

                   $up = $con->query("UPDATE student SET photo = '$location' WHERE email ='$em'");

                   if($up){

                      echo'<center>';

                        echo'<i style="color:blue;font-size:14px;">Photo uploaded.... finalising Registration....</i>';

                        echo'<div class="progress">';
                          echo'<div class="indeterminate" style="width:50%;"></div>';
                        echo'</div>';

                      echo'</center>';

                     header('refresh:4;url="up-pix.php?em='.$em.'');

                    }
                }

              ?>
            
          	</div>

	</div>

	<br>

</div>

 <div class="nav-wrapper" style="margin-top:-16px;background: purple ;">
    <p style="visibility: hidden;"> sjchvjsvhj </p>
 </div>

 <div id="footer">
	 <center>
	 	<p style="color:black	;letter-spacing: 2px;word-spacing: 2px;">
	 		HND 2 Computer Science Project<br/>
	 		Security can not be over emphasise as it is <br/>
	 		a very important issue that should be dealt with.......

	 	</p>
	 </center>
 </div>




<!-- scripting file -->
<script src="javascript/jquery-2.1.1.min.js"></script>
<script src="javascript/materialize.js"></script>
<script src="javascript/init.js"></script>
<script src="javascript/scrollview.js"></script>

</body>
</html>