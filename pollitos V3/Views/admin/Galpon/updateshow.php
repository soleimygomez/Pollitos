<?php
  $mysqli = new mysqli('localhost','root','','pollitos');
?>

<div>
<form action="?controller=galpon&&action=update" method="POST" class="from-registro" style="display: inline;">

<H2 class="from-titulo"> 
            <a href="ir-tabla.php" class="btn btn-info" 
                            style="float: left; 
                                   background: white;
                                   color: black;                  
                                   ">volver</a> Actualizar datos del galpon </H2>
<div class="inputs">
    
       <input type="text" name="idCriadero" placeholder="ID Galpon" required="" value=" <?php echo $galpon->getIdCriadero();   ?>" >
       <input type="text" name="numeroAves" placeholder="Cantidad de pollos a ingresar" required="" 
              value=" <?php echo $galpon->getNumeroAves();   ?>" >
       <input type="text" name="lineaGenetica" placeholder="Linea Genetica" required="" value="<?php echo $galpon->getLineaGenetica() ?>">


   
   <div  style="background:#E3E2D3;
                color:#0C0C0C;
                padding: 10px;
                width: 210px;
                height: 50px;
                border:none; 
                font-size: 20px;
                box-shadow: 0 5px 25px rgba(201, 200, 187);">
     <select name="id_granjero"
                 style="background:#E3E2D3;
                color:#0C0C0C;
                padding: 10px;
                width: 210px;
                height: 50px;
                border:none; 
                font-size: 20px;
                box-shadow: 0 5px 25px rgba(201, 200, 187);" value=" <?php echo $galpon->getId_granjero();  ?>" >
        <option  value=" <?php echo $galpon->getId_granjero();  ?>"><?php echo $galpon->getId_granjero();  ?></option>
      
          <?php
          $query = $mysqli -> query ("SELECT * FROM granjero");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="id_granjero" value="'.$valores[id_granjero].'">'.$valores[nombre].'</option>';
          }
        ?>
       
      </select>
    </div>

  
   <input type="submit" value="Registrar" class="btn-registroG" style="margin-left: 53%;">

</div>

 </form>
</div>