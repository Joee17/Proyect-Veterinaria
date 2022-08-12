<?php
require_once('conectar.php');
class Vacuna{
	function listar($idmascota){
		$objCado= new cado();//se llama a la clase cado y se almacena ern una variable
		
		$sql="SELECT V.idvacuna, V.descripcion, V.fecha_vacuna, M.nombre from vacuna V INNER JOIN mascota M ON V.idmascota = M.idmascota WHERE V.idmascota='$idmascota'";
			$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
			return $ejecutar;
		
		} 
		
		function nombrar_mascotas($idmascota){
		    $objCado = new cado();
		    
		    $sql = "SELECT M.nombre FROM vacuna V INNER JOIN mascota M ON V.idmascota = M.idmascota WHERE V.idmascota='$idmascota' LIMIT 1";
		    $ejecutar = $objCado->ejecutar($sql);
		    return $ejecutar;
		    
		}
		
		function registrar($descripcion,$fecha_vacuna,$idmascota){
		
			$objCado=new cado();
			$sql="insert into vacuna values('0','$descripcion','$fecha_vacuna','$idmascota')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		
			
		}
		
		function eliminar($idvacuna){
		
	        $objCado=new cado();
			$sql="DELETE FROM vacuna WHERE idvacuna = $idvacuna";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;	
		}
		

}
?>