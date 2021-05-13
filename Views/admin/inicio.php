<?php

include_once('../../controllers/db/conexion.php');
 
session_start();


//Restringir acceso sin haberse logueado
if (isset($_SESSION['usuario'])) {
} else {
    
   echo '<SCRIPT LANGUAJE="javascript">
          location.href = "../../index.php";
</script>';
   exit;
 }
include_once('../../controllers/db/variables-sesion.php');
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
    <link rel="stylesheet" href="../../assets/css/sweet-alert.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/tipo-de-letra.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
        <link rel="stylesheet" href="../../assets/css/login.css"/>
    <script src="../../assets/js/sweet-alert.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>
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
                    <img src="../../assets/imgs/icons/ufps.png" 
                           margin-left: 0%; style="height: 50%; width: 50%;" class="img-responsive center-box" >
                </figure>
            </div></div>
             <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li  ><a href="inicio.php" style="color: black; background-color: #FEFEFE;"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>

                    <li>
                        <div class="dropdown-menu-button" style="color: black; background-color: #FEFEFE;"><i class="zmdi zmdi-calendar-check"></i>&nbsp;&nbsp; Granjero <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled" style=" background-color: #E3E2D3 ;">
                            <li><a href="Granjero/ir-registro.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registrar</a></li>
                            <li><a href="Granjero/ir-tabla.php"><i class="zmdi zmdi-format-align-justify zmdi-hc-fw"></i>&nbsp;&nbsp; Listar</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <div class="dropdown-menu-button" style="color: black; background-color: #FEFEFE;"><i class="zmdi zmdi-calendar-check"></i>&nbsp;&nbsp; Granja <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled" style=" background-color: #E3E2D3 ;">
                            <li><a href="Granja/ir-registro.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registrar</a></li>
                            <li><a href="Granja/ir-tabla.php"><i class="zmdi zmdi-format-align-justify zmdi-hc-fw"></i>&nbsp;&nbsp; Listar</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button" style="color: black; background-color: #FEFEFE;"><i class="zmdi zmdi-calendar-check"></i>&nbsp;&nbsp; Galpon <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled" style=" background-color: #E3E2D3 ;">
                            <li><a href="Galpon/ir-registro.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registrar</a></li>
                            <li><a href="Galpon/ir-tabla.php"><i class="zmdi zmdi-format-align-justify zmdi-hc-fw"></i>&nbsp;&nbsp; Listar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div style="background-color: #FEFEFE;"></div>
    </div>
     <div class="content-page-container full-reset custom-scroll-containers" >
    
        <nav class="navbar-user-top full-reset" style= "background-color:#c62828;color: white;" role="navigation" >
            <ul class="list-unstyled full-reset" >
                <figure >
                   <img src="../../assets/imgs/img/user001.png" alt="Usuario" class="img-responsive img-circle center-box" >
                </figure>
                <li style="color: white ;cursor:default; 
                font-family: comic sans MS; 
                text-align: center; ">
                    <span class="all-tittles" > <?php echo $usuario  ?></span>
                </li>
                 

                <li  class="tooltips-general exit-system-button "style="color: white;" data-href="../../controllers/cerrar-sesion.php" data-placement="bottom" title="Cerrar Sesion">
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
    

<div class="full-cover-background" style="background-color:#FEFEFE; height: 90%">

<div class="slider">
    <ul>
        <br>
        <li><img src="../../assets/imgs/img/listarlotes.jpg" style="height: 60%" >
    <h3>La Granja </h3>
    <p>Te Esperamos Con los Brazos Abiertos</p></li>
        <li><img src="../../assets/imgs/img/criaderos.jpg" alt="" style="height: 60%" > 
    <h3>Nuestros Pollos</h3>
    <p>Los Mejores Pollos De Toda Cucuta</p></li>
        <li><img src="../../assets/imgs/img/alimento.jpg" alt="" style="height: 60%">
    <h3>Alimento</h3>
    <p>Se Alimenta Con Toda La Mejor Calidad</p></li>
        <li><img src="../../assets/imgs/img/UFPS-CUCUTA.png" style="height: 60%">
    <h3>La UFPS </h3>
    <p>La que hace todo esto posible</p></li>

    </ul>
</div>

</div>

 <div class="footer-copyright full-reset">TDG &copy; Todos los derechos reservados.</div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp" style= "background-color:#c62828;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
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
       

</body>
</html>