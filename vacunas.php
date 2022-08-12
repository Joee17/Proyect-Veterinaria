<!DOCTYPE html>
<html lang="ES-es">
<head>
<?php
  require_once("head.php")
  ?>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
</head>

<?php
  require_once("menu.php")
  ?>
       
  <div class="content-wrapper" id="client">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gestionar Vacunas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sistema Veterinaria</a></li>
              <li class="breadcrumb-item active">Mascotas</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="card">
             
              <div class="card-body">
                
                <form name="formcliente" action="crud/vacuna.php" method=post >
                <div class="row">
                    <div class="col-md-6" > 
                        <button  type="submit" style="  border: 1px solid ;" class="btn btn-outline-danger" id="guardar"><span class="fa fa-save"></span> Guardar</button>
                        <button type="submit" style="  border: 1px solid ;"class="btn btn-outline-danger" id="modificar"  disabled="true"><span class="fa fa-pencil-alt"></span> Modificar</button>
                        <button onclick="limpiar()" style="  border: 1px solid ;"type="reset" class="btn btn-outline-danger"  ><span class="fa fa-trash"></span> Limpiar</button>
                      </div>
                </div></br>
                <input class="form-control" type="text"  id="txtoperacion" name="txtoperacion" value="registrar" style="display:none;">
                <input class="form-control" type="text"  id="txtidvacuna" name="txtidvacuna" style="display:none;">
                <input class="form-control" type="text" value="<?=$_GET['id'] ?>"  id="txtidmascota" name="txtidmascota" style="display:none;">
                <div class="row">

                
                <!-- Campo del nombre de la mascota -->
                    <div class="col-md-4">
                        <label>Descripción:</label><br>
                        <input class="form-control" type="text" placeholder="Por favor digite solo nombres" autocomplete="off"  id="txtdescripcion" name="txtdescripcion" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                    
                    <div class="col-md-4">
                        <label>Fecha:</label><br>
                        <input class="form-control" type="date" placeholder="Por favor digite solo nombres" autocomplete="off"  id="txtfecha" name="txtfecha" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>

                   
                </div>
            
                
               
            
                </form>
               </br><hr style="background-color: #f20519;
  height: 3px;

  width: 98%;
  border-radius:5in;">
           
            
              <div  class="">
              
                <table id="example" class="table table-bordered display responsive no-wrap" width="100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Descripción</th>
                      <th>Fecha de vacuna</th>
                      <th>Mascota</th>
                      <th style="width: 10px"></th>
                    </tr>
                  </thead>
                  <tbody style="background-color: #FFF6F4;">
                  <?php
                   include('cado/clase_vacunas.php');
              $obj=new Vacuna();
              $listar=$obj->listar($_GET['id']);
         $i=0;
          while($fila=$listar->fetch()){
            $i++;
          ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$fila[1]?></td>
                      <td><?=$fila[2]?></td>
                      <td><?=$fila[3]?></td>

                      <td><button type="button" id="btnEliminar" name="btnEliminar" style="  border: 1px solid ;float:left;" class="btn btn-outline-danger"  data-toggle="modal" data-target="#eliminar"  onClick="eliminar('<?=$fila[0]?>')"> 
                      <i class="fas fa-trash"></i> 
                 </button> </td>
            </tr>
                     
              
 <?php }?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
            <!-- /.card -->
    </section>
  </div>
  <div class="modal fade" id="eliminar" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
         <form id=frmEliminar action="crud/vacuna.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion" name="txtoperacion" value="eliminar" style="display:none;">
          <h3><center>¿Desea eliminar esta vacuna?</center></h3>
          
          <input class="form-control" type="text" id="txtidvacuna1" name="txtidvacuna1"  style="display:none;">
          <input class="form-control" type="text" value="<?=$_GET['id'] ?>"  id="txtidmascota1" name="txtidmascota1" style="display:none;">
        </div>
        <div class="modal-footer">
        <center>
         <button type="submit" style="  border: 1px solid ;" class="btn btn-outline-danger" id="btnGrabar2" name="btnGrabar2">Eliminar</button>
          <button type="button" style="  border: 1px solid ;" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
          </center>
        </div>
			</form>
      </div>
      
    </div>
  </div>
  
 
    </div>
  </div>
  <style>
      html {
  scroll-behavior: smooth;
}
  </style>

  <script >
    
  
       function limpiar() {
            $("#txtoperacion").val("registrar");  
          document.getElementById('txtdescripcion').style.backgroundColor = "#fff ";
        document.getElementById('txtfecha').style.backgroundColor = "#fff";
        document.getElementById('guardar').disabled = false;
        document.getElementById('modificar').disabled = true;
        }   
        function nuevo_usuario(id3) {
           $("#titulo3").html("Usuario Nuevo"); 
           $("#txtoperacion5").val("registrar_nuevo_cliente"); 
            $("#txtid3").val(id3);  
            $("#txtusuario").val("");
            $("#txtpassword").val("");  
           
          document.getElementById('txtpassword').style.backgroundColor = "#fff ";
        document.getElementById('txtusuario').style.backgroundColor = "#fff";

        }    
        function editar_usuario(id4,usuario,password) {
           $("#titulo3").html("Editar Usuario"); 
           $("#txtoperacion5").val("modificarc"); 
            $("#txtid3").val(id4);
            $("#txtusuario").val(usuario);
            $("#txtpassword").val(password);  
            
          document.getElementById('txtpassword').style.backgroundColor = "#EFFBFC  ";
        document.getElementById('txtusuario').style.backgroundColor = "#EFFBFC";

        }         
    function eliminar(id2) {
         $("#txtidvacuna1").val(id2);
         					
       }
      
	function cerrar(id) {
         window.location.href="index.php";			
      }
function enviar(){
   document.formcliente.submit();
}


$("#modal_login").on("shown.bs.modal", function(){
    $("#txtnombre").focus();
});

  </script>
  <?php
  require_once("footer_vacunas.php")
  ?>