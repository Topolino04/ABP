
<?php

class cabecera{

    function crear($idioma){


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ET1</title>

    <!-- Bootstrap Core CSS -->
    <link href=".././css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href=".././css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href=".././css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href=".././font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--CSS and JS Calendar-->
    <link rel="stylesheet" href="../css/calendar.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/es-ES.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/moment.js"></script>
    <script src="../datepicker/js/bootstrap-datetimepicker.js"></script>
    <link rel="stylesheet" href="../datepicker/css/bootstrap-datetimepicker.min.css" />
    <script src="../datepicker/js/bootstrap-datetimepicker.es.js"></script>


    <style>
    #col{
    margin-left: 400px;
    }
    </style>
    <!-- jQuery -->
    <script src=".././js/jquery.js"></script>

    <script src=".././js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src=".././js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src=".././js/plugins/morris/raphael.min.js"></script>
    <script src=".././js/plugins/morris/morris.min.js"></script>
    <script src=".././js/plugins/morris/morris-data.js"></script>
    <script src=".././datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">

        $(document).ready(function (){

                $('#example1').datepicker({

                    format: "yyyy-mm-dd"
                });
            });

    </script>
</head>
<body style="background-color: white">

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../Controlador/ControladorPrincipal.php?principal"><?php echo $idioma['Menu']; ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-flag"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="ControladorPrincipal.php?idiomas=gallego"><?php echo $idioma['Gallego']; ?><input type="image" align="right" src="../Archivos/galicia.png" height="30" width="30"></a>
                        </li>
                        <li>
                            <a href="ControladorPrincipal.php?idiomas=español"><?php echo $idioma['Español']; ?><input type="image" align="right" src="../Archivos/españa.gif" height="30" width="30"></a>
                        </li>
                        <li>
                            <a href="ControladorPrincipal.php?idiomas=ingles"><?php echo $idioma['Ingles']; ?><input type="image" align="right" src="../Archivos/ingles.png" height="30" width="30"></a>
                        </li>
                        <li class="divider"></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php //echo $_SESSION['usuario']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>

                         <?php

                         if (isset ($_SESSION['usuario'])) echo "<a href=\"#\"><i class=\"fa fa-fw fa-user\"></i>".$_SESSION['usuario']."</a>"; ?>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> <?php echo $idioma['Configuracion']; ?></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="ControladorPrincipal.php?salir"><i class="fa fa-fw fa-power-off"></i> <?php echo $idioma['salir']; ?></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php
 }} ?>
            <!-- /.navbar-collapse -->
