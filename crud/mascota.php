<?php

include '../cado/clase_mascota.php';
$oc = new Mascota();
switch ($_POST['txtoperacion']){
    
    
      case 'modificar':
          $idmascota = $_POST['txtidmascota'];
          $nombre   = $_POST['txtnombre'];
          $raza   = $_POST['txtraza'];
          $tamaño = $_POST['txttamanio'];
          $edad   = $_POST['txtedad'];
          $color    = $_POST['txtcolor'];
          $idpersona = $_POST['cmbPersona'];
       
          $oc->modificar($idmascota,$nombre,$raza, $tamaño,$edad,$color,$idpersona);
          header('Location: ../mascotas.php?e=3');
          
          break;
          case 'registrar':
        
            $nombre   = $_POST['txtnombre'];
            $raza  = $_POST['txtraza'];
            $tamaño = $_POST['txttamanio'];
            $edad  = $_POST['txtedad'];
            $color = $_POST['txtcolor'];
            $idpersona = $_POST['cmbPersona'];
    
        $oc->registrar($nombre,$raza,$tamaño,$edad,$color,$idpersona);
        header('Location: ../mascotas.php?e=1');
        break;
    case 'eliminar':
        try{
              $idmascota = $_POST['txtidmascota2'];
              $oc->eliminar($idmascota);
             header('Location: ../mascotas.php?e=4');
        }
		    catch(Exception $error){
			header('Location: ../mascotas.php?e=2');
		        } 
              
              break;   
}

?>
