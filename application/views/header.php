<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <!--<link rel="shortcut icon" href="../../assets/ico/favicon.ico">-->

        <title>Sistema de Registro civil</title>
 
         <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" >

        <!-- Custom styles for this template -->
        <link href="../../assets/css/dashboard.css" rel="stylesheet">
        
        <link rel="stylesheet" href="../../resource/css/icomoon/style.css"/>
        <link rel="stylesheet" href="../../resource/css/main.css"/>
        <link rel="stylesheet" href="../../resource/css/joint.css"/>
        <link rel="stylesheet" href="../../resource/css/jquery-ui-1.10.3.custom.min.css"/>
        
        <script src="../../resource/js/jquery.min.js"></script>
        <script src="../../resource/js/main.js"></script>
        <script src="../../resource/js/bootstrap.js"></script>
        <script src="../../resource/js/moment.js"></script>


        <!-- revisar los de abajo -->
        <script src="../../resource/js/joint.js"></script>
        <script src="../../resource/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="../../resource/js/jquery.ui.touch.js"></script>
        <script src="../../resource/js/jquery.dataTables.min.js"></script>

      
    </head>

    <body style="background-color: #ffffff ">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Sistemas de Registro Civil</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Configuracion</a></li>
                        <li><a href="#">Salir</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Buscar...">
                    </form>
                </div>
            </div>
        </div>
        
        
           <div class="container-fluid" >
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar" >
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="https://localhost/registro_civil/index.php/main/begin">Inicio</a></li>
                        <li><a href="https://localhost/registro_civil/index.php/main/registro_persona">Registro personas</a></li>
                        <li><a href="https://localhost/registro_civil/index.php/main/acta_nacimiento">Actas de nacimiento</a></li>
                        <li><a href="https://localhost/registro_civil/index.php/main/acta_matrimonio">Actas de de matrimonio</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="">Reportes</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-color: #ffffff ">
                    <h1 class="page-header">Sistema de Registro Civil</h1>
    