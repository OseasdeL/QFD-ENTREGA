<?php

    require_once("../../php/conexion.php");
    $conexion = conectar();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Sistema QFD | Formulario Evaluación Ingeniería</title>
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

        <!-- Sweet Alert Css -->
        <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        
        <!-- JQuery DataTable Css -->
        <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Custom Css -->
        <link href="../../css/style.css" rel="stylesheet">

        <!-- Bootstrap Select Css -->
        <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- noUISlider Css -->
        <link href="../../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="../../css/themes/all-themes.css" rel="stylesheet" />

        <script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>

        <script type="text/javascript">

            $(document).ready(function(){
				$("#codQfdEvaluacion").change(function () {
                    
					$("#codQfdEvaluacion option:selected").each(function () {
						id_codqfevaluacion = $(this).val();
						$.post("../../php/QFD_QfdQues3.php", { id_codqfevaluacion: id_codqfevaluacion }, function(data){
							$("#codComoEval").html(data);
						});            
					});
				})
			});

            //FORMULARIO MODIFICAR

            $(document).ready(function(){
				$("#codQfdEvaluacionM").change(function () {
                    
					$("#codQfdEvaluacionM option:selected").each(function () {
						id_codqfevaluacionM = $(this).val();
						$.post("../../php/QFD_QfdQues3.php", { id_codqfevaluacionM: id_codqfevaluacionM }, function(data){
							$("#codComoEvalM").html(data);
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
                                    INGRESO EVALUACIÓN DE INGENIERÍA                               
                                </h2>                            
                            </div>
                            <div class="body">
                                <form action="../../php/Mantenimientos/ABC_Evaluacion.php" method="POST">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="codQfdEvaluacion" id="codQfdEvaluacion">
                                                <option> Nombre QFD</option>
                                                <?php
                                                $select = "SELECT id_qfd, nom_qfd FROM qfd";
                                                $res = mysqli_query($conexion,$select);
                                                while($row = mysqli_fetch_array($res)){
                                                    echo "<option value = '".$row['0']."'>".$row['1']."</option>";     
                                                }
                                                ?>                                             
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line" id="codComoEval">
                                            <select class="form-control show-tick" name="codComoEval" id="codComoEval">                                                                                                                 
                                                <option value='0'>Seleccione un Como</option>
                                            </select>
                                        </div>
                                    </div>                                                   
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="evalComo">
                                                <option>Evaluación</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>                                                                       
                                    <button name="inEval" class="btn btn-primary waves-effect" type="submit">INGRESAR</button>
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
                                    MODIFICAR EVALUACIÓN DE INGENIERÍA                                
                                </h2>                            
                            </div>
                            <div class="body">
                                <form action="../../php/Mantenimientos/ABC_Evaluacion.php" method="POST">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="codEval" required>
                                            <label class="form-label">Código Evaluación</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="codQfdEvaluacion" id="codQfdEvaluacionM">
                                                <option> Nombre QFD</option>
                                                <?php
                                                $select = "SELECT id_qfd, nom_qfd FROM qfd";
                                                $res = mysqli_query($conexion,$select);
                                                while($row = mysqli_fetch_array($res)){
                                                    echo "<option value = '".$row['0']."'>".$row['1']."</option>";     
                                                }
                                                ?>                                             
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line" id="codComoEvalM">
                                            <select class="form-control show-tick" name="codComoEval" id="codComoEvalM">                                                                                                                 
                                                <option value="0">Seleccione un Como</option>
                                            </select>
                                        </div>
                                    </div>                                                   
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="evalComo">
                                                <option>Evaluación</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>                                                                       
                                    <button name="upEval" class="btn btn-primary waves-effect" type="submit">MODIFICAR</button>
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
                                    ELIMINAR EVALUACIÓN DE INGENIERÍA                                
                                </h2>                            
                            </div>
                            <div class="body">
                                <form action="../../php/Mantenimientos/ABC_Evaluacion.php" method="POST">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="codEval" required>
                                            <label class="form-label">Código Evaluación</label>
                                        </div>
                                    </div>                                                             
                                    <button name="delEval" class="btn btn-primary waves-effect" type="submit">ELIMINAR</button>
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
                                    VISTA EVALUACIÓN INGENIERIA
                                </h2>                            
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>Código Evaluación</th>
                                                <th>Código Qfd</th>
                                                <th>Nombre Qfd</th>
                                                <th>Código Como</th>
                                                <th>Nombre Como</th>
                                                <th>Viabilidad</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Código Evaluación</th>
                                                <th>Código Qfd</th>
                                                <th>Nombre Qfd</th>
                                                <th>Código Como</th>
                                                <th>Nombre Como</th>
                                                <th>Viabilidad</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php   
                                                $query = "SELECT ID_EI, ID_QFD, NOM_QFD, ID_COMO, NOM_COMO, VIAB FROM EV_ING";
                                                $rs = mysqli_query($conexion,$query);
                                                $contador = 1;

                                                while($fila2 = mysqli_fetch_array($rs)){

                                                    echo "<tr>";
                                                        echo "<td> $fila2[ID_EI] </td>";
                                                        echo "<td >$fila2[ID_QFD]</td>";
                                                        echo "<td >$fila2[NOM_QFD]</td>";
                                                        echo "<td >$fila2[ID_COMO]</td>";
                                                        echo "<td >$fila2[NOM_COMO]</td>";
                                                        echo "<td >$fila2[VIAB]</td>";
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

        <!-- Bootstrap Tags Input Plugin Js -->
        <script src="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

        <!-- noUISlider Plugin Js -->
        <script src="../../plugins/nouislider/nouislider.js"></script>
        
        <!-- Multi Select Plugin Js -->
        <script src="../../plugins/multi-select/js/jquery.multi-select.js"></script>

        <!-- Select Plugin Js -->
        <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="../../plugins/node-waves/waves.js"></script>
        
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

        <!-- Demo Js -->
        <script src="../../js/demo.js"></script>
    </body>
</html>