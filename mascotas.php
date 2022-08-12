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
            <h1 class="m-0 text-dark">Gestionar Mascotas</h1>
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
                
                <form name="formcliente" action="crud/mascota.php" method=post >
                <div class="row">
                    <div class="col-md-6" > 
                        <button  type="submit" style="  border: 1px solid ;" class="btn btn-outline-danger" id="guardar"><span class="fa fa-save"></span> Guardar</button>
                        <button type="submit" style="  border: 1px solid ;"class="btn btn-outline-danger" id="modificar"  disabled="true"><span class="fa fa-pencil-alt"></span> Modificar</button>
                        <button onclick="limpiar()" style="  border: 1px solid ;"type="reset" class="btn btn-outline-danger"  ><span class="fa fa-trash"></span> Limpiar</button>
                      </div>
                </div></br>
                <input class="form-control" type="text"  id="txtoperacion" name="txtoperacion" value="registrar" style="display:none;">
                <input class="form-control" type="text"  id="txtidmascota" name="txtidmascota" style="display:none;">
                <div class="row">


                <!-- Campo del nombre de la mascota -->
                    <div class="col-md-4">
                        <label>Nombre:</label><br>
                        <input class="form-control" type="text" placeholder="Por favor digite solo nombres"  id="txtnombre" name="txtnombre" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                <!-- Campo de la raza de la mascota -->
                    <div class="col-md-4">
                        <label>Raza:</label><br>
                        <input class="form-control" type="text" placeholder="Por favor digite solo raza"  id="txtraza" name="txtraza" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                <!-- Campo del tamaño de la mascota -->
                    <div class="col-md-4">
                        <label>Tamaño:</label><br>
                        <input class="form-control" type="number" maxlength="3" min="1" max="300" placeholder="Por favor digite solo tamaño"  id="txttamanio" name="txttamanio" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                </div>

                <div class="row">
                <!-- Campo de la edad de la mascota -->
                    <div class="col-md-6">
                        <label for="edad">Edad:</label>
                        <input type="text" name="txtedad" id="txtedad"  placeholder="Por favor digite solo edad" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"required>
                    </div>
                <!-- Campo del color de la mascota --> 
                    <div class="col-md-6">
                        <label for="color">Color</label>
                        <input type="text" name="txtcolor" id="txtcolor" placeholder="Por favor digite una color" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"required>
                    </div>
                   
                </div>
                <!-- Campo de la persona de la mascota -->
                <div class="row">
                    <div class="col-md-6">
                        <label for="cmbPersona">Cliente:</label>
                        
                        <select class="custom-select" name="cmbPersona" id="cmbPersona">
                          <option value="0">Seleccione al cliente</option>
                          <?php 
                            include('cado/clase_cliente.php');
                            $objpersona = new Persona();
                            $listarpersona=$objpersona->listar_persona();                            
                            $i=0;
                            while($filapersona=$listarpersona->fetch()){
                              $i++;
                              echo '<option value="'.$filapersona[0].'">'.$filapersona[1].'</option>';
                            }
                              
                            

                          ?>
                        </select>
                        
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
                      <th>Nombre</th>
                      <th>Raza</th>
                      <th>Tamaño</th>
                      <th>Edad</th>
                      <th>Color</th>
                      <th>Dueño</th>
                      <th style="width: 10px"></th>
                      <th style="width: 10px"></th>
                      <th style="width: 10px"></th>
                    </tr>
                  </thead>
                  <tbody style="background-color: #FFF6F4;">
                  <?php
                   include('cado/clase_mascota.php');
              $obj=new Mascota();
              $listar=$obj->listar();
         $i=0;
          while($fila=$listar->fetch()){
            $i++;
          ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$fila[1]?></td>
                      <td><?=$fila[2]?></td>
                      <td><?=$fila[3]?></td>
                      <td><?=$fila[4]?></td>
                      <td><?=$fila[5]?></td>
                      <td><?=$fila[6]?></td>

                      <td><button type="button" id="btnEliminar" name="btnEliminar" style="  border: 1px solid ;float:left;" class="btn btn-outline-danger"  data-toggle="modal" data-target="#eliminar"  onClick="eliminar('<?=$fila[0]?>')"> 
                      <i class="fas fa-trash"></i> 
            </button> </td>
            
            <td>
                <div class="dropdown">
                          <button style="  border: 1px solid ;" class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-syringe"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a type="button" id="vacunas" name="vacunas" style="color:red;" class="dropdown-item " onclick="location.href='vacunas.php?id='+<?=$fila[0]?>">
                                 <i class='fa fa-edit'></i>Vacuna</a>
                <a type="button"  style="  color:red;" class="dropdown-item "  data-toggle="modal" data-target="#garantia"> 
                    <i class="fas fa-calendar-day"></i> Agregar </a>
            
            </div>
            </div>
            
            </td>

            <td><button type="button" id="btnEditar" name="btnEditar" style="  border: 1px solid ;float:left;" class="btn btn-outline-danger"  data-toggle="modal" data-target="#editar"  onClick="editar('<?=$fila[0] ?>','<?=$fila[1]?>','<?=$fila[2]?>','<?=$fila[3]?>','<?=$fila[4]?>','<?=$fila[5]?>','<?=$fila[7]?>')"> 
                <i class="fas fa-edit"></i>
            </button> </td>
            
                     
              
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
         <form id=frmEliminar action="crud/mascota.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion" name="txtoperacion" value="eliminar" style="display:none;">
          <h3><center>¿Desea eliminar esta mascota?</center></h3>
          
          <input class="form-control" type="text" id="txtidmascota2" name="txtidmascota2"  style="display:none;">
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
  <div class="modal fade" id="deshabilitar" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
         <form id=frmEliminar action="crud/login_option.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion4" name="txtoperacion4" value="deshabilitarc" style="display:none;">
          <h3><center>¿Desea Deshabilitar este Usuario?</center></h3>
          
          <input class="form-control" type="text" id="txtid7" name="txtid7"  style="display:none;">
        </div>
        <div class="modal-footer">
        <center>
         <button type="submit" style="  border: 1px solid ;" class="btn btn-outline-danger" id="btnGrabar2" name="btnGrabar2">Deshabilitar</button>
          <button type="button" style="  border: 1px solid ;" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
          </center>
        </div>
			</form>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="habilitar" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
         <form id=frmEliminar action="crud/login_option.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion4" name="txtoperacion4" value="habilitarc" style="display:none;">
          <h3><center>¿Desea Habilitar este Usuario?</center></h3>
          
          <input class="form-control" type="text" id="txtid6" name="txtid6"  style="display:none;">
        </div>
        <div class="modal-footer">
        <center>
         <button type="submit" style="  border: 1px solid ;" class="btn btn-outline-danger" id="btnGrabar2" name="btnGrabar2">habilitar</button>
          <button type="button" style="  border: 1px solid ;" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
          </center>
        </div>
			</form>
      </div>
      
    </div>
  </div>
  
  <div class="modal fade" id="modal_login" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="titulo3">CREAR MASCOTA</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <form id="frm" action="crud/mascota.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion5" name="txtoperacion5"  style="display:none;">
          
          
          <input class="form-control" type="text" id="txtid3" name="txtid3"  style="display:none;">
          <div class="form-group">
        <label>Usuario:</label><br>
        <input class="form-control" type="text" id="txtusuario" name="txtusuario"  required>
        <div id="result-username"></div>
        </div> 
        <div class="form-group">
        <label>Password:</label><br>
        <input class="form-control" type="password" id="txtpassword" name="txtpassword"  required>
        </div>
        <div class="form-group">
        <label>Tipo:</label><br>
        <select name="txttipo" id="txttipo" class="form-control " style="width: 100%;" readonly>
          <option* selected="true" value="6">Cliente</option>
        </select>

        </div>
        <div class="modal-footer">
        <center>
         <button type="submit" style="  border: 1px solid ;" class="btn btn-outline-danger" id="btnGrabar2" name="btnGrabar2">Grabar</button>
          <button type="button" style="  border: 1px solid ;" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
          </center>
        </div>
      </form>
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
    
   function editar(idmascota,nombre, raza, tamaño,edad,color,idpersona) {
        $("#txtoperacion").val("modificar");  
        $('txtidmascota').val(idmascota);
        $("#txtnombre").val(nombre);
        $("#txtraza").val(raza);
        $("#txttamanio").val(tamaño);
        $("#txtedad").val(edad);
        $("#txtcolor").val(color);
        document.getElementById('cmbPersona').value = idpersona;
        document.getElementById('txtnombre').style.backgroundColor = "#EFFBFC ";
        document.getElementById('txtraza').style.backgroundColor = "#EFFBFC ";
        document.getElementById('txttamanio').style.backgroundColor = "#EFFBFC";
        document.getElementById('txtedad').style.backgroundColor = "#EFFBFC ";
        document.getElementById('txtcolor').style.backgroundColor = "#EFFBFC ";
        document.getElementById('guardar').disabled = true;
        document.getElementById('modificar').disabled = false;
 
        }  
       function limpiar() {
            $("#txtoperacion").val("registrar");  
          document.getElementById('txtnombre').style.backgroundColor = "#fff ";
        document.getElementById('txtraza').style.backgroundColor = "#fff";
        document.getElementById('txttamanio').style.backgroundColor = "#fff";
        document.getElementById('txtedad').style.backgroundColor = "#fff ";
        document.getElementById('txtcolor').style.backgroundColor = "#fff ";
        document.getElementById('cmbPersona').value = 0;
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
         $("#txtidmascota2").val(id2);
         $("#txtoperacion2").val("eliminar");					
       }
       function deshabilitar(id7) {
      $("#txtid7").val(id7);  				
       }
       function habilitar(id6) {
      $("#txtid6").val(id6);				
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
  require_once("footer.php")
  ?>