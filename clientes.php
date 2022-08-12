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
            <h1 class="m-0 text-dark">Gestionar Clientes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sistema Veterinaria</a></li>
              <li class="breadcrumb-item active">Clientes</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="card">
             
              <div class="card-body">
                
                <form name="formcliente" action="crud/cliente.php" method=post >
                <div class="row">
                    <div class="col-md-6" > 
                        <button  type="submit" style="  border: 1px solid #009bab ;" class="btn btn-secondary" id="guardar"><span class="fa fa-save"></span> Guardar</button>
                        <button type="submit" style="  border: 1px solid #009bab;"class="btn btn-secondary" id="modificar"  disabled="true"><span class="fa fa-pencil-alt"></span> Modificar</button>
                        <button onclick="limpiar()" style="  border: 1px solid ;"type="reset" class="btn btn-secondary"  ><span class="fa fa-trash"></span> Limpiar</button>
                      </div>
                </div></br>
                <input class="form-control" type="text"  id="txtoperacion" name="txtoperacion" value="registrar" style="display:none;">
                <input class="form-control" type="text"  id="txtid" name="txtid" style="display:none;">
                <div class="row">
                    <div class="col-md-6">
                        <label>DNI:</label><br>
                        <input style="border:1px solid #009bab"class="form-control" type="number" placeholder="Por favor digite solo dni"  id="txtdni" name="txtdni" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                    <div class="col-md-6">
                        <label>Nombres:</label><br>
                        <input style="border:1px solid #009bab" class="form-control" type="text" placeholder="Por favor digite solo nombres"  id="txtnombre" name="txtnombre" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="apellidos">Apellidos:</label>
                        <input style="border:1px solid #009bab" type="text" name="txtapellidos" id="txtapellidos" placeholder="Por favor digite solo apellidos" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"required>
                    </div>
          
                    <div class="col-md-6">
                        <label for="direccion">Direcciòn</label>
                        <input style="border:1px solid #009bab" type="text" name="txtdireccion" id="txtdireccion" placeholder="Por favor digite una direcciòn" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"required>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="telefono">Telefono</label>
                        <input style="border:1px solid #009bab" type="number" name="txttelefono" maxlength="9" id="txttelefono" placeholder="Por favor digite un teléfono" class="form-control" required>
                    </div>
                </div>
               
            
                </form>
               </br><hr style="background-color: #009bab ;
  height: 3px;

  width: 98%;
  border-radius:5in;">
           
            
              <div  class="">
              
                <table id="example" class="table table-bordered display responsive no-wrap" width="100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>DNI</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Direccion</th>
                      <th>Telefono</th>
                      <th style="width: 10px"></th>
                      <th style="width: 10px"></th>
                      <th style="width: 10px"></th>
                    </tr>
                  </thead>
                  <tbody style="background-color: #FFF6F4;">
                  <?php
                   include('cado/clase_cliente.php');
              $obj=new Persona();
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

                      <td><button type="button" id="btnEliminar" name="btnEliminar" style="  border: 1px solid ;float:left;" class="btn btn-outline-danger"  data-toggle="modal" data-target="#eliminar"  onClick="eliminar('<?=$fila[0]?>')"> 
                      <i class="fas fa-trash"></i> 
            </button> </td>

            <td><button type="button" id="btnEditar" name="btnEditar" style="  border: 1px solid ;float:left;" class="btn btn-outline-danger"  data-toggle="modal" data-target="#editar"  onClick="editar('<?=$fila[0] ?>','<?=$fila[1]?>','<?=$fila[2]?>','<?=$fila[3]?>','<?=$fila[4]?>','<?=$fila[5]?>')"> 
                <i class="fas fa-edit"></i>
            </button> </td>
            <td>
                     
              
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
         <form id=frmEliminar action="crud/cliente.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion" name="txtoperacion" value="eliminar" style="display:none;">
          <h3><center>¿Desea eliminar este Cliente?</center></h3>
          
          <input class="form-control" type="text" id="txtid2" name="txtid2"  style="display:none;">
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
        <h4 class="modal-title" id="titulo3">CREAR USUARIO</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <form id="frm" action="crud/login.php" method="POST" >
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

              
                  <option selected="true" value="6">Cliente</option>
               
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
    
   function editar(id,dni, nombre,apellidos,direccion,telefono) {
        $("#txtoperacion").val("modificar");      
        $("#txtid").val(id);
        $("#txtdni").val(dni);
        $("#txtnombre").val(nombre);
        $("#txtapellidos").val(apellidos);
        $("#txtdireccion").val(direccion);
        $("#txttelefono").val(telefono);
        document.getElementById('txtdni').style.backgroundColor = "#EFFBFC ";
        document.getElementById('txtnombre').style.backgroundColor = "#EFFBFC ";
        document.getElementById('txtapellidos').style.backgroundColor = "#EFFBFC";
        document.getElementById('txtdireccion').style.backgroundColor = "#EFFBFC ";
        document.getElementById('txttelefono').style.backgroundColor = "#EFFBFC ";
        document.getElementById('guardar').disabled = true;
        document.getElementById('modificar').disabled = false;
 
        }  
       function limpiar() {
            $("#txtoperacion").val("registrar");  
          document.getElementById('txtnombre').style.backgroundColor = "#fff ";
        document.getElementById('txtapellidos').style.backgroundColor = "#fff";
        document.getElementById('txtdireccion').style.backgroundColor = "#fff";
        document.getElementById('txttelefono').style.backgroundColor = "#fff ";
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
         $("#txtid2").val(id2);
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


$("#myModal").on("shown.bs.modal", function(){
    $("#txtnombres").focus();
});

  </script>
  <?php
  require_once("footer.php")
  ?>