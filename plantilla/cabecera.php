<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Proyecto</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>
<?php 
//Establecemos el idioma
class cabecera{

    function crear($idioma){
        include("../Funciones/comprobaridioma.php");
       $clase=new comprobacion();
    $idiom=$clase->comprobaridioma($idioma);


//Creamos el menu lateral
?>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                <form class="principal" method="post" action="..\Controlador\ControladorPrincipal.php">
                    <input type="submit" class="btn btn-default" name="principal"  value="<?php echo $idiom['Menu'];?>">
                        
                    </form>
                </li>
                <li>
                    <form class="principal" method="post" action="..\Controlador\ControladorMonitor.php">
                    <input type="submit" class="btn btn-default" name="monitores"  value="<?php echo $idiom['GestionMonitores'];?>" >
                    </form>
                </li>
                <li>
                <form class="principal" method="post" action="..\Controlador\ControladorDeportistas.php">
                    <input type="submit" class="btn btn-default" name="deportistas"  value="<?php echo $idiom['GestionDeportista'];?>" >
                    </form>
                </li>
                <li>
                    <form class="principal" method="post" action="..\Controlador\ControladorActividades.php">
                    <input type="submit" class="btn btn-default" name="actividades"  value="<?php echo $idiom['GestionActividades'];?>" >
                    </form>
                </li>
                <li>
                    <form class="principal" method="post" action="..\Controlador\ControladorSesiones.php">
                    <input type="submit" class="btn btn-default" name="sesiones"  value="<?php echo $idiom['GestionSesiones'];?>" >
                    </form>
                </li>
                <li>
                   <form class="principal" method="post" action="..\Controlador\EJERCICIO_Controller.php">
                    <input type="submit" class="btn btn-default" name="ejercicios"  value="<?php echo $idiom['GestionEjercicios'];?>" >
                    </form>
                </li>
                <li>
                   <form class="principal" method="post" action="..\Controlador\TABLA_Controller.php">
                    <input type="submit" class="btn btn-default" name="tablas"  value="<?php echo $idiom['GestionTablas'];?>" >
                    </form>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    
                    <?php   }} ?>
                               