<?php

include '../cado/clase_vacunas.php';
$oc = new Vacuna();
switch ($_POST['txtoperacion']){
    
    
          case 'registrar':
        
           $descripcion = $_POST['txtdescripcion'];
           $fecha_vacuna = $_POST['txtfecha'];
           $idmascota = $_POST['txtidmascota'];
    
        $oc->registrar($descripcion,$fecha_vacuna,$idmascota);
        header('Location: ../vacunas.php?id='.$idmascota);
        break;
    case 'eliminar':
       
              $idmascota1 = $_POST['txtidmascota1'];
              $idvacuna1 = $_POST['txtidvacuna1'];
              $oc->eliminar($idvacuna1);
             header('Location: ../vacunas.php?id='.$idmascota1);
    break;
}

?>
