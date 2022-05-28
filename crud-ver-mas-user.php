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
 <form action="envio-editar.php" method="post">  
 <div class="modal fade" id="modalEDIT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document" style="right: 340px;left: -100;">
        <div class="modal-content" style="right: 0px;width: 1202px;" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <h1 class = "informacion">DATOS</h1>
                <button type="button" class="boton-cerrar" data-dismiss="modal" >
                <i class="fa-solid fa-xmark"></i></button> 
            </div>

            <div class="form-inline">
         
            <div class="modal-body" style="padding: 10px 10px;">
                <?php
                $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
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
                
                    <table class="table">

<thead class= "tabla-cabecera">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Calle</th>
        <th scope="col">Numero</th>
        <th scope="col">Zona</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Codigo Postal</th>
        <th scope="col">Tipo de Documento</th>
        <th scope="col">Numero documento</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>


        
        
        

        
        

    </tr>
</thead>

<tbody>
    <?php
       
       
    ?>
    <tr>
        <th><?php echo $mostrar5['idDireccion'] ?></th>
        <th><?php echo $mostrar5['calle'] ?></th>
        <th><?php echo $mostrar5['Nom_C'] ?></th>
        <th><?php echo $mostrar6['Zona'] ?></th>
        <th><?php echo $mostrar7['Nombre'] ?></th>
        <th><?php echo $mostrar6['Num'] ?></th>
        <th><?php echo $mostrar4_1['Nombre'] ?></th>
        <th><?php echo $mostrar4_1['Codigo'] ?></th>
        <th><?php echo $mostrar2['Correo'] ?></th>
        <th><?php echo $mostrar3['Num'] ?></th>
    
    </tr>

    <?php
        
    ?>

</tbody>
</table>
                
            <div class="modal-footer">
                
                
            </div>
            
        </div>
    </div>
</div>  
   
</div>
</form>













<?php


?>