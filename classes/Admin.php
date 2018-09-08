<?php
class Admin{

	public function getComments() {
        include '../admin/list_comments.php';
	}

	public function delComment($id) {
        include '../config/config.php';
        $comm = mysqli_query($db, "DELETE FROM `comments`  WHERE id='$id'") ;
        if (!$comm){
            return '500';
        }
	}

	public function editComment($id) {
        include '../config/config.php';
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $text = htmlspecialchars($_POST['text']);
        $publish = htmlspecialchars($_POST['publish_check']);
        $comm = mysqli_query($db, "UPDATE `comments` SET name='$name',email='$email',text='$text',publish='$publish' WHERE id='$id'") ;
        return TRUE;
	}
}
