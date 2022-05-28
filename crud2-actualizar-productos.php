<?php

$conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
$ID=$_POST['txtID'];


?>
    <?php
    include_once('crud2-index-admin-productos.php');
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
<form action="crud2-envio-editar-productos.php" method="post" enctype="multipart/form-data">  
 <div class="modal fade" id="modalEDIT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <h1 class = "informacion">EDITAR</h1>
                <button type="button" class="boton-cerrar" data-dismiss="modal" >
                <i class="fa-solid fa-xmark"></i></button> 
            </div>

            <div>
         
            <div class="modal-body2" style="padding-left: 40px;">
                <?php
                $consulta_1="SELECT * FROM producto where idProducto = '$ID'";
                $consulta_2="SELECT * FROM detalle_producto where idDetalle_producto = '$ID'";
                $consulta_4="SELECT Categoria FROM producto WHERE idProducto = '$ID'";


                $result = mysqli_query($conexion,$consulta_1);
                $result2 = mysqli_query($conexion,$consulta_2);
                $result4 = mysqli_query($conexion,$consulta_4);

                $mostrar = mysqli_fetch_array($result);
                $mostrar2 = mysqli_fetch_array($result2);

                $arrayDatos4 = array();
                $arrayDatos4 = mysqli_fetch_row($result4);

                

                ?>
                
                <div class="form-group-2">

                    <input type="hidden" value= "<?php echo $mostrar['idProducto'] ?>" class="form-control px-3" placeholder= "ID" name="ID">

                    <input type="text" value= "<?php echo $mostrar['Nombre'] ?>" class="form-control px-3" placeholder= "Nombre" name="Nombre">

                    <input type="text" value= "<?php echo $mostrar['Peso'] ?>" class="form-control px-3"  placeholder= "Peso" name="Peso">
                   
                    <input type="text" value= "<?php echo $mostrar['Color'] ?>" class="form-control px-3"  placeholder= "Color" name="Color">
        
                    <select class="form-control px-2,8" name = "Categoria"  >
                        <?php if ($arrayDatos4[0] == "Tecnologia"){ 
                          ?>
                          <option value = "Tecnologia">Tecnologia</option>
                          <option value = "Ropa">Ropa</option>
                          <option value = "Alimento">Alimento</option>
                          <option value = "Cosmetico">Cosmetico</option>  
                          <?php 
                        }elseif ($arrayDatos4[0] == "Ropa") {
                            ?>
                          <option value = "Ropa">Ropa</option>
                          <option value = "Tecnologia">Tecnologia</option>
                          <option value = "Alimento">Alimento</option>
                          <option value = "Cosmetico">Cosmetico</option>  
                          <?php 
                        }elseif ($arrayDatos4[0] == "Alimento") {
                            ?>
                            
                            <option value = "Alimento">Alimento</option>
                            <option value = "Tecnologia">Tecnologia</option>
                            <option value = "Ropa">Ropa</option>
                            <option value = "Cosmetico">Cosmetico</option>  
                             
                            <?php 
                        }elseif ($arrayDatos4[0] == "Cosmetico") {
                            ?>
                            
                            <option value = "Cosmetico">Cosmetico</option>  
                            <option value = "Tecnologia">Tecnologia</option>
                            <option value = "Ropa">Ropa</option>
                            <option value = "Alimento">Alimento</option>

                            <?php 
                        }
                        
                        
                        
                        ?>
                        
                    </select>
                    
                    <th style="height: 35px;padding-left: 1px;padding-right: 12px;width: 12px;"><img height="100px" width="110px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar['Imagen'])?>"></th>
                    <div class="form-group">
                        <input type="file" class="form-control" style="border:none; margin-top:13px; padding-left:0px;" name="Imagen" required="Sube una imagen">
                    </div>
                  

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