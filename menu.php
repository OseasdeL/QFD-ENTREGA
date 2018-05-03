<?php

    require_once("php/conexion.php");
    $conex = conectar();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Sistema QFD | Inicio</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="css/google1-api.css" rel="stylesheet" type="text/css">
        <link href="css/google2-api.css" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Morris Chart Css-->
        <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">

        <?php
        
            session_start();

            if(!isset($_SESSION['usuario']) && !isset($_SESSION['pass'])){

                header('Location: index.php');

            }else{
                $nick = $_SESSION['usuario'];
                $selectQueryA = "SELECT email FROM usuarios WHERE nickname ='".$nick."'";
                $rs = mysqli_query($conex,$selectQueryA);                           

                $fila = mysqli_fetch_array($rs);
                $emailU =  $fila["email"];


                $selectQueryB = "SELECT COUNT(ID_QFD) AS TOTAL FROM QFD";
                $rs = mysqli_query($conex,$selectQueryB);                           

                $fila = mysqli_fetch_array($rs);
                $totalqfd =  $fila["TOTAL"];

                $selectQueryC = "SELECT COUNT(ID_C) AS TOTALC FROM CLIENTES";
                $rsc = mysqli_query($conex,$selectQueryC);                           

                $filac = mysqli_fetch_array($rsc);
                $totalc =  $filac["TOTALC"];

                $selectQueryD = "SELECT COUNT(ID_PS) AS TOTALPS FROM PROD_SERV";
                $rss = mysqli_query($conex,$selectQueryD);                           

                $filas = mysqli_fetch_array($rss);
                $totals =  $filas["TOTALPS"];

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
                    <a class="navbar-brand" href="Menu.php">GESTIÓN DE CALIDAD</a>
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
                            <a href="Menu.php">
                                <i class="material-icons">home</i>
                                <span>INICIO</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/forms/FormClientes.php">
                                <i class="material-icons">account_box</i>
                                <span>CLIENTES</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/forms/FormCompetencias.php">
                                <i class="material-icons">store_mall_directory</i>
                                <span>COMPETENCIAS</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/forms/FormProdServ.php">
                                <i class="material-icons">shopping_cart</i>
                                <span>PRODUCTOS/SERVICIOS</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/forms/FormNecesidades.php">
                                <i class="material-icons">report_problem</i>
                                <span>NECESIDADES</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/forms/FormSoluciones.php">
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
                                    <a href="pages/forms/FormQFDDetalle.php">QFD</a>
                                </li>
                                <li>
                                    <a href="pages/forms/FormQFDAsignacion.php">ASIGNACIÓN</a>
                                </li>
                                <li>
                                    <a href="pages/forms/FormQFDMatriz.php">MATRIZ DE RELACIÓN</a>
                                </li>
                                <li>
                                    <a href="pages/forms/FormQFDBenchmarking.php">BENCHMARKING COMPETENCIA</a>
                                </li>
                                <li>
                                    <a href="pages/forms/FormQFDBenchmarkingC.php">BENCHMARKING CLIENTE</a>
                                </li>
                                <li>
                                    <a href="pages/forms/FormQFDEvaluacionI.php">EVALUACIÓN INGENIERÍA</a>
                                </li>
                                <li>
                                    <a href="pages/forms/FormQFDCvC.php">EVALUACIÓN COMO'S</a>
                                </li>
                            </ul>
                        </li>  
                        <li>
                            <a href="pages/forms/FormUsuario.php">
                                <i class="material-icons">account_circle</i>
                                <span>PERFIL</span>
                            </a>
                        </li>
                        <li>
                            <a href="php/cerrar_sesion.php">
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
                
                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-pink hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">playlist_add_check</i>
                            </div>
                            <div class="content">
                                <div class="text">QFD'S</div>
                                <?php                                  
                                 echo "<div class='number count-to' data-from='0' data-to='".$totalqfd."' data-speed='15' data-fresh-interval='20'></div>"
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-cyan hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">help</i>
                            </div>
                            <div class="content">
                                <div class="text">CLIENTES</div>
                                <?php                                  
                                 echo "<div class='number count-to' data-from='0' data-to='".$totalc."' data-speed='15' data-fresh-interval='20'></div>"
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-light-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">forum</i>
                            </div>
                            <div class="content">
                                <div class="text">SERVICIOS</div>
                                <?php                                  
                                    echo "<div class='number count-to' data-from='0' data-to='".$totals."' data-speed='15' data-fresh-interval='20'></div>"
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Widgets -->
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="plugins/node-waves/waves.js"></script>

        <!-- Jquery CountTo Plugin Js -->
        <script src="plugins/jquery-countto/jquery.countTo.js"></script>

        <!-- Morris Plugin Js -->
        <script src="plugins/raphael/raphael.min.js"></script>
        <script src="plugins/morrisjs/morris.js"></script>

        <!-- ChartJs -->
        <script src="plugins/chartjs/Chart.bundle.js"></script>

        <!-- Flot Charts Plugin Js -->
        <script src="plugins/flot-charts/jquery.flot.js"></script>
        <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
        <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
        <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="plugins/flot-charts/jquery.flot.time.js"></script>

        <!-- Sparkline Chart Plugin Js -->
        <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

        <!-- Custom Js -->
        <script src="js/admin.js"></script>
        <script src="js/pages/index.js"></script>

        <!-- Demo Js -->
        <script src="js/demo.js"></script>
    </body>
</html>