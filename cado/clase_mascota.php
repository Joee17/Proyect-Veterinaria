<?php
require_once('conectar.php');
class Mascota{
	function listar(){
		$objCado= new cado();//se llama a la clase cado y se almacena ern una variable
		
		$sql="SELECT M.idmascota,M.nombre,M.raza,M.tamano,M.edad,M.color,P.nombre, P.idpersona from mascota M INNER JOIN persona P ON M.idpersona = P.idpersona";
			$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
			return $ejecutar;
		
		} 
		function listar_personas(){
			$objCado = new cado();

			$sql="SELECT idpersona, nombre FROM persona";
			$ejecutar = $objCado->ejecutar($sql);
			return $ejecutar;
		}
		function nombrar_personas($idpersona){
			$objCado = new cado();

			$sql = "SELECT P.nombre FROM mascota M INNER JOIN persona P ON M.idpersona = P.idpersona WHERE M.idpersona='$idpersona' LIMIT 1";
			$ejecutar = $objCado->ejecutar($sql);
			return $ejecutar;
		}
		
		function registrar($nombre,$raza,$tamaño,$edad,$color,$idpersona){
		
			$objCado=new cado();
			$sql="insert into mascota values('0','$nombre','$raza','$tamano','$edad','$color','$idpersona')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		
			
		}
		function modificar($idmascota,$nombre,$raza, $tamano,$edad,$color,$idpersona){
			$objCado=new cado();
			$sql="update mascota set 
			nombre='$nombre',
			raza='$raza',
			tamano='$tamano',
			edad='$edad',
			color='$color',
			idpersona='$idpersona';
            where idmascota='$idmascota'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
			
			
		}
		function eliminar($idmascota){
		
		        $objCado=new cado();
			$sql="DELETE FROM mascota WHERE idmascota = $idmascota";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;	
		}
		

}
?>