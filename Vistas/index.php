<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    
}
include_once '../DAO/Registro/Rct.php';
$rct = new Rct();
$rcts = $rct->listar_en_progreso($_SESSION['id_usuario']);

$verde = new Rct();
$verdes = $verde->listar_cambios_verde($_SESSION['id_usuario']);

$amarillo = new Rct();
$amarillos = $amarillo->listar_cambios_amarillo($_SESSION['id_usuario']);

$rojo = new Rct();
$rojos = $rojo->listar_cambios_rojo($_SESSION['id_usuario']);
//var_dump($rojos);
//exit();

unset($_SESSION['mensaje_cliente']);
unset($_SESSION['cliente_idcliente']);
unset($_SESSION['cliente_nombre']);
unset($_SESSION['cliente_estado']);
unset($_SESSION['cliente_fecharegistro']);
unset($_SESSION['accion_cliente']);
unset($_SESSION['arreglo_buscado_cliente']);

unset($_SESSION['mensaje_rct']);
unset($_SESSION['rct_idrct']);
unset($_SESSION['rct_tiporegistro']);
unset($_SESSION['rct_fechain']);
unset($_SESSION['rct_fechafin']);
unset($_SESSION['rct_asignado']);
unset($_SESSION['rct_ticket']);
unset($_SESSION['rct_servidor']);
unset($_SESSION['rct_detalle']);
unset($_SESSION['rct_observacion']);
unset($_SESSION['rct_archivo']);
unset($_SESSION['rct_fecharegistro']);
unset($_SESSION['rct_estado']);
unset($_SESSION['usu_idusu']);
unset($_SESSION['accion_rct']);

unset($_SESSION['arreglo_buscado_rct']);
unset($_SESSION['mensaje_rol']);
unset($_SESSION['rol_idrol']);
unset($_SESSION['rol_nombre']);
unset($_SESSION['rol_estado']);
unset($_SESSION['rol_fecharegistro']);
unset($_SESSION['accion_rol']);

unset($_SESSION['arreglo_buscado_rol']);

unset($_SESSION['mensaje_usuario']);
unset($_SESSION['usu_nombres_usuario']);
unset($_SESSION['usu_apellidos_usuario']);
unset($_SESSION['usu_numdoc_usuario']);
unset($_SESSION['usu_nom_usuario']);
unset($_SESSION['usu_contrasenia']);
unset($_SESSION['usu_estado']);
unset($_SESSION['usu_foto']);
unset($_SESSION['usu_email_institucional']);
unset($_SESSION['usu_fecharegistro']);
unset($_SESSION['rol_idrol']);
unset($_SESSION['accion_usuario']);
unset($_SESSION['arreglo_buscado_usuario']);
unset($_SESSION['accion_usuario']);
?>
<!DOCTYPE html>
<html>
    
  <head>
     <META HTTP-EQUIV="REFRESH" CONTENT="60;URL=index.php">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INTEGRATION  | UNIQUE</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
     <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
    .parpadea {
  
  animation-name: parpadeo;
  animation-duration: 2s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;

  -webkit-animation-name:parpadeo;
  -webkit-animation-duration: 2s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
}

@-moz-keyframes parpadeo{  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}

@-webkit-keyframes parpadeo {  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
   100% { opacity: 1.0; }
}

@keyframes parpadeo {  
  0% { opacity: 1.0; }
   50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}
