<?php
require_once('conectar.php');
class Productos{
	function listar(){
		$objCado= new cado();//se llama a la clase cado y se almacena ern una variable
		$sql="SELECT * from productos" ;
			$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
			return $ejecutar;
		}
	
		
		function registrar($servicio,$nombre, $precio_costo,$precio_venta,$stock,$fecha){
			$objCado=new cado();
			$sql="insert into productos values('0','$servicio','$nombre','$precio_costo','$precio_venta','$stock','$fecha')";
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