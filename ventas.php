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
            <h1 class="m-0 text-dark">Gestionar Ventas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sistema Veterinaria</a></li>
              <li class="breadcrumb-item active">Ventas</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="card">
             
              <div class="card-body">
                
                <form name="formcliente" action="crud/ventas.php" method=post >
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
                        <label>Tipo Documento:</label><br>
                        <select class="form-control" id="txtservicio" name="txtservicio" style="border:1px solid #009bab" required>
                          <option value="Elegir">Elegir</option>
                          <option value="Dni">Dni</option>
                          <option value="Pasaporte" >Pasaporte</option>
                          <option value="Ruc" >Ruc</option> 
                        </select>
                        </div>
                        <div class="col-md-6">
                        <label>Nùmero:</label><br>
                        <input style="border:1px solid #009bab"class="form-control" type="number" placeholder="Por favor digite el nùmero"  id="txtnumero" name="txtnumero" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                        </div>
                     </div>
                     <div class="row">
                    <div class="col-md-6">
                        <label for="apellidos">Nombre/Razon:</label>
                        <input style="border:1px solid #009bab" type="text" name="txtnombre/razon" id="txtnombre/razon" placeholder="Por favor digite los datos" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();"required>
                    </div>
                    <div class="col-md-6">
                        <label for="cmbPersona">Seleccione Cliente con su Mascota:</label>
                        
                        <select class="custom-select" name="cmbPersona" id="cmbPersona">
                          <option value="0">Seleccione al cliente con su mascota</option>
                          <?php 
                            include('cado/clase_cliente.php');
                            $objpersona = new Persona();
                            $listarpersona=$objpersona->listar_persona();                            
                            $i=0;
                            while($filapersona=$listarpersona->fetch()){
                              $i++;
                              echo '<option value="'.$filapersona[0].'">'.$filapersona[1].'</option>';
                            }          ?>
                        </select>                       
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <label for="cmbPersona">Fecha:</label>
                            <?php
                           // Obteniendo la fecha actual del sistema con PHP
                             $fechaActual = date('d-m-Y');
                             echo $fechaActual;
                            ?>
                        </div>
                        <div class="col-md-6">
                        <label>Seleccione Tipo Documento:</label><br>
                        <select class="form-control" id="txtservicio" name="txtservicio" style="border:1px solid #009bab" required>
                          <option value="Elegir">Elegir</option>
                          <option value="Boleta">Boleta</option>
                          <option value="Factura" >Factura</option>
                        </select>
                        </div> 
                        <div class="row">
                        <div class="col-md-6">
                        <label>Tipo :</label><br>
                        <select class="form-control" id="txtservicio" name="txtservicio" style="border:1px solid #009bab" required>
                          <option value="Seleccione un Tipo">Seleccione un Tipo</option>
                          <option value=""></option>
                          <option value="" ></option>
                        </select>
                        </div> 
                        <div class="col-md-6">
                        <label>Producto :</label><br>
                        <select class="form-control" id="txtservicio" name="txtservicio" style="border:1px solid #009bab" required>
                          <option value=""></option>
                          <option value="" ></option>
                        </select>
                        </div>
                        <div class="col-md-6">
                        <label for="precio">Precio :</label>
                        <input style="border:1px solid #009bab" type="number" step="0.01" min="0.01" name="txtprecio" id="txtprecio" placeholder="Por favor digite precio " class="form-control" >
                    </div> 
                    <div class="col-md-6">
                        <label for="stock">Stock :</label>
                        <input style="border:1px solid #009bab" type="number" step="0.01" min="0.01" name="txtstock" id="txtstock" placeholder="Por favor digite stock " class="form-control" >
                    </div>
                    <div class="col-md-6">
                        <label for="cantidad">Cantidad :</label>
                        <input style="border:1px solid #009bab" type="number" step="0.01" min="0.01" name="txtcantidad" id="txtcantidad" placeholder="Por favor digite la cantidad " class="form-control" >
                    </div>
                    <div class="col-md-6">
                        <label for="descuento">Descuento :</label>
                        <input style="border:1px solid #009bab" type="number" step="0.01" min="0.01" name="txtdescuento" id="txtdescuento" placeholder="Por favor digite el descuento " class="form-control" >
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
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th style="width: 10px"></th>
                      <th style="width: 10px"></th>
                      <th style="width: 10px"></th>
                    </tr>
                  </thead>
                  <tbody style="background-color: #FFF6F4;">
                  <?php
                  // include('cado/clase_ventas.php');
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


<?php
require_once("footer.php")
?>