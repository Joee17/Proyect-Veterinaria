<?php

include '../cado/clase_cliente.php';
$oc = new persona();
switch ($_POST['txtoperacion']){
    
    
      case 'modificar':
          $id        = $_POST['txtid'];
          $dni   = $_POST['txtdni'];
          $nombre   = $_POST['txtnombre'];
          $apellidos = $_POST['txtapellidos'];
          $telefono   = $_POST['txttelefono'];
          $direccion    = $_POST['txtdireccion'];
       
          $oc->modificar($id,$dni,$nombre, $apellidos,$telefono,$direccion);
          header('Location: ../clientes.php?e=3');
          
          break;
          case 'registrar':
        
		$nombre   = $_POST['txtnombre'];
		$dni  = $_POST['txtdni'];
        $apellidos = $_POST['txtapellidos'];
        $telefono  = $_POST['txttelefono'];
        $direccion = $_POST['txtdireccion'];
    
        $oc->registrar($dni,$nombre, $apellidos,$telefono,$direccion);
        header('Location: ../clientes.php?e=1');
        break;
    case 'eliminar':
        try{
              $id = $_POST['txtid2'];
              $oc->eliminar($id);
             header('Location: ../clientes.php?e=4');
        }
		    catch(Exception $error){
			header('Location: ../clientes.php?e=2');
		        } 
              
              break;   
}

?>
