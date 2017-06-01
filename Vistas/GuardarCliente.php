<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
if ($_SESSION['id_rol']==3){ 
//------------------------------------------------
if(!isset($_SESSION['accion_cliente'])){ 
    $_SESSION['accion_cliente']="";
}
if(!isset($_SESSION['mensaje_cliente'])){ 
    $_SESSION['mensaje_cliente']="Successful registration";
}
if(isset($_SESSION['cliente_idcliente']))         { $id = $_SESSION['cliente_idcliente'];} else{ $id =""; }
if(isset($_SESSION['cliente_nombre']))         { $nombres = $_SESSION['cliente_nombre'];} else{ $nombres =""; }
if(isset($_SESSION['cliente_estado']))         { $estado = $_SESSION['cliente_estado'];} else{ $estado =""; }
if(isset($_SESSION['cliente_fecharegistro']))         { $fechareg = $_SESSION['cliente_fecharegistro'];} else{ $fechareg =""; }

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
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-group"></i> <span>CUSTOMER</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li class="active">
                  <a href="#"><i class="fa fa-circle-o"></i> Customers <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li class="active"><a href="GuardarCliente.php"><i class="fa fa-circle-o"></i> Register Customer </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerCliente.php"><i class="fa fa-circle-o"></i> Manage Customer </a></li>                    
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
                      <li><a href="AsignarClienteRol.php"><i class="fa fa-circle-o"></i> Assign Customer </a></li>                    
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
            REGISTER CUSTOMER
            <small>Enter CUSTOMER Data</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-user"></i> CUSTOMER</a></li>
            <li><a href="index.php">Customer</a></li>
            <li class="active">Register Customer</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row"> 
           <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Customer Information</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="../Controles/Registro/CCliente.php" method="POST">
                    <input type="hidden" id="hiddencliente" name="hidden_cliente" value="save">  
                    <input type="hidden" name="idcli" value="<?php echo $id; ?>"/>
                  <div class="box-body">
                    <div class="form-group">
                        <label for="inputnombre" class="col-sm-2 control-label"><span class="pull-left">Customer</span></label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="t_cliente" value="<?php echo $nombres; ?>" placeholder="Register Client">
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
						        <?php echo $_SESSION['mensaje_cliente'];?>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="button" class="btn btn-primary">Save</button>
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
        <strong>Copyright &copy; <?php echo date("Y");?> <a href="http://www.ibm.com/pe-es/">IBM DEL PERÚ</a>.</strong> All rights reserved.</footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Recursos/js/JSGeneral.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
      <!-- Unicas Librerias Utiliazabas para subir archivos imagens, audio, etc-->
        <link href="../Recursos/filebootstrap/kartik-v-bootstrap-fileinput-d66e684/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="../Recursos/filebootstrap/kartik-v-bootstrap-fileinput-d66e684/js/fileinput.js" type="text/javascript"></script>    
        <!-- fin -->
  </body>
</html>
<?php }else {header("location:sin_accesos.php");}?>