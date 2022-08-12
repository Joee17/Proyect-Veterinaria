<?php
session_start();
if(!isset($_SESSION["Usuario"])) {
	header('Location: index.php');
}
include('cado/clase_usuario.php');//se llama al archivo de clase_usuario.php

$usuario=$password="";
$usuario=validar($_POST["txtusuario"]);

$password=validar($_POST["txtpassword"]);

$objUsuario=new Usuario();//se llama a la clase usuario
$validar=$objUsuario->iniciarSesion($usuario,$password);
$sesion=$validar->fetch();

$_SESSION["idusuario"]=$sesion[0];
$_SESSION["Nombres"]=$sesion[1];
$_SESSION["Apellidos"]=$sesion[2];
$_SESSION["usuario"]=$sesion[3];
$_SESSION["clave"]=$sesion[4];
$_SESSION["idtipo"]=$sesion[5];
$_SESSION["estado"]=$sesion[6];
setcookie("COOKIE_INDEFINED_SESSION", TRUE, time()+31622400);

if(empty($usuario)){
	header('Location: index.php?e=3');
	}
elseif(empty($password)){
	header('Location: index.php?e=4');
	
	}
	
if(!empty($sesion)){
			
      if ($_SESSION["estado"] == 1){
		  if($_SESSION["idtipo"]==5 || $_SESSION["idtipo"]==1 ||$_SESSION["idtipo"]==7||$_SESSION["idtipo"]==8){
			header('Location: https://Localhost/Project-Veterinaria/clientes.php');
		  }else{
			header('Location: index.php?e=2');
		  }
		 
	  }
	else{
		header('Location: index.php?e=1');
	}
	}
					else
					{	
						header('Location: index.php?e=2');
					}
	

function validar($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>