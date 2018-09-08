<?php
session_start();

include '../config/config.php';

//аутентификация в админке
if (isset($_POST['adminSubmit'])) {
	$login = htmlspecialchars($_POST['login']);
	$password = htmlspecialchars($_POST['password']);	
	$auth = mysqli_query($db, "SELECT * FROM `users` where name='$login' AND password='$password' LIMIT 1");
	if(mysqli_num_rows($auth) > 0){		
		$_SESSION['admin'] = 1;
	}
}
//проверка авторизации в админке
if((isset($_SESSION['admin']) && ($_SESSION['admin'] == 1))) {
	include '../classes/Admin.php';
	$admin = new Admin();	
	include 'comments_edit.php';
}else{
	include 'admin_auth.php';
}