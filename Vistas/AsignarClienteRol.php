<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
if ($_SESSION['id_rol'] == 3) {
//------------------------------------------------
    if (!isset($_SESSION['accion_rol'])) {
        $_SESSION['accion_rol'] = "";
    }

    include_once '../DAO/Registro/Rol.php';
    include_once '../DAO/Registro/Cliente.php';

//$privilegios = $_SESSION['array_menus'];

    $rol = new Rol();
    $roles = $rol->listar_sin_privilegios();

    $rol2 = new Rol();
    $roles2 = $rol2->listar();

    $cliente = new Cliente();
    $clientes = $cliente->listar();

    if (isset($_SESSION['rol_idrol'])) {
        $id = $_SESSION['rol_idrol'];
    } else {
        $id = "";
    }
    if (isset($_SESSION['accion_rol']) && $_SESSION['accion_rol'] != '') {
        $cliente2 = new Cliente();
        $clientes2 = $cliente2->listar_por_rol($id);
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>INTEGRATION  | RCT</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Bootstrap 3.3.5 -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

            <!-- Ionicons -->
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <!-- Select2 -->
            <link rel="stylesheet" href="plugins/select2/select2.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
            <!-- AdminLTE Skins. Choose a skin from the css/skins
                 folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
            <style>
                .color-palette {
                    height: 35px;
                    line-height: 35px;
                    text-align: center;
                }
                .color-palette-set {
                    margin-bottom: 15px;
                }
                .color-palette span {
                    display: none;
                    font-size: 12px;
                }
                .color-palette:hover span {
                    display: block;
                }
                .color-palette-box h4 {
                    position: absolute;
                    top: 100%;
                    left: 25px;
                    margin-top: -40px;
                    color: rgba(255, 255, 255, 0.8);
                    font-size: 12px;
                    display: block;
                    z-index: 7;
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
                                <img src="../Controles/Fotos/<?php echo $_SESSION['foto'] ?>" class="img-circle" alt="User Image">
                            </div>
                            <div class="pull-left info">
                                <p><?php echo $_SESSION['user_personal'] ?></p>
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
            
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-graduation-cap"></i> <span>ROLE</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li class="active">
                  <a href="#"><i class="fa fa-circle-o"></i> Roles <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li class="active"><a href="AsignarClienteRol.php"><i class="fa fa-circle-o"></i> Assign Client </a></li>                    
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
                    <section class="content-header">
                        <h1>
                            ASSIGN CLIENT
                            <small>Information Assignation </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="index.php"><i class="fa fa-user"></i> ROLE</a></li>
                            <li><a href="index.php">Roles</a></li>
                            <li class="active">Assign Client</li>
                        </ol>
                    </section>

                    <!-- Main content -->
                    <section class="content">
                        <div class="row"> 
                            <div class="col-md-12">
                                <!-- Horizontal Form -->
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Select Clients by Role</h3>
                                    </div><!-- /.box-header -->
                                    <!-- form start -->
                                    <form class="form-horizontal" action="../Controles/Registro/CRol.php" method="POST">
                                        <input type="hidden" id="hiddenrol" name="hidden_rol" value="save">  
                                        <input type="hidden" name="idrol" value="<?php echo $id; ?>"/>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="inputnombre" class="col-sm-2 control-label"><span class="pull-left">Role</span></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="c_rol" required>
                                                        <option>--SELECT--</option>

                                                        <?php foreach ($roles2 as $r) {
                                                            ?>

                                                            <option value="<?php echo $r['rol_idrol']; ?>" <?php if ($id == $r['rol_idrol']) echo 'selected'; ?>><?php echo $r['rol_nombre']; ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>






                                            <div class="form-group">
                                                <label for="inputpaterno" class="col-sm-2 control-label"><span class="pull-left">Select Client(s)</span></label>
                                                <div class="col-sm-10">                                            
                                                    <?php foreach ($clientes as $c) {
                                                        ?>

                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" id="inlineCheckbox<?php echo $c['cliente_idcliente']; ?>" name="check_list[]" value="<?php echo $c['cliente_idcliente']; ?>" <?php
                                                            if (isset($_SESSION['accion_rol']) && $_SESSION['accion_rol'] != '') {
                                                                if ($clientes2 != null) {
                                                                    foreach ($clientes2 as $t) {
                                                                        if ($t['cliente_idcliente'] == $c['cliente_idcliente'])
                                                                            echo 'checked';
                                                                    }
                                                                }
                                                            }
                                                            ?>> <?php echo $c['cliente_nombre']; ?>
                                                        </label><br>                                            
    <?php } ?>                                   
                                                </div>
                                            </div>



                                        </div><!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-default" onclick="cancelar();">CANCEL</button>
                                            <button type="submit" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">SAVE</button>
                                        </div><!-- /.box-footer -->
                                    </form>
                                </div><!-- /.box -->
                                <!-- general form elements disabled -->

                            </div><!--/.col (right) --> 
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                                        </div>
                                        <div class="modal-body">
                                            Se ha registrado satisfactoriamente el usuario.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </div>
                                </div>

                            </div> 
                        </div> <!--/.row  -->  

                        <!-- END TYPOGRAPHY -->

                    </section><!-- /.content -->
                </div><!-- /.content-wrapper -->
                <footer class="main-footer">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 1.0.0
                    </div>
                    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="http://www.ibm.com/pe-es/">IBM DEL PERÚ</a>.</strong> All rights reserved.
                </footer>

                <!-- Add the sidebar's background. This div must be placed
                     immediately after the control sidebar -->
                <div class="control-sidebar-bg"></div>
            </div><!-- ./wrapper -->

            <!-- Select2 -->
            <script src="plugins/select2/select2.full.min.js"></script>
            <!-- jQuery 2.1.4 -->
            <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
            <script type="text/javascript" src="../Recursos/js/JSGeneral.js"></script>
            <!-- Bootstrap 3.3.5 -->
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <!-- FastClick -->
            <script src="plugins/fastclick/fastclick.min.js"></script>
            <!-- AdminLTE App -->
            <script src="dist/js/app.min.js"></script>
            <!-- SlimScroll -->
            <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <!-- FastClick -->
            <script src="plugins/fastclick/fastclick.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="dist/js/demo.js"></script>
            <!-- Unicas Librerias Utiliazabas para subir archivos imagens, audio, etc-->
            <link href="../Recursos/filebootstrap/kartik-v-bootstrap-fileinput-d66e684/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
            <script src="../Recursos/filebootstrap/kartik-v-bootstrap-fileinput-d66e684/js/fileinput.js" type="text/javascript"></script>    
            <!-- fin -->

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
    <?php
}else {
    header("location:sin_accesos.php");
}?>