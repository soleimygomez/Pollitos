 <?php $fcha = date("Y-m-d");?>

 <form action="?controller=mortalidad&&action=save" method="POST" class="from-registro" style="display: inline;">
        <H2 class="from-titulo"> Registro Mortalidad </H2>
            <div class="inputs">
   
                <div style="margin-left: 300px;  " >
                     <div>

                        <input type="text" name="id_pollo" placeholder="ID del Pollo" required="">
                        <br>
                        <input type="text" name="peso" placeholder="peso actual" required="">
                        
                        <br>
                        <input type="date"  name="fecha" style="width: 56%;" value="<?php echo $fcha;?>"  > 

                     </div>
                     <div style=" border-left: solid 5px;"></div>

                    <input type="submit" value="Registrar" class="btn-registroG" style="margin-left: 10px; 
                                                                                            float: right; 
                                                                                             margin-top: -80px;
                                                                                              border-left: solid;" >


                   
                        <hr>
                   <input type="text" name="causa" placeholder="Motivo de desercion" required="" 
                                                                        style="width: 400px;
                                                                                height: 100px;"  >
                                                                                <hr>


                    

                    
                    <!-- <input type="text" name="idAdministrador" placeholder="idAdministrador"  class="N"> -->

 
    
            </div>
            </div>

    </form>