</style>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

       <?php require 'Cabecera.php' ?>  
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../Controles/Fotos/<?php echo $_SESSION['foto']?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['user_personal']?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <a href="index.php">
                <li class="header">MAIN MENU</li>
            </a>  
            <?php if ($_SESSION['id_rol']==3) {?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>USER</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Users <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="GuardarUsuario.php"><i class="fa fa-circle-o"></i> Register User </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerUsuario.php"><i class="fa fa-circle-o"></i> Manage User </a></li>                    
                  </ul>                  
                </li>
                   
              </ul>
            </li>
            <?php } ?>
            <?php if ($_SESSION['id_rol']==3) {?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-group"></i> <span>CLIENT</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Clients <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="GuardarCliente.php"><i class="fa fa-circle-o"></i> Register Client </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerCliente.php"><i class="fa fa-circle-o"></i> Manage Client </a></li>                    
                  </ul>                  
                </li>
                   
              </ul>
            </li>
            <?php } ?>
            <?php if ($_SESSION['id_rol']==3) {?>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-graduation-cap"></i> <span>ROLE</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Roles <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="AsignarClienteRol.php"><i class="fa fa-circle-o"></i> Assign Client </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerClienteRol.php"><i class="fa fa-circle-o"></i> Manage Assign </a></li>                    
                  </ul>                  
                </li>
                   
              </ul>
            </li>
            <?php } ?>
            <li  class="treeview" >
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>RCT</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li>
                  <a href="#"><i class="fa fa-circle"></i> RCT <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarRCT.php"><i class="fa fa-circle-o"></i> Register RCT </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerRCT.php"><i class="fa fa-circle-o"></i> Manage RCT </a></li>                    
                  </ul>
                </li>
                   
              </ul>
            </li>
           <li class="treeview">
              <a href="#">
                <i class="fa fa-unlock"></i> <span>PASSWORD</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Password <i class="fa fa-angle-left pull-right"></i></a>                  
                  <ul class="treeview-menu">
                      <li><a href="CambiarPassword.php"><i class="fa fa-circle-o"></i> Change Password </a></li>                    
                  </ul>
                </li>                   
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
<!--        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>-->

        <!-- Main content -->
        <section class="content">
       
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              

              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-tasks"></i>
                  <h3 class="box-title">CHANGES IN PROGRESS</h3><br><br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="background-color:#FF5733;font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>&nbsp;&nbsp;&nbsp;&nbsp;FINISHED CHANGES</strong><br> 
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="background-color:#F4D03F;font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>&nbsp;&nbsp;&nbsp;&nbsp;CHANGES TO FINISH</strong><br> 
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="background-color:#58D68D;font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>&nbsp;&nbsp;&nbsp;&nbsp;CHANGES IN PROGRESS</strong><br> 
                                    
                </div>
                <div class="box-body chat" >
                 <div class="table-responsive">
                  <table id="example1" class="table table-bordered">
 <?php if ($verdes != null or $amarillos!= null or $rojos!= null ) { ?>
                     
                    <thead>
                      <tr style="font-size:8pt;font-weight: bold;color: black">
                        <th width="5%"> TICKET</th>                         
                        <th width="10%"> CLIENT</th>                        
                        <th width="30%"> DETAIL</th>
                        <th width="15%"> SPECIALIST</th>
                        <th width="10%"> START DATE</th>
                        <th width="10%"> FINISH DATE</th>  
                        <th width="10%"> SERVERS</th> 
                        <th width="10%"> OBSERVATION</th> 
                         
                      </tr>
                    </thead>
                    <tbody>
   <?php    
    if($rojos!= null) { foreach ($rojos as $r) { 
        ?>
                      <tr style="font-size:10pt;font-weight: bold; color:white
                          " class="parpadea" bgcolor="#FF5733">
                        
                        <td><?php echo $r['rct_ticket']; ?></td>
                        <td><?php echo $r['cliente_nombre']; ?></td>
                        <td><?php echo $r['rct_detalle']; ?></td>
                        <td><?php echo $r['rct_asignado']; ?></td>
                        <td><?php echo date("d-m-Y H:i",strtotime($r['rct_fechain'])); ?></td>
                        <td><?php echo date("d-m-Y H:i",strtotime($r['rct_fechafin'])); ?></td>
                        <td><?php echo $r['rct_servidor']; ?></td>                        
                        <td><?php echo $r['rct_observacion']; ?></td>
                                           
                      </tr>
 <?php } }?>
                     <?php
    $num = 1;
    if($amarillos!= null) { foreach ($amarillos as $a) {
        ?>
                      <tr style="font-size:10pt;font-weight: bold;color:darkblue" bgcolor="#F4D03F">
                        <td><?php echo $a['rct_ticket']; ?></td>
                        <td><?php echo $a['cliente_nombre']; ?></td>
                        <td><?php echo $a['rct_detalle']; ?></td>
                        <td><?php echo $a['rct_asignado']; ?></td>
                        <td><?php echo date("d-m-Y H:i",strtotime($a['rct_fechain'])); ?></td>
                        <td><?php echo date("d-m-Y H:i",strtotime($a['rct_fechafin'])); ?></td>
                        <td><?php echo $a['rct_servidor']; ?></td>                        
                        <td><?php echo $a['rct_observacion']; ?></td>
                                               
                      </tr>
    <?php }} ?>
                      <?php
    $num = 1;
    if($verdes!= null) { foreach ($verdes as $v) {
        ?>
                      <tr style="font-size:10pt;font-weight: bold; color:#34495E" bgcolor="#58D68D">
                        
                        <td><?php echo $v['rct_ticket']; ?></td>
                        <td><?php echo $v['cliente_nombre']; ?></td>
                        <td><?php echo $v['rct_detalle']; ?></td>
                        <td><?php echo $v['rct_asignado']; ?></td>
                        <td><?php echo date("d-m-Y H:i",strtotime($v['rct_fechain'])); ?></td>
                        <td><?php echo date("d-m-Y H:i",strtotime($v['rct_fechafin'])); ?></td>
                        <td><?php echo $v['rct_servidor']; ?></td>                        
                        <td><?php echo $v['rct_observacion']; ?></td>                                               
                      </tr>
    <?php }} ?>
                    </tbody>
                     
                    <tfoot>
                      <tr style="font-size:8pt;font-weight: bold;color: black" >
                        <th> TICKET</th> 
                        <th> CLIENT</th>
                        <th> DETAIL</th>
                        <th> SPECIALIST</th>
                        <th> START DATE</th>
                        <th> FINISH DATE</th>  
                        <th> SERVERS</th> 
                        <th> OBSERVATION</th>      
                      </tr>
                    </tfoot>
                   <?php } else { ?>
                    <div class="alert alert-info"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No changes in progress..!</div> 


                    <?php } ?>
                  </table>
                 </div>
                    
                    
                </div><!-- /.chat -->
                
              </div><!-- /.box (chat box) -->


            </section><!-- /.Left col -->
            
            
            
            
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
           
          </div><!-- /.row (main row) -->
           
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; <?php echo date("Y");?> <a href="http://www.ibm.com/pe-es/">IBM DEL PERÚ</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          
          
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <!-- /.control-sidebar-menu -->

            
            <!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <!-- Settings tab content -->
         
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <script type="text/javascript" src="../Recursos/js/JSGeneral.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>

