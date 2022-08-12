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
            <h1 class="m-0 text-dark">Gestionar Productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sistema Veterinaria</a></li>
              <li class="breadcrumb-item active">Productos</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="card">
             
              <div class="card-body">
                
                <form name="formcliente" action="crud/productos.php" method=post >
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
                        <label>Tipo:</label><br>
                        <select class="form-control" id="txtservicio" name="txtservicio" style="border:1px solid #009bab" required>
                          <option value="Producto">Producto</option>
                          <option value="Servicio" >Servicio</option>
                          
                        </select>
                        
                    </div>
                    <div class="col-md-6">
                        <label>Nombre:</label><br>
                        <input style="border:1px solid #009bab" class="form-control" type="text" placeholder="Por favor digite solo nombre"  id="txtnombre" name="txtnombre" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="apellidos">Precio Costo:</label>
                        <input style="border:1px solid #009bab" type="number" step="0.01" min="0.01" name="txtprecio_costo" id="txtprecio_costo" placeholder="Por favor digite precio costo" class="form-control" >
                    </div>
          
                    <div class="col-md-6">
                        <label for="direccion">Precio Venta</label>
                        <input style="border:1px solid #009bab" type="number" step="0.01" min="0.01" name="txtprecio_venta" id="txtprecio_venta" placeholder="Por favor digite precio venta" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"required>
                    </div>
                   
                </div>
         <div class="row">
                    <div class="col-md-6">
                        <label for="apellidos">Fecha Vencimiento:</label>
                        <input style="border:1px solid #009bab" type="date" step="0.01" min="0.01" name="txtfecha" id="txtfecha" placeholder="Por favor digite precio costo" class="form-control" >
                    </div>
          
                  
                   
                </div>
         
            
                </form>
               </br><hr style="background-color: #ff9d00 ;
  height: 3px;

  width: 98%;
  border-radius:5in;">
           
            
              <div  class="">
              
                <table id="example" class="table table-bordered display responsive no-wrap" width="100%">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tipo</th>
                      <th>Nombre</th>
                      <th>P. Costo</th>
                      <th>P. Venta</th>
                      <th>Stock</th>
                      <th>Fecha V.</th>
                      <th style="width: 10px"></th>
                      <th style="width: 10px"></th>
                      <th style="width: 10px"></th>
                      
                    </tr>
                  </thead>
                  <tbody style="background-color: #FFF6F4;">
                  <?php
                   include('cado/clase_productos.php');
              $obj=new Productos();
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

            <td><button type="button" id="btnEditar" name="btnEditar" style="  border: 1px solid ;float:left;" class="btn btn-outline-danger"   onClick="editar('<?=$fila[0] ?>','<?=$fila[1]?>','<?=$fila[2]?>','<?=$fila[3]?>','<?=$fila[4]?>','<?=$fila[6]?>')"> 
                <i class="fas fa-edit"></i>
            </button> </td>
             <td><button type="button" id="btnEliminar" name="btnEliminar" style="  border: 1px solid ;float:left;" class="btn btn-outline-danger"  data-toggle="modal" data-target="#modal_stock"  onClick="eliminar('<?=$fila[0]?>')"> 
                     <i class="fas fa-plus"></i>
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
         <form id=frmEliminar action="crud/cliente.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion2" name="txtoperacion2" value="eliminar" style="display:none;">
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


  <div class="modal fade" id="modal_stock" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="titulo3">Agregar Stock</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <form id="frm" action="crud/login.php" method="POST" >
         <input class="form-control" type="text" id="txtoperacion5" name="txtoperacion5"  style="display:none;">
          
          
          <input class="form-control" type="text" id="txtid3" name="txtid3"  style="display:none;">
          <div class="form-group">
        <label>Cantidad:</label><br>
        <input class="form-control" type="text" id="txtcantidad" name="txtcantidad"  required>
        <div id="result-username"></div>
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


  <?php
  require_once("footer.php")
  ?>
    <script >
    
   function editar(id,servicio,nombre,precio_costo,precio_venta,fecha) {
        $("#txtoperacion").val("modificar");      
        $("#txtid").val(id);
        $("#txtservicio").val(servicio);
        $("#txtnombre").val(nombre);
        $("#txtprecio_costo").val(precio_costo);
        $("#txtprecio_venta").val(precio_venta);
        $("#txtfecha").val(fecha);
        document.getElementById('guardar').disabled = true;
        document.getElementById('modificar').disabled = false;
         document.getElementById('txtservicio').style.backgroundColor = "#EFFBFC";
        document.getElementById('txtnombre').style.backgroundColor = "#EFFBFC";
        document.getElementById('txtprecio_costo').style.backgroundColor = "#EFFBFC" ;
        document.getElementById('txtprecio_venta').style.backgroundColor = "#EFFBFC";
        document.getElementById('txtfecha').style.backgroundColor = "#EFFBFC";
        }  
       function limpiar() {
            $("#txtoperacion").val("registrar");  
          document.getElementById('txtservicio').style.backgroundColor = "#fff";
        document.getElementById('txtnombre').style.backgroundColor = "#fff";
        document.getElementById('txtprecio_costo').style.backgroundColor = "#fff";
        document.getElementById('txtprecio_venta').style.backgroundColor = "#fff ";
        document.getElementById('txtfecha').style.backgroundColor = "#fff ";
        document.getElementById('guardar').disabled = false;
        document.getElementById('modificar').disabled = true;
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