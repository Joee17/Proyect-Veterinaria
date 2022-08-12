<!DOCTYPE html>
<html lang="ES-es">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SISTEMA VETERINARIA</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>

<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">


<link rel="stylesheet" href="main.css">  

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item ">
      <a class="nav-link"  href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="img/logo2.png" alt="AdminLTE Logo" class="brand-image "
           style="opacity: .8">
           <span class="brand-text font-weight-light">Sistema Ases</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          
          
          <li class="nav-item">
            <a href="index2.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pagos
                
              </p>
            </a>
          </li>
       
         
         
        </ul>
      </nav>
  
    </div>

  </aside>

  
  <div class="content-wrapper">
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
              <!-- /.card-header -->
              <div class="card-body">
                
                <form id=frmGrabar action="" method="post" >
                <div class="row">
                    <div class="col-md-6" > 
                        <button style="  border: 1px solid ;" class="btn btn-outline-danger" id="guardar" onclick="Guardar();"><span class="fa fa-save"></span> Guardar</button>
                        <button style="  border: 1px solid ;"class="btn btn-outline-danger" id="modificar" onclick="Modificar();" disabled="true"><span class="fa fa-pencil-alt"></span> Modificar</button>
                        <button onclick="limpiar()" style="  border: 1px solid ;"type="reset" class="btn btn-outline-danger"  ><span class="fa fa-trash"></span> Limpiar</button>
                      </div>
                </div></br>
                <input class="form-control" type="text"  id="txtoperacion" name="txtoperacion" value="registrar" style="display:none;">
                <input class="form-control" type="text"  id="txtid" name="txtid" style="display:none;">
                <div class="row">
                    <div class="col-md-6">
                        <label>Nombres:</label><br>
                        <input class="form-control" type="text" placeholder="Por favor digite solo nombres"  id="txtnombres" name="txtnombres" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="txtapellidos" id="txtapellidos" placeholder="Por favor digite solo apellidos" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="fechanacimiento">Celular</label>
                        <input type="text" name="txtcelular" id="txtcelular" placeholder="Por favor digite un teléfono" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="direccion">Región</label>
                        <input type="text" name="txtregion" id="txtregion" placeholder="Por favor digite una región" class="form-control">
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                        <label for="direccion">Correo</label>
                        <input type="text" name="txtcorreo" id="txtcorreo" placeholder="Por favor digite un correo" class="form-control">
                    </div>
                    <div class="col-md-6">
                    <label>Estudios:</label><br>
                <select id="txtestudios" name="txtestudios" class="form-control" >
                <option hidden selected>Seleccione...</option>
             
                  <option value=""></option>
                 
                  
                </select>
                    </div>
                </form>
                </div></br><hr style="background-color: #f20519;
                      height: 3px;

                      width: 98%;
                      border-radius:5in;">
              <div  class="table-responsive">
              
                <table id="example" class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Celular</th>
                      <th>Regíon</th>
                      <th>Correo</th>
                      <th>Estudios</th>
                      <th style="width: 10px"></th>
                      <th style="width: 10px"></th>

                    </tr>
                  </thead>
                  <tbody style="background-color: #FFF6F4;">
                  <tr>
                      <td>a</td>
                      <td>a</td>
                      <td>a</td>
                      <td>a</td>
                      <td>a</td>
                      <td>a</td>
                      <td>a</td>
                      <td><button type="button" id="btnEditar" name="btnEditar" style="  border: 1px solid ;" class="btn btn-outline-danger"  >
                      <i class="fas fa-trash-alt"></i> </button></td>
                      <td><button type="button" id="btnEliminar" name="btnEliminar" style="  border: 1px solid ;" class="btn btn-outline-danger"  > 
                      <i class="fas fa-trash-alt"></i>
            </button> </td>
                    </tr>
             
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
          <h3><center>¿Desea eliminar este contrato?</center></h3>
          
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
 

  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline-block">
    <strong>Copyright &copy; 2021 <a style="color:#dc3545;" href="http://grupoases.pe"> MEDICANVET</a>.</strong>
    </div>
  </footer>
</div>

</body>
</html>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
