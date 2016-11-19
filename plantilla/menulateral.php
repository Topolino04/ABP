
<!-- MenuLateral -->

<?php 

class menulateral{

	function crear($idioma){

 		
?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <li>
                      
                        <a href="../Controlador/ControladorDeportistas.php?deportistas" data-toggle="collapse" data-target="#demo"><i class="fa fa-cogs" aria-hidden="true"></i> <?php echo $idioma['GestionDeportista'];?> </a>
                        
                        </li>
                    </li>

                    <li>
                        <li>

                      
                        <a href="../Controlador/ControladorMonitor.php?monitores" data-toggle="collapse" data-target="#down3"><i class="fa fa-user"></i> <?php echo $idioma['GestionMonitores'];?> </a>
                       
                        </li>
                    </li>
                    <li>
                        <li>
                        
                        <a href="../Controlador/ControladorActividades.php?actividades" data-toggle="collapse" data-target="#down2"><i class="fa fa-users"></i> <?php echo $idioma['GestionActividades'];?> </a>
                       
                      </li>
                    </li>
                     <li>
                        <li>
                        
                        <a href="../Controlador/ControladorSesiones.php?sesiones" data-toggle="collapse" data-target="#down2"><i class="fa fa-users"></i> <?php echo $idioma['GestionSesiones'];?> </a>
                       
                      </li>
                    </li>
                     <li>
                        <li>
                        
                        <a href="../Controlador/EJERCICIO_Controller.php" data-toggle="collapse" data-target="#down2"><i class="fa fa-users"></i> <?php echo $idioma['GestionTablas'];?> </a>
                       
                      </li>
                    </li>
                     <li>
                        <li>
                        
                        <a href="../Controlador/TABLA_Controller.php" data-toggle="collapse" data-target="#down2"><i class="fa fa-users"></i> <?php echo $idioma['GestionEjercicios'];?> </a>
                       
                      </li>
                    </li>
                    
            </div>
              </nav>

<?php 
 }
}?>
        <!-- /#page-wrapper -->