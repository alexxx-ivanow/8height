 <?php
 $db = mysqli_connect('localhost', 'root', '', '8height');

 if(!$db) {
 	die('No connect with database..');
 }