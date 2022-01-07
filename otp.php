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
	<title>send otp</title>
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
       
	   
     </ul>


</nav>

 <div class="nav-wrapper" style="margin-top: -15px;background:purple ;">
    <p style="visibility: hidden;"> sjchvjsvhj </p>
 </div>

 <div class="parallax-container valign-wrapper" id="para" style="margin-top: -15px;"> 
    <div id="How" class="container">
        <div class="col s12 m12 l12 scrollspy" id="about-us" style="height:auto">
        <br>  <br>  <br>
	 		<center style="color:white">

	 		<form method="post">

	 			<?php 
	 					$str = 'abcdefghijklmnopqrstuvwxyz';
						$shuffled = str_shuffle($str);

						$c = substr($shuffled, 21);
				?>
	 			<input type="hidden" name="message" value="<?=$c?>"/>
	 				
				<?php

				?>
				
	 			<input type="hidden" name="sender_name" type="text" id="name" value="3auth" />
	 			<i>
	 				Please click the button 
	 				<button name="spa" class="btn purple lighten-2 waves-effect" <?php if(isset($_POST['spa'])){ echo 'disabled';} ?> >send passcode</button>
	 				to recieve authentication pass code...
	 			</i>
	 			
	 		</form>
	 		<br>

	 		<i>Please click just once as clicking multiple times can make passcode invalid authentication....</i>

	 		</center>


	 		<br/>
	 		<div>
	 		  <br>

	 		
	 			<form method="post">

	 				<div class="row">
	 				<div class="input-field col s12">
				    	<input name="code" type="text" style="color:gold;" required/>
				         <label for="last_name" style="color:#fff;"><i class="fa fa-edit"></i> Enter Code</label>
				    </div>

				    <br/>
				    <center>
				    <button name="sub" class="waves-effect waves-light purple darken-1 btn-large	"> proceed <i class="fa fa-arrow-right"></i></button>
	 				</center>

	 				</div>

	 			</form>

	 				<?php

	 					if(isset($_POST['sub'])){

	 						$cod = $_POST['code'];
	 						$em = $_SESSION['student'];

	 						if($cod == ''){

	 							echo'<script>alert("Enter the pass code !!");</p>';

	 						}else{

	 							$query = $con->query("SELECT * FROM stud WHERE email = '$em'") or die($query->error);
	 							if($query->num_rows > 0){

	 								$f = $query->fetch_object();

	 								$pac = $f->password;

	 								if($pac == $cod){

	 									$del = $con->query("DELETE FROM stud WHERE email = '$em'");
	 									$_SESSION['student'] = $em;
	 									header('location:color-auth.php');

	 								}else{
	 									
	 									echo'<script>alert("Wrong Pass Code !!");</script>';

	 								}
	 								
	 							}else{

	 								echo'<script>alert("You are not authorized to use this service !!");</script>';

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


 			<?php

 				$json_url = "http://api.ebulksms.com:8080/sendsms.json";
 		

	 			if(isset($_POST['spa'])){

	 				$em = $_SESSION['student'];

	 				$getp = $con->query("SELECT phone FROM student WHERE email = '$em'");
	 				if($getp->num_rows > 0){

	 					$f = $getp->fetch_object();

	 					$ph = $f->phone;

	 				}

	 				$n = $_POST['message'];

	 				$ins = $con->query("INSERT INTO stud VALUES(null,'$n','$em')");

	 				echo '<p style="color:white">'.$ph.'</p>';
	 				echo '<p style="color:white">'.$_POST['message'].'</p>';

	 		

	 			//sms part ...... integrating API

	 			$username = 'israelewerem94@gmail.com';
				$apikey = 'c908a2b34b90e9a42756effa40aa66b132433e69';

			    $sendername = substr($_POST['sender_name'], 0, 11);
			    $recipients = $ph;
			    $message = $_POST['message'];
			    $flash = 0;
			    if (get_magic_quotes_gpc()) {
			        $message = stripslashes($_POST['message']);
			    }
			    $message = substr($_POST['message'], 0, 160);

			    $result = useJSON($json_url, $username, $apikey, $flash, $sendername, $message, $recipients);
			  
	 		}

	 		function useJSON($url, $username, $apikey, $flash, $sendername, $messagetext, $recipients) {
			    $gsm = array();
			    $country_code = '234';
			    $arr_recipient = explode(',', $recipients);
			    foreach ($arr_recipient as $recipient) {
			        $mobilenumber = trim($recipient);
			        if (substr($mobilenumber, 0, 1) == '0'){
			            $mobilenumber = $country_code . substr($mobilenumber, 1);
			        }
			        elseif (substr($mobilenumber, 0, 1) == '+'){
			            $mobilenumber = substr($mobilenumber, 1);
			        }
			        $generated_id = uniqid('int_', false);
			        $generated_id = substr($generated_id, 0, 30);
			        $gsm['gsm'][] = array('msidn' => $mobilenumber, 'msgid' => $generated_id);
			    }
			    $message = array(
			        'sender' => $sendername,
			        'messagetext' => $messagetext,
			        'flash' => "{$flash}",
			    );

			    $request = array('SMS' => array(
			            'auth' => array(
			                'username' => $username,
			                'apikey' => $apikey
			            ),
			            'message' => $message,
			            'recipients' => $gsm
			    ));
			    $json_data = json_encode($request);
			    if ($json_data) {
			        $response = doPostRequest($url, $json_data, array('Content-Type: application/json'));
			        $result = json_decode($response);
			        return $result->response->status;
			    } else {
			        return false;
			    }
			}


			function doPostRequest($url, $arr_params, $headers = array('Content-Type: application/x-www-form-urlencoded')) {
			    $response = array();
			    $final_url_data = $arr_params;
			    if (is_array($arr_params)) {
			        $final_url_data = http_build_query($arr_params, '', '&');
			    }
			    $ch = curl_init();
			    curl_setopt($ch, CURLOPT_URL, $url);
			    curl_setopt($ch, CURLOPT_POSTFIELDS, $final_url_data);
			    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			    curl_setopt($ch, CURLOPT_POST, 1);
			    curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
			    curl_setopt($ch, CURLOPT_VERBOSE, 1);
			    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			    $response['body'] = curl_exec($ch);
			    $response['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			    curl_close($ch);
			    return $response['body'];
			    
			}


	 		?>


</body>
</html>