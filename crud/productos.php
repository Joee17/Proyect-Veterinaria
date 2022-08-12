<?php

include '../cado/clase_productos.php';
$oc = new Productos();
switch ($_POST['txtoperacion']){
    
    case 'registrar':
        
		$servicio   = $_POST['txtservicio'];
		$nombre  = $_POST['txtnombre'];
		$precio_costo= $_POST['txtprecio_costo'];
        $precio_venta = $_POST['txtprecio_venta'];
        $stock = 0;
       $fecha= $_POST['txtfecha'];
    
        $oc->registrar($servicio,$nombre, $precio_costo,$precio_venta,$stock,$fecha);
        header('Location: ../productos.php?e=1');
        break;
      case 'modificar':
            $id        = $_POST['txtid'];
         	$servicio   = $_POST['txtservicio'];
    		$nombre  = $_POST['txtnombre'];
    		$precio_costo= $_POST['txtprecio_costo'];
            $precio_venta = $_POST['txtprecio_venta'];
            $stock = 0;
            $fecha= $_POST['txtfecha'];
       
          $oc->modificar($id,$servicio,$nombre, $precio_costo,$precio_venta,$stock,$fecha);
          header('Location: ../clientes.php?e=3');
          
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