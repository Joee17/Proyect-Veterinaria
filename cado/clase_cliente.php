<?php
require_once('conectar.php');
class Persona{
	function listar(){
		$objCado= new cado();//se llama a la clase cado y se almacena ern una variable
		$sql="SELECT * from persona" ;
			$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
			return $ejecutar;
		}
	function listar_persona(){
		$objCado= new cado();//se llama a la clase cado y se almacena ern una variable
		$sql="SELECT idpersona,nombre from persona" ;
			$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
			return $ejecutar;
	}
		
		function registrar($dni,$nombre, $apellidos,$telefono,$direccion){
			$objCado=new cado();
			$sql="insert into persona values('0','$dni','$nombre','$apellidos','$direccion','$telefono')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
			
			
		}
		function modificar($id,$dni,$nombre, $apellidos,$telefono,$direccion){
			$objCado=new cado();
			$sql="update persona set 
			nombre='$nombre',
			dni='$dni',
			apellidos='$apellidos',
			telefono='$telefono',
			direccion='$direccion' 
            where idpersona='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
			
			
		}
		function eliminar($id){
		
		        $objCado=new cado();
			$sql="DELETE FROM persona WHERE idpersona = $id";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		  
			
	
		}

}
?>