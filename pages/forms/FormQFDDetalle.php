<?php

    require_once("../../php/conexion.php");
    $conexion = conectar();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Sistema QFD | Formulario Registro Qfd's</title>
        <!-- Favicon-->
        <link rel="icon" href="../../favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="../../css/google1-api.css" rel="stylesheet" type="text/css">
        <link href="../../css/google2-api.css" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Bootstrap Material Datetime Picker Css -->
        <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
        
        <!-- Wait Me Css -->
        <link href="../../plugins/waitme/waitMe.css" rel="stylesheet" />

        <!-- Bootstrap Select Css -->
        <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
        
        <!-- Sweet Alert Css -->
        <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        
        <!-- JQuery DataTable Css -->
        <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        
        <!-- Custom Css -->
        <link href="../../css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="../../css/themes/all-themes.css" rel="stylesheet" />

        <script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>    

        <script type="text/javascript">

            $(document).ready(function(){
				$("#idnomC").change(function () {
                    
					$("#idnomC option:selected").each(function () {
						id_codqfcliente = $(this).val();
						$.post("../../php/QFD_ClienteProdServ.php", { id_codqfcliente: id_codqfcliente }, function(data){
							$("#idnomPS").html(data);
						});            
					});
				})
			});

            //Formulario Modificar

            $(document).ready(function(){
				$("#idnomCM").change(function () {
                    
					$("#idnomCM option:selected").each(function () {
						id_codqfclienteM = $(this).val();
						$.post("../../php/QFD_ClienteProdServ.php", { id_codqfclienteM: id_codqfclienteM }, function(data){
							$("#idnomPSM").html(data);
						});            
					});
				})
			});

        </script>
    </head>

    <body class="theme-red">
        
        <?php
            
            session_start();

            if(!isset($_SESSION['usuario']) && !isset($_SESSION['pass'])){

                header('Location: ../../index.php');

            }else{

                $nick = $_SESSION['usuario'];
                $selectQueryA = "SELECT email FROM usuarios WHERE nickname ='".$nick."'";
                $rs = mysqli_query($conexion,$selectQueryA);                           

                $fila = mysqli_fetch_array($rs);
                $emailU =  $fila["email"];

            }
        ?>

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">              
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="../../Menu.php">CLIENTES</a>
                </div>           
            </div>
        </nav>
        <!-- #Top Bar -->
        
        <section>

            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">

                <!-- User Info -->
                <div class="user-info">
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nick; ?></div>
                        <div class="email"><?php echo $emailU; ?></div>
                    </div>
                </div>
                <!-- #User Info -->

                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MENÚ DEL SISTEMA</li>
                        <li class="active">
                            <a href="../../Menu.php">
                                <i class="material-icons">home</i>
                                <span>INICIO</span>
                            </a>
                        </li>
                        <li>
                            <a href="FormClientes.php">
                                <i class="material-icons">account_box</i>
                                <span>CLIENTES</span>
                            </a>
                        </li>
                        <li>
                            <a href="FormCompetencias.php">
                                <i class="material-icons">store_mall_directory</i>
                                <span>COMPETENCIAS</span>
                            </a>
                        </li>
                        <li>
                            <a href="FormProdServ.php">
                                <i class="material-icons">shopping_cart</i>
                                <span>PRODUCTOS/SERVICIOS</span>
                            </a>
                        </li>
                        <li>
                            <a href="FormNecesidades.php">
                                <i class="material-icons">report_problem</i>
                                <span>NECESIDADES</span>
                            </a>
                        </li>
                        <li>
                            <a href="FormSoluciones.php">
                                <i class="material-icons">build</i>
                                <span>SOLUCIONES</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">work</i>
                                <span>CREACIÓN QFD'S</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="FormQFDDetalle.php">QFD</a>
                                </li>
                                <li>
                                    <a href="FormQFDAsignacion.php">ASIGNACIÓN</a>
                                </li>
                                <li>
                                    <a href="FormQFDMatriz.php">MATRIZ DE RELACIÓN</a>
                                </li>
                                <li>
                                    <a href="FormQFDBenchmarking.php">BENCHMARKING COMPETENCIA</a>
                                </li>
                                <li>
                                    <a href="FormQFDBenchmarkingC.php">BENCHMARKING CLIENTE</a>
                                </li>
                                <li>
                                    <a href="FormQFDEvaluacionI.php">EVALUACIÓN INGENIERÍA</a>
                                </li>
                                <li>
                                    <a href="FormQFDCvC.php">EVALUACIÓN COMO'S</a>
                                </li>
                            </ul>
                        </li>  
                        <li>
                            <a href="FormUsuario.php">
                                <i class="material-icons">account_circle</i>
                                <span>PERFIL</span>
                            </a>
                        </li>
                        <li>
                            <a href="../../php/cerrar_sesion.php">
                                <i class="material-icons">power_settings_new</i>
                                <span>SALIR</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- #Menu -->

                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                    </div>
                    <div class="version">
                        <b>Version: </b> 1.0.5
                    </div>
                </div>
                <!-- #Footer -->

            </aside>
            <!-- #END# Left Sidebar -->       

        </section>

        <section class="content">
            <div class="container-fluid">                 

                <!-- Vertical Layout | With Floating Label -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    INGRESO QFD                            
                                </h2>                            
                            </div>
                            <div class="body">
                                <form action="../../php/Mantenimientos/ABC_QFD.php" method="POST">                                                            
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Please choose a date..." required name="fechaQFD">
                                        </div>
                                    </div> 
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nomQFD" required>
                                            <label class="form-label">Nombre QFD</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="idnomC" id="idnomC">
                                                <option>Cliente</option>
                                                <?php
                                                    $select = "SELECT id_c, nom_emp FROM clientes";
                                                    $res = mysqli_query($conexion,$select);
                                                    while($row = mysqli_fetch_array($res)){
                                                        echo "<option value = '".$row['0']."'>".$row['1']."</option>";                                    
                                                    }
                                                ?>                                                 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line" id="idnomPS">
                                            <select class="form-control show-tick" name="idnomPS" id="idnomPS">
                                                <option>Seleccione Producto/Servicio</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="descQFD" required></textarea>
                                            <label class="form-label">Descripción</label>
                                        </div>
                                    </div>                                                                        
                                    <button name="inQFD" class="btn btn-primary waves-effect" type="submit">INGRESAR</button>
                                </form>                          
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Vertical Layout | With Floating Label -->    

                <!-- Vertical Layout | With Floating Label -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    MODIFICAR QFD'S                         
                                </h2>                            
                            </div>
                            <div class="body">
                                <form action="../../php/Mantenimientos/ABC_QFD.php" method="POST"> 
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="codQFD" required>
                                            <label class="form-label">Código QFD</label>
                                        </div>
                                    </div>                                                           
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Please choose a date..." required name="fechaQFD">
                                        </div>
                                    </div> 
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nomQFD" required>
                                            <label class="form-label">Nombre QFD</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="idnomC" id="idnomCM">
                                                <option>Cliente</option>
                                                <?php
                                                    $select = "SELECT id_c, nom_emp FROM clientes";
                                                    $res = mysqli_query($conexion,$select);
                                                    while($row = mysqli_fetch_array($res)){
                                                        echo "<option value = '".$row['0']."'>".$row['1']."</option>";                                    
                                                    }
                                                ?>                                                 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line" id="idnomPSM">
                                            <select class="form-control show-tick" name="idnomPS" id="idnomPSM">
                                                <option>Seleccione Producto/Servicio</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="descQFD" required></textarea>
                                            <label class="form-label">Descripción</label>
                                        </div>
                                    </div>                                                                        
                                    <button name="upQFD" class="btn btn-primary waves-effect" type="submit">MODIFICAR</button>
                                </form>                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Vertical Layout | With Floating Label -->    

                <!-- Vertical Layout | With Floating Label -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    ELIMINAR QFD'S                                
                                </h2>                            
                            </div>
                            <div class="body">
                                <form action="../../php/Mantenimientos/ABC_QFD.php" method="POST"> 
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="codQFD" required>
                                            <label class="form-label">Código QFD</label>
                                        </div>
                                    </div>                                                               
                                    <button name="delQFD" class="btn btn-primary waves-effect" type="submit">ELIMINAR</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Vertical Layout | With Floating Label -->               
                            
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    VISTA DATOS GENERALES QFD
                                </h2>                            
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>Código Qfd</th>
                                                <th>Nombre Qfd</th>
                                                <th>Fecha</th>
                                                <th>Nombre Cliente</th>
                                                <th>Nombre Servicio</th>
                                                <th>Descripción Qfd</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Código Qfd</th>
                                                <th>Nombre Qfd</th>
                                                <th>Fecha</th>
                                                <th>Nombre Cliente</th>
                                                <th>Nombre Servicio</th>
                                                <th>Descripción Qfd</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php   
                                                $query = "SELECT ID_QFD, NOM_QFD, FECHA, ID_C, NOM_C, ID_PS, NOM_PS, DES_QFD FROM QFD";
                                                $rs = mysqli_query($conexion,$query);
                                                $contador = 1;

                                                while($fila2 = mysqli_fetch_array($rs)){

                                                    echo "<tr>";
                                                        echo "<td> $fila2[ID_QFD] </td>";
                                                        echo "<td >$fila2[NOM_QFD]</td>";
                                                        echo "<td >$fila2[FECHA]</td>";
                                                        echo "<td >$fila2[NOM_C]</td>";
                                                        echo "<td >$fila2[NOM_PS]</td>";
                                                        echo "<td >$fila2[DES_QFD]</td>";
                                                    echo "</tr>";                 
                                                    $contador++;
                                                }
                                            ?>
                                        </tbody>                                    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Exportable Table -->
                
            </div>
        </section>

       <!-- Jquery Core Js -->
       <script src="../../plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Bootstrap Notify Plugin Js -->
        <script src="../../plugins/bootstrap-notify/bootstrap-notify.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="../../plugins/node-waves/waves.js"></script>

        <!-- Autosize Plugin Js -->
        <script src="../../plugins/autosize/autosize.js"></script>

        <!-- Moment Plugin Js -->
        <script src="../../plugins/momentjs/moment.js"></script>

        <!-- Bootstrap Material Datetime Picker Plugin Js -->
        <script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

        <!-- Jquery DataTable Plugin Js -->
        <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

        <!-- Custom Js -->    
        <script src="../../js/pages/tables/jquery-datatable.js"></script>
        <script src="../../js/admin.js"></script>
        <script src="../../js/pages/forms/basic-form-elements.js"> </script> 

        <!-- Demo Js -->
        <script src="../../js/demo.js"></script>
    </body>
</html>