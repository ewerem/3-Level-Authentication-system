<?php

session_start();
ob_start();
include'access/access.php';

if(!isset($_SESSION['student'])){

	header('location:reg.php');

}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Confirm-color</title>
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
	 		<i>Please Re-select your colors to comfirm.....</i>	 	
	 	</h6>
	</center>
	<br>

	<div class="row">

		<div class="col l6 offset-l3">

			<form method="post">

			<table class="centered" style="height:300px;">

				<tr>
					<td style="background: pink;border-radius:100%;">

				      	<input type="checkbox" name="color[]" value="1" class="filled-in" id="filled-in-box1" />
				     	<label for="filled-in-box1"></label>
    	
					</td>
					<td style="background: orange;border-radius:100%;">
						
						<input type="checkbox" name="color[]" value="2" class="filled-in" id="filled-in-box2" />
				      	<label for="filled-in-box2"></label>

					</td>
					<td style="background: blue;border-radius:100%;">
						
						<input type="checkbox" name="color[]" value="3" class="filled-in" id="filled-in-box3" />
				      	<label for="filled-in-box3"></label>

					</td>
					<td style="background: #330033;border-radius:100%;">
						
						<input type="checkbox" name="color[]" value="4" class="filled-in" id="filled-in-box10" />
				      	<label for="filled-in-box10"></label>

					</td>
					
				</tr>

				<tr>
					<td style="background: green;border-radius:100%;">

				      	<input type="checkbox" name="color[]" value="5" class="filled-in" id="filled-in-box4" />
				     	<label for="filled-in-box4"></label>
    	
					</td>
					<td style="background: black;border-radius:100%;">
						
						<input type="checkbox" name="color[]" value="6" class="filled-in" id="filled-in-box5" />
				      	<label for="filled-in-box5"></label>

					</td>
					<td style="background: brown;border-radius:100%;">
						
						<input type="checkbox" name="color[]" value="7" class="filled-in" id="filled-in-box6" />
				      	<label for="filled-in-box6"></label>

					</td>
					<td style="background: #444;border-radius:100%;">
						
						<input type="checkbox" name="color[]" value="8" class="filled-in" id="filled-in-box11" />
				      	<label for="filled-in-box11"></label>

					</td>
					
				</tr>

				<tr>
					<td style="background: chocolate;border-radius:100%;">

				      	<input type="checkbox" name="color[]" value="9" class="filled-in" id="filled-in-box7" />
				     	<label for="filled-in-box7"></label>
    	
					</td>
					<td style="background: yellowgreen;border-radius:100%;">
						
						<input type="checkbox" name="color[]" value="10" class="filled-in" id="filled-in-box8" />
				      	<label for="filled-in-box8"></label>

					</td>
					<td style="background: gold;border-radius:100%;">
						
						<input type="checkbox" name="color[]" value="11" class="filled-in" id="filled-in-box9" />
				      	<label for="filled-in-box9"></label>

					</td>
					<td style="background: #3465ff;border-radius:100%;">
						
						<input type="checkbox" name="color[]" value="12" class="filled-in" id="filled-in-box12" />
				      	<label for="filled-in-box12"></label>

					</td>
					
				</tr>


			</table>

			<br/>
				    <center>
				    <button name="sub" class="waves-effect waves-light purple darken-1 btn-large	">proceed to upload photo <i class="fa fa-arrow-right"></i></button>
	 				</center>

			</form>

			<?php

				if(isset($_POST['sub'])){

					$col = $_POST['color'];

					$qy = implode(',', $col);

					//echo'<p>'.$qy.'--------'.$count.';</p>';

					$em = $_GET['em'];

					if($col == ''){

						echo'<script>alert("Select colours !!");</script>';

					}else{

					$get = $con->query("SELECT color FROM student WHERE email = '$em'");
					if($get->num_rows > 0){

						$f = $get->fetch_object();

						//echo $f->color;

						$gc = $f->color;

						if($qy != $gc){

							echo'<script>alert("Wrong Combination of colours !!");</script>';
						}else{

							$_SESSION['student'] = $em;

							header('location:up-pix.php?em='.$em.'');

						}


					}

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