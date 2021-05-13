
<div>
    <form action="?controller=granjero&&action=update"  method="POST" class="from-registro" style="display: inline;" >

    <H2 class="from-titulo"> Actualizar datos de granjero </H2>
         <div class="inputs">     <!-- INICIO DE INPUTS -->
    

               
                   
                        <input type="text" name="nombre" placeholder="Nombre" required="" value="<?php echo $granjero->getNombre() ?>">
                        <input type="text" name="apellido" placeholder="Apellido" required="" value="<?php echo $granjero->getApellido(); ?>">

                        <input type="text" name="cedula" placeholder="cedula" required="" value="<?php echo $granjero->getCedula(); ?>">
                        <input type="text" name="direccion" placeholder="direccion" required="" value="<?php echo $granjero->getDireccion(); ?>">

                      
                        <input type="text" name="usuario" placeholder="Usuario"  size="7">
                        <input type="text" name="clave" placeholder="Clave" size="7" >


                   
                         <input type="text" name="telefono" placeholder="telefono" required="" value="<?php echo $granjero->getTelefono(); ?>">
                     

                     
                            <div  style="background:#E3E2D3;
                                          color:#0C0C0C;
                                          padding: 10px;
                                          width: 210px;
                                          height: 50px;
                                          border:none; 
                                          font-size: 20px;
                                          box-shadow: 0 5px 25px rgba(201, 200, 187);"> 
                                <select name="tipo" style="background:#E3E2D3;
                                                              color:#0C0C0C;
                                                              padding: 10px;
                                                              width: 210px;
                                                              height: 50px;
                                                              border:none; 
                                                              font-size: 20px;
                                                              box-shadow: 0 5px 25px rgba(201, 200, 187);" >
                                    <option name="tipo"  value="0">tipo de usuario:</option>
                                    <option  name="tipo" value="1">Administrador</option>  
                                    <option name="tipo" value="2">Usuario</option> 
                                </select>
                            </div>
                      
                   
                        
                                    
                         

                         <input   type="submit" value="Registrar" class="btn-registroG">
                     


                   

            

</div>

 </form>



  
</div>






