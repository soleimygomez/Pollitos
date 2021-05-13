
<body class="full-cover-background" style="background-image:url(assets/imgs/img/pollos.jpg);">
    <div class="form-container">

                <p> <h1 style=" font-family: comic sans MS; text-align: center; "> Finca San Pablo  </h1> </p>                
                 <figure>
                    <img  class= "logoSession" 
                    style="border-radius: 100%;
                           margin-left: 25%; "
                    src="assets/imgs/icons/fondo.jpg" alt="pollitos" class="img-responsive center-box">
                </figure>

      <form id="login-form" action="Controllers/validar_sesion.php" method="post">
            <!-- Llamado a el router para llamar al metodo -->
            <!-- USUARIO -->
            <input type="hidden" name="solicitud" value="login">
            <div class="group-material-login">
              <input name="usuario" type="text" class="material-login-control" required="" maxlength="15">
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label><i class="zmdi zmdi-account"></i> &nbsp; Usuario</label>
            </div>
            <br>
            <!-- CONTRASEÑA  -->
            <div class="group-material-login">
              <input name="clave" type="password" class="material-login-control" required="" maxlength="30">
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
            </div>
            <br>
            <!-- TIPO USURAIO -->
            <div class="group-material-login">
            
             
              
               <select name="tipo" class="material-login-control" required="" maxlength="30">
                               <option selected value="0"> Elige un tipo de usuario </option>
                               <option value="1" name="1">Administrador</option> 
                               <option value="2" name="2">Granjero</option>                       
              </select>
               
         
            </div>
        <br>
            <button class="btn-ingresar"  type="submit">INGRESAR </button>
           
        </form>
         <br><br>
      </div>

      <div class="pie-container">
        <br>
         <footer>
              <p>Cruces &copy; Todos los derechos reservados.</p>  
               </footer>
      </div>
</body>
