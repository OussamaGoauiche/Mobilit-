<?php
include ("connect.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['nom'])&&isset($_POST['passwd'])){
	if(!empty($_POST['nom'])&&!empty($_POST['passwd'])){
	$nom=htmlentities(trim($_POST['nom']));
	$passwd=htmlentities(trim($_POST['passwd']));
	$req="SELECT *FROM users WHERE USERNAME='".$nom."'";
	$res=$con->query($req);
	$sel_user=$res->fetch(PDO::FETCH_NUM);	
	
	
	
		if($nom=="admin"&&password_verify($passwd,$sel_user[2])){
			
			session_start();
		    $_SESSION['user']=$nom;
		    header("location:administrateur.php");
		}
		else
		{
		header("location:login-adm.php?message=invalid");
		}
	}
	
		 	
}
}

?>