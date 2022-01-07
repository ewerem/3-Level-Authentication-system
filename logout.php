<?php

session_start();
ob_start();
include'access/access.php';

if(isset($_SESSION['student'])){

	unset($_SESSION['student']);

	header('location:login.php');

}else{
	header('location:login.php');
}