<?php

include_once('../../../controllers/db/conexion.php');

 
session_start();


//Restringir acceso sin haberse logueado
if (isset($_SESSION['usuario'])) {
} else {
    
   echo '<SCRIPT LANGUAJE="javascript">
          location.href = "../../../index.php";
</script>';
   exit;
 }
include_once('../../../controllers/db/variables-sesion.php');
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Administracion de Galpones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  
 
    <script src="../../../assets/js/sweet-alert.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../../assets/js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/main.js"></script>
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="../../../assets/css/sweet-alert.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/tipo-de-letra.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/login.css"/>
    <script type="text/javascript">
                            window.onload = function(){
                            fecha = new Date();
                            texto = document.getElementById("fechaing");
                            texto.value = fecha;
                            }
                        </script>
   
</head>
<body> 
    <div style= "background-color:#c62828; color: white;">
    <div class="navbar-lateral full-reset " >
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 5px; margin-left: 5px;"></i> 
                <font color="black">
              <i  style=" font-family: comic sans MS,bold; text-align: center; color: white;" > <b>Finca San Pablo</b></i> </font>
            </div>
            <div>
            <div class="borde-login full-reset">
                <figure>
                    <img src="../../../assets/imgs/icons/ufps.png"
                           margin-left: 0%; style="height: 50%; width: 50%;" class="img-responsive center-box" >
                </figure>
           </div></div>
             <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                  <li>
                           <li  ><a href="../principal.php" style="color: black; background-color: #FEFEFE;"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    </li>
                         <li>
                        <div class="dropdown-menu-button" style="color: black; background-color: #FEFEFE;"><i class="zmdi zmdi-calendar-check"></i>&nbsp;&nbsp; Ingreso Vehiculos <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled" style=" background-color: #E3E2D3 ;">
                            <li><a href="../vehiculos/ir-registro.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registrar</a></li>
                            <li><a href="../vehiculos/ir-tabla.php"><i class="zmdi zmdi-format-align-justify zmdi-hc-fw"></i>&nbsp;&nbsp; Listar</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <div class="dropdown-menu-button" style="color: black; background-color: #FEFEFE;"><i class="zmdi zmdi-calendar-check"></i>&nbsp;&nbsp; Ingreso Visitantes <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled" style=" background-color: #E3E2D3 ;">
                            <li><a href="../visitantes/ir-registro.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registrar</a></li>
                            <li><a href="../visitantes/ir-tabla.php"><i class="zmdi zmdi-format-align-justify zmdi-hc-fw"></i>&nbsp;&nbsp; Listar</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button" style="color: black; background-color: #FEFEFE;"><i class="zmdi zmdi-calendar-check"></i>&nbsp;&nbsp; Administracion de Galpon <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled" style=" background-color: #E3E2D3 ;">
                            <li><a href="ir-registro.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registrar</a></li>
                            <li><a href="ir-tabla.php"><i class="zmdi zmdi-format-align-justify zmdi-hc-fw"></i>&nbsp;&nbsp; Listar</a></li>
                        </ul>
                    </li>
                    
                      <li>  
                           <li  ><a href="../pollito/ir-registro-mortalidad.php" style="color: black; background-color: #FEFEFE;"><i class="zmdi zmdi-calendar-check"></i>&nbsp;&nbsp; Mortalidad</a></li>
                    </li>
                   
                </ul>
            </div>
            </div>
        </div style="background-color: #FEFEFE;"></div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers" >
    
        <nav class="navbar-user-top full-reset" style= "background-color:#c62828;color: white;" role="navigation" >
            <ul class="list-unstyled full-reset" >
                <figure >
                   <img src="../../../assets/imgs/img/user001.png" alt="Usuario" class="img-responsive img-circle center-box" >
                </figure>
                <li style="color: white ;cursor:default; 
                font-family: comic sans MS; 
                text-align: center; ">
                    <span class="all-tittles" > <?php echo $usuario  ?></span>
                </li>
                 

                <li  class="tooltips-general exit-system-button "style="color: white;" data-href="../../../controllers/cerrar-sesion.php" data-placement="bottom" title="Cerrar Sesion ">
                    <i class="zmdi zmdi-power"></i>
                </li>               
               


                <li  class="tooltips-general btn-help" style="color: white; " data-placement="bottom" title="Ayuda">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                     <i class="zmdi zmdi-menu"></i>
                </li>
            </ul>
        </nav>
     

     

<div class="full-cover-background" style="background-image: url(../../../assets/imgs/img/listargranjero.jpg )">

<br>
       <?php require_once('../../../routing.php'); ?>
    
    <div class="footer-copyright full-reset">TDG &copy; Todos los derechos reservados.</div>


</div>

        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp" style= "background-color:#c62828;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    No Disponible La Ayuda 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; Aceptar</button>
                </div>
            </div>
          </div>
        </div>


        <!----------------------------------------------------------->

       

</body>
</html>