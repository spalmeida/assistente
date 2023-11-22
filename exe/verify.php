<?php 

require_once("../controller/system.php");


if(isset($_POST['user_mail']) and isset($_POST['user_pass'])){

	$user_mail = $_POST['user_mail'];
	$user_pass = md5(sha1($_POST['user_pass']));

	$verify = $busca->Validation("system_users", $user_mail, $user_pass);

}if($verify){
 
	header("Location: ../index.php?info=loginsuccess");

}else{

	header("Location: ../login.php?info=loginerror");

}



?>