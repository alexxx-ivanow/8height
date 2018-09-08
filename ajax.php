<?php

if(isset($_POST['name'])) {

	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$text = htmlspecialchars($_POST['text']);

	$query = "INSERT INTO `comments` (`name`, `email`, `text`) VALUES ('$name','$email','$text')";

	$ins = mysqli_query($db, $query);

	if($ins) {
		exit('200');
	}
	exit($db->error);
}