<?php
require_once('conectar.php');
class Login{
	function listar(){
		$objCado= new cado();//se llama a la clase cado y se almacena ern una variable
		$sql="SELECT *FROM tipo_usuario " ;
			$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
			return $ejecutar;
		} 
		function listar_usuario($usuario,$password){
			$objCado= new cado();//se llama a la clase cado y se almacena ern una variable
			$sql="SELECT *FROM logins where usuario='$usuario'AND password= MD5('$password')" ;
				$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
				return $ejecutar;
			} 
			function listar_usuario_id($id){
				$objCado= new cado();//se llama a la clase cado y se almacena ern una variable
				$sql="SELECT*FROM logins where idusuario='$id'" ;
					$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
					return $ejecutar;
				} 
			function modificar_asesor($id,$idusuario){
				$objCado=new cado();
				$sql="update asesor set 
			
				idusuario='$idusuario' 
				where idasesor='$id'";
				$ejecutar=$objCado->ejecutar($sql);
				return $ejecutar;
				
				
			}
			function modificar_personal($id,$idusuario){
				$objCado=new cado();
				$sql="update personal set 
				idusuario='$idusuario' 
				where idpersonal='$id'";
				$ejecutar=$objCado->ejecutar($sql);
				return $ejecutar;
				
				
			}
			function modificar_cliente($id,$idusuario){
				$objCado=new cado();
				$sql="update cliente set 
			
				idusuario='$idusuario' 
				where id_cliente='$id'";
				$ejecutar=$objCado->ejecutar($sql);
				return $ejecutar;
				
				
			}
			function modificar_login($id,$usuario,$password,$tipo){
				$objCado=new cado();
				$sql="update logins set 
				usuario='$usuario' ,
				password= MD5('$password'),
				idtipo='$tipo'
				where idusuario='$id'";
				$ejecutar=$objCado->ejecutar($sql);
				return $ejecutar;
				
				
			}
			function deshabilitar($id){
				$objCado=new cado();
				$sql="update logins set 
				estado= 0
				where idusuario='$id'";
				$ejecutar=$objCado->ejecutar($sql);
				return $ejecutar;
				
				
			}
			function habilitar($id){
				$objCado=new cado();
				$sql="update logins set 
				estado = 1
				where idusuario='$id'";
				$ejecutar=$objCado->ejecutar($sql);
				return $ejecutar;
				
				
			}
			
		
		function registrar($usuario,$password,$tipo){
			$objCado=new cado();
			$sql="insert into logins values('0','$usuario',MD5('$password'),'$tipo','1')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
			
			
		}
		function modificar($id,$dni,$nombres, $apellidos,$celular,$region,$correo,$estudios){
			$objCado=new cado();
			$sql="update cliente set 
			nombre_cliente='$nombres',
			dni='$dni',
			apellido_cliente='$apellidos',
			celular_cliente='$celular',
			region_cliente='$region',
            correo_cliente='$correo' ,
            PROFESION_id_profesion='$estudios' 
            where id_cliente='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
			
			
		}
		function eliminar($id){
			$objCado=new cado();
			$sql="DELETE FROM cliente WHERE id_cliente = $id";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
	
		}

}
?>