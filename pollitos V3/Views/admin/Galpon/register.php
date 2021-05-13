<?php
  $mysqli = new mysqli('localhost','root','','pollitos');
?>

<div>
<form action="?controller=galpon&&action=save" method="POST" class="from-registro" style="display: inline;">

<H2 class="from-titulo"> Registrar Galpon  </H2>
<div class="inputs">
    
       <input type="text" name="idCriadero" placeholder="ID Galpon" required="">
       <input type="text" name="numeroAves" placeholder="Cantidad de pollos a ingresar" required="" >
       <input type="text" name="lineaGenetica" placeholder="Linea Genetica" required="" >


   
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
                box-shadow: 0 5px 25px rgba(201, 200, 187);">
        <option  value="0">Ganjero:</option>
      
          <?php
          $query = $mysqli -> query ("SELECT * FROM granjero");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option name="cedula" value="'.$valores[cedula].'">'.$valores[nombre].'</option>';
          }
        ?>
       
      </select>
    </div>

  
   <input type="submit" value="Registrar" class="btn-registroG" style="margin-left: 53%;">

</div>

 </form>
</div>