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
	    	<a href="#" id="mynav2"><i class="fa fa-user" style="font-size: 16px"></i> Student Registration</a>
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
	 			<i class="fa fa-user"></i> Student Registration</h5>
	 		</center>

	 		<br/>
	 		<div>
	 		
	 			<form method="post">

	 				<div class="row">
	 				<div class="input-field col s6">
				    	<input id="last_name" name="fname" type="text" class="validate" style="color:gold;" required/>
				         <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Fullname</label>
				    </div>

				    <div class="input-field col s6">
				        <input id="last_name" name="email" type="email" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> E - mail</label>
				    </div>

				    <div class="input-field col s6">
				    	<input id="last_name" name="phone" type="number" class="validate" style="color:gold;" required/>
				         <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Phone Number</label>
				    </div>

				    <div class="input-field col s6">
				        <input id="last_name" name="dep" type="text" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Department</label>
				    </div>

				    <div class="input-field col s6">
				    	<input id="last_name" name="lev" type="text" class="validate" style="color:gold;" required/>
				         <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Level</label>
				    </div>

				    <div class="input-field col s6">
				        <input id="last_name" name="mat" type="text" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Matric No</label>
				    </div>

				    <div class="input-field col s12">
				        <input id="last_name" name="add" type="text" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Address</label>
				    </div>

				    <div class="input-field col s6">
				        <input id="last_name" name="pass" type="password" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-lock"></i> Password</label>
				    </div>

				    <div class="input-field col s6">
				        <input id="last_name" name="cpass" type="password" class="validate" style="color:gold;" required/>
				        <label for="last_name" style="color:#fff;"><i class="fa fa-lock"></i> Confirm Password</label>
				    </div>

				    <?php

				    	$query = $con->query("SELECT * FROM s_ques ORDER BY id DESC");
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
				    <button name="sub" class="waves-effect waves-light purple darken-1 btn-large	">Proceed With Registration <i class="fa fa-arrow-right"></i></button>
	 				</center>

	 			</form>

	 				<?php

	 					if(isset($_POST['sub'])){

	 						$fn = $_POST['fname'];
	 						$em = $_POST['email'];
	 						$ph = $_POST['phone'];
	 						$dep = $_POST['dep'];
	 						$lev = $_POST['lev'];
	 						$mat = $_POST['mat'];
	 						$add = $_POST['add'];
	 						$pass = $_POST['pass'];
	 						$cpass = $_POST['cpass'];
	 						$an1 = $_POST['ques1'];
	 						$an2 = $_POST['ques2'];
	 						$an3 = $_POST['ques3'];
	 						$an4 = $_POST['ques4'];
	 						$color = 'color';
	 						$photo = 'image/boy.jpg';

	 						$q1 = $_POST['qq1'];
	 						$q2 = $_POST['qq2'];
	 						$q3 = $_POST['qq3'];
	 						$q4 = $_POST['qq4'];

				    		if($pass != $cpass){

				    			echo'<script>alert("Password Mis-match !!");</script>';

				    		}else{

				    			$ins = "INSERT INTO student VALUES(null,'$fn','$em','$ph','$dep','$lev','$mat','$add','$pass','$q1','$an1','$q2','$an2','$q3','$an3','$q4','$an4','$color','$photo',CURRENT_TIMESTAMP)";
				    			$query = $con->query($ins) or die ($con->error);

				    			if($query){

				    				$_SESSION['student'] = $em;

				    				header('location:color-pass.php?em='.$em.'');

				    			}else{
				    				echo'<script>alert("Not Submitted !!");</script>';
				    			}

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