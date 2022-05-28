<?php

$conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
$ID=$_POST['txtID'];


?>
    <?php
    include_once('crud-index-admin-user.php');
    ?>
 <!-- Modal EDIT -->

 <script type="text/javascript">

    function redireccionar(){
       
        document.getElementById('id01').style.display='active';
        $("#id01").trigger("click");
    } 
    setTimeout ("redireccionar()", 100); //tiempo expresado en milisegundos
</script>

 <button id="id01" style="border:none;" style="display:none" data-dismiss="modal" data-toggle="modal"  data-target="#modalEDIT" data-controls-modal="modalEDIT" data-backdrop="static" data-keyboard="false"></button>
 <form action="crud-envio-editar-user.php" method="post">  
 <div class="modal fade" id="modalEDIT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <h1 class = "informacion">EDITAR</h1>
                <button type="button" class="boton-cerrar" data-dismiss="modal" >
                <i class="fa-solid fa-xmark"></i></button> 
            </div>

            <div class="form-inline">
         
            <div class="modal-body2">
                <?php
                $consulta_1="SELECT * FROM persona where idPersona = '$ID'";
                $consulta_2="SELECT * FROM correo where idCorreo = '$ID'";
                $consulta_3="SELECT * FROM telefono where idTelefono = '$ID'";
                $consulta_4="SELECT Nombre FROM tipo_documento WHERE idTipo_documento = '$ID'";
                $consulta_4_1="SELECT * FROM tipo_documento WHERE idTipo_documento = '$ID'";
                $consulta_5="SELECT * FROM direccion where idDireccion = '$ID'";
                $consulta_6="SELECT * FROM cod_postal where idCod_postal = '$ID'";
                $consulta_7="SELECT * FROM ciudad where idCiudad = '$ID'";

                $result = mysqli_query($conexion,$consulta_1);
                $result2 = mysqli_query($conexion,$consulta_2);
                $result3 = mysqli_query($conexion,$consulta_3);
                $result4 = mysqli_query($conexion,$consulta_4);
                $result4_1 = mysqli_query($conexion,$consulta_4_1);
                $result5 = mysqli_query($conexion,$consulta_5);
                $result6 = mysqli_query($conexion,$consulta_6);
                $result7 = mysqli_query($conexion,$consulta_7);

                $mostrar = mysqli_fetch_array($result);
                $mostrar2 = mysqli_fetch_array($result2);
                $mostrar3 = mysqli_fetch_array($result3);
                $arrayDatos4 = array();
                $arrayDatos4 = mysqli_fetch_row($result4);
                $mostrar4_1 = mysqli_fetch_array($result4_1);
                $mostrar5 = mysqli_fetch_array($result5);
                $mostrar6 = mysqli_fetch_array($result6);
                $mostrar7 = mysqli_fetch_array($result7);
                

                ?>
                
                <div class="form-group-2">

                    <input type="hidden" value= "<?php echo $mostrar['idPersona'] ?>" class="form-control px-3" placeholder= "ID" name="ID">

                    <input type="text" value= "<?php echo $mostrar4_1['Codigo'] ?>" class="form-control px-3" placeholder= "Codigo" name="Codigo">

                    <input type="text" value= "<?php echo $mostrar['Identificacion'] ?>" class="form-control px-3"  placeholder= "Identificacion" name="Identificador">
                   
                    <input type="text" value= "<?php echo $mostrar['nom1'] ?>" class="form-control px-3"  placeholder= "Primer Nombre" name="Primer-Nombre">
                
                    <input type="text" value= "<?php echo $mostrar['nom2'] ?>" class="form-control px-3" placeholder= "Segundo Nombre" name="Segundo-Nombre">
                
                    <input type="text" value= "<?php echo $mostrar['apell1'] ?>" class="form-control px-3"  placeholder= "Primer Apellido" name="Primer-Apellido">
                
                    <input type="text" value= "<?php echo $mostrar['apell2'] ?>" class="form-control px-3"  placeholder= "Segundo Apellido" name="Segundo-Apellido">
                
                    <input type="text" value= "<?php echo $mostrar2['Correo'] ?>" class="form-control px-3"  placeholder= "Correo" name="Correo">
                
                    <input type="text" value= "<?php echo $mostrar3['Num'] ?>" class="form-control px-3"  placeholder= "Telefono" name="Telefono">

                    <select class="form-control px-2,8" name = "Nombre"  >
                        <?php if ($arrayDatos4[0] == "Cedula"){ 
                          ?>
                          <option value = "Cedula">Cedula</option>
                          <option value = "Tarjeta de Identida">Tarjeta de Identidad</option>
                          <option value = "Cedula de Extranjeria">Cedula de Extranjeria</option> 
                          <?php 
                        }elseif ($arrayDatos4[0] == "Tarjeta de Identida") {
                            ?>
                          <option value = "Tarjeta de Identida">Tarjeta de Identidad</option>
                          <option value = "Cedula">Cedula</option>
                          <option value = "Cedula de Extranjeria">Cedula de Extranjeria</option> 
                          <?php 
                        }elseif ($arrayDatos4[0] == "Cedula de Extranjeria") {
                            ?>
                            <option value = "Cedula de Extranjeria">Cedula de Extranjeria</option>
                            <option value = "Cedula">Cedula</option>
                            <option value = "Tarjeta de Identida">Tarjeta de Identidad</option>
                             
                            <?php 
                        }?>
                        
                    </select> 
                  
                    <input type="text" value= "<?php echo $mostrar5['calle'] ?>" class="form-control px-3"  placeholder= "Calle" name="Calle">

                    <input type="text" value= "<?php echo $mostrar5['Nom_C'] ?>" class="form-control px-3"  placeholder= "Num" name="Num">

                    <input type="text" value= "<?php echo $mostrar6['Num'] ?>" class="form-control px-3" placeholder= "Codigo Postal" name="Codigo-postal">

                    <input type="text" value= "<?php echo $mostrar7['Nombre'] ?>" class="form-control px-3"  placeholder= "Ciudad" name="Ciudad">

                    <input type="text" value= "<?php echo $mostrar6['Zona'] ?>" class="form-control px-3"  placeholder= "Zona" name="Zona">

                    


                </div>
                 

            </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="boton-ana4 px-3 py-1" style="border:none;" >
                    Actualizar
                </button>
                
                
            </div>
            
        </div>
    </div>
</div>  
   
</div>
</form>













<?php


?>