<?php

session_start();
ob_start();
include'access/access.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome.css" />
    <link rel="stylesheet" href="style/materialize.css" type="text/css"/>
    <link rel="stylesheet" href="style/scroll.css" type="text/css"/>
    <link rel="stylesheet" href="style/mystyle.css" type="text/css"/>
</head>
<body style="background: #000;">

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
	
	<ul class="right hide-on-med-and-down" style="margin-right: 30% !important;">
       
	    <li id="myn2">
	    	<a href="index.php" id="mynav2"><i class="fa fa-home" style="font-size: 16px"></i> Home</a>
	    </li>
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

 <div class="parallax-container valign-wrapper" id="para" style="margin-top: -15px;"> 
    <div id="How" class="container">
        <div class="col s12 m12 l12 scrollspy" id="about-us" style="height:auto">
        <br>
	 		<center style="border-bottom: 2px solid gold;">
	 			<h5 style="color:#fff;letter-spacing: 2px;padding: 5px;">
	 			<i class="fa fa-user"></i> Student Login</h5>
	 		</center>

	 		<br/>
	 		<div>
	 		
	 			<form method="post">

	 				<div class="row">

				    <div class="input-field col s6">
				        <input id="last_name" name="email" type="email" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> E - mail</label>
				    </div>

				    <div class="input-field col s6">
				        <input id="last_name" name="pass" type="password" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-lock"></i> Password</label>
				    </div>

				    <?php

				    	$query = $con->query("SELECT * FROM s_ques ORDER BY RAND() LIMIT 2");
				    	if($query->num_rows > 0){

				    		while($f = $query->fetch_object()){
				    ?>

				     <div class="input-field col s12">
				        <input id="last_name" name="ques<?=$f->id?>" type="text" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-file"></i> <?=$f->ques1?> ?</label>
				    </div>

				    	<input type="hidden" name="qq<?=$f->id?>" value="<?=$f->ques1?>">


				    <?php

				    	}

				    	}

				    ?>

				    </div>

				    <br/>
				    <center>
				    <button name="sub" class="waves-effect waves-light purple darken-1 btn-large"> proceed <i class="fa fa-arrow-right"></i></button>
	 				</center>

	 			</form>

	 				<?php

	 					if(isset($_POST['sub'])){

	 						$em = $_POST['email'];

	 						$pa = $_POST['pass'];
	 						$an1 = $_POST['ques1'];
	 						$an2 = $_POST['ques2'];
	 						$an3 = $_POST['ques3'];
	 						$an4 = $_POST['ques4'];

	 						$ques1 = $_POST['qq1'];
	 						$ques2 = $_POST['qq2'];
	 						$ques3 = $_POST['qq3'];
	 						$ques4 = $_POST['qq4'];


	 						$sel = "SELECT * FROM student WHERE email = '$em' AND password = '$pa'";
	 						$query = $con->query($sel);

	 						if($query->num_rows > 0){
	 						
		 						if($ques1 && $ques2){

		 							$chk = "SELECT ans1, ans2 FROM student WHERE email = '$em'";
		 							$query = $con->query($chk) or die ($query->error);
		 							if($query->num_rows > 0){

		 								$f = $query->fetch_object();

		 								$gans1 = $f->ans1;
		 								$gans2 = $f->ans2;

		 								//echo $gans1.' '.$gans2;

		 								if($an1 != $gans1 || $an2 != $gans2){

		 									echo'<script>alert("Enter correct answers to questions  !!");</script>';

		 								}else{

		 									$_SESSION['student'] = $em;
		 									header('location:otp.php');

		 								}

		 							}

		 						}


		 						if($ques1 && $ques3){

		 							$chk = "SELECT ans1, ans3 FROM student WHERE email = '$em'";
		 							$query = $con->query($chk) or die ($query->error);
		 							if($query->num_rows > 0){

		 								$f = $query->fetch_object();

		 								$gans1 = $f->ans1;
		 								$gans3 = $f->ans3;

		 								//echo $gans1.' '.$gans2;

		 								if($an1 != $gans1 || $an3 != $gans3){

		 									echo'<script>alert("Enter correct answers to questions  !!");</script>';

		 								}else{

		 									$_SESSION['student'] = $em;
		 									header('location:otp.php');


		 								}

		 							}

		 						}


		 						if($ques1 && $ques4){

		 							$chk = "SELECT ans1, ans4 FROM student WHERE email = '$em'";
		 							$query = $con->query($chk) or die ($query->error);
		 							if($query->num_rows > 0){

		 								$f = $query->fetch_object();

		 								$gans1 = $f->ans1;
		 								$gans4 = $f->ans4;

		 								//echo $gans1.' '.$gans4;

		 								if($an1 != $gans1 || $an4 != $gans4){

		 									echo'<script>alert("Enter correct answers to questions  !!");</script>';

		 								}else{

		 									$_SESSION['student'] = $em;
		 									header('location:otp.php');


		 								}

		 							}

		 						}


		 						if($ques2 && $ques3){

		 							$chk = "SELECT ans2, ans3 FROM student WHERE email = '$em'";
		 							$query = $con->query($chk) or die ($query->error);
		 							if($query->num_rows > 0){

		 								$f = $query->fetch_object();

		 								$gans3 = $f->ans3;
		 								$gans2 = $f->ans2;

		 								//echo $gans3.' '.$gans2;

		 								if($an3 != $gans3 || $an2 != $gans2){

		 									echo'<script>alert("Enter correct answers to questions  !!");</script>';

		 								}else{

		 									$_SESSION['student'] = $em;
		 									header('location:otp.php');



		 								}

		 							}

		 						}


		 						if($ques4 && $ques2){

		 							$chk = "SELECT ans4, ans2 FROM student WHERE email = '$em'";
		 							$query = $con->query($chk) or die ($query->error);
		 							if($query->num_rows > 0){

		 								$f = $query->fetch_object();

		 								$gans4 = $f->ans4;
		 								$gans2 = $f->ans2;

		 								//echo $gans4.' '.$gans2;

		 								if($an4 != $gans4 || $an2 != $gans2){

		 									echo'<script>alert("Enter correct answers to questions  !!");</script>';

		 								}else{

		 									$_SESSION['student'] = $em;
		 									header('location:otp.php');



		 								}

		 							}

		 						}


		 						if($ques3 && $ques4){

		 							$chk = "SELECT ans3, ans4 FROM student WHERE email = '$em'";
		 							$query = $con->query($chk) or die ($query->error);
		 							if($query->num_rows > 0){

		 								$f = $query->fetch_object();

		 								$gans3 = $f->ans3;
		 								$gans4 = $f->ans4;

		 								//echo $gans3.' '.$gans4;

		 								if($an3 != $gans3 || $an4 != $gans4){

		 									echo'<script>alert("Enter correct answers to questions  !!");</script>';

		 								}else{

		 									$_SESSION['student'] = $em;
		 									header('location:otp.php');



		 								}

		 							}

		 						}

		 						

	 						}else{

	 							echo'<script>alert("You have not registered before !!");</script>';

	 						}

	 						
	 						
				    	}


	 				?>


	 			<br>

	 		</div>

 		</div>
        <div class="parallax"><img src="image/3ed.jpg" alt="Unsplashed background img 2"></div>
    </div>
</div>

 <div class="nav-wrapper" style="margin-top:-16px;background: purple ;">
    <p style="visibility: hidden;"> sjchvjsvhj </p>
 </div>

 <div id="footer">
	 <center>
	 	<p style="color:white;letter-spacing: 2px;word-spacing: 2px;">
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