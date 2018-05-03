<?php

    require_once("../../php/conexion.php");
    $conex = conectar();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Sistema QFD | Formulario Registro Como's</title>
        <!-- Favicon-->
        <link rel="icon" href="../../favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="../../css/google1-api.css" rel="stylesheet" type="text/css">
        <link href="../../css/google2-api.css" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Multi Select Css -->
        <link href="../../plugins/multi-select/css/multi-select.css" rel="stylesheet">
        
        <!-- Animation Css -->
        <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Sweet Alert Css -->
        <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

        <!-- JQuery DataTable Css -->
        <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        
        <!-- Bootstrap Select Css -->
        <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- noUISlider Css -->
        <link href="../../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="../../css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="../../css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        
        <?php
            
            session_start();

            if(!isset($_SESSION['usuario']) && !isset($_SESSION['pass'])){

                header('Location: ../../index.php');

            }else{

                $nick = $_SESSION['usuario'];
                $selectQueryA = "SELECT email FROM usuarios WHERE nickname ='".$nick."'";
                $rs = mysqli_query($conex,$selectQueryA);                           

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
                    <a class="navbar-brand" href="../../Menu.php">SOLUCIONES</a>
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
                
                <!-- Vertical Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    REGISTRO DE LAS SOLUCIONES DE LOS REQUERIMIENTOS
                                </h2>                            
                            </div>
                            <div class="body">
                                <form action="../../php/Mantenimientos/ABC_Soluciones.php" method="POST">                                
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nombreSS" required>
                                            <label class="form-label">Nombre de la Solución</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="viabilidadS">
                                                <option>Viabilidad de la solución</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="codrequerimientos">
                                                <option>Requerimiento</option>
                                                <?php
                                                    $select = "SELECT id_que, nom_que FROM ques";
                                                    $res = mysqli_query($conex,$select);
                                                    while($row = mysqli_fetch_array($res)){
                                                        echo "<option value = '".$row['0']."'>".$row['1']."</option>";                                                   
                                                    }
                                                ?>                                             
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="descSol" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                            <label class="form-label">Descripción de la solución</label>
                                        </div>
                                    </div>                                                                
                                    <button class="btn btn-primary waves-effect" type="submit" name="inS">INGRESAR</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Vertical Layout -->       
                
                <!-- Vertical Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    MODIFICAR SOLUCIONES DE LOS REQUERIMIENTOS
                                </h2>                            
                            </div>
                            <div class="body">
                                <form action="../../php/Mantenimientos/ABC_Soluciones.php" method="POST">                                
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="codigoS" required>
                                            <label class="form-label">Código Cliente</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nombreSS" required>
                                            <label class="form-label">Nombre de la Solución</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="viabilidadS">
                                                <option>Viabilidad de la solución</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="codrequerimientos">
                                                <option>Requerimiento</option>
                                                <?php
                                                    $select = "SELECT id_que, nom_que FROM ques";
                                                    $res = mysqli_query($conex,$select);
                                                    while($row = mysqli_fetch_array($res)){
                                                        echo "<option value = '".$row['0']."'>".$row['1']."</option>";                                                   
                                                    }
                                                ?>                                             
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="descSol" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                            <label class="form-label">Descripción de la solución</label>
                                        </div>
                                    </div>                                                                
                                    <button class="btn btn-primary waves-effect" type="submit" name="upS">MODIFICAR</button>                                    
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Vertical Layout -->

                <!-- Vertical Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    ELIMINAR SOLUCIONES DE LOS REQUERIMIENTOS
                                </h2>                            
                            </div>
                            <div class="body">
                                <form action="../../php/Mantenimientos/ABC_Soluciones.php" method="POST">                                
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="codigoS" required>
                                            <label class="form-label">Código Cliente</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary waves-effect" type="submit" name="delS">ELIMINAR</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Vertical Layout -->
                
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    VISTA SOLUCIONES
                                </h2>                            
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>Código Solución</th>
                                                <th>Nombre Solución</th>
                                                <th>Viabilidad Solución</th>
                                                <th>Código Requerimiento</th>
                                                <th>Requerimiento</th>
                                                <th>Descripción</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Código Solución</th>
                                                <th>Nombre Solución</th>
                                                <th>Viabilidad Solución</th>
                                                <th>Código Requerimiento</th>
                                                <th>Requerimiento</th>
                                                <th>Descripción</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $query = "SELECT  ID_S, NOM_S, VIAB_S, ID_QUE, NOM_QUE, DESC_S FROM COMOS";
                                                $rs = mysqli_query($conex,$query);
                                                $contador = 1;

                                                while($fila = mysqli_fetch_array($rs)){
                                                    
                                                    echo "<tr>";
                                                        echo "<td> $fila[ID_S] </td>";
                                                        echo "<td >$fila[NOM_S]</td>";
                                                        echo "<td >$fila[VIAB_S]</td>";
                                                        echo "<td >$fila[ID_QUE]</td>";
                                                        echo "<td >$fila[NOM_QUE]</td>";
                                                        echo "<td >$fila[DESC_S]</td>";
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
        
        <!-- Bootstrap Tags Input Plugin Js -->
        <script src="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

        <!-- noUISlider Plugin Js -->
        <script src="../../plugins/nouislider/nouislider.js"></script>
        
        <!-- Multi Select Plugin Js -->
        <script src="../../plugins/multi-select/js/jquery.multi-select.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

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