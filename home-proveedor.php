<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="//code.tidio.co/eb45wiqhlgnpk4pe08ptsaaiufvlkl4w.js" async></script>
    <link rel="icon" type="image/png" href="images/icons/Logo-2.ico"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- CSS personalizado --> 
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script> 
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">  
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" type="text/css" href="css/home-proveedor.css" th:href="@{/css/home.css}">    
</head>
<body>
    <header class="header">
        
        <div class = "container logo-nav-container" style="margin-right: 0px;padding-right: 0px;">
        
        <input class="form-control col-md-3 light-table-filter" 
        data-table="table" type="text" placeholder=" Buscar Productos..." style="height: 47px;border-left-width: 1px;top: 8px;" id="busqueda">

            <a href="" class = "logo"></a>
            <nav class = "navigation">
              
            <ul>
                    
                    <li style="padding-right: 10px;"><?php echo $user->getNombre(); ?></li>
                    
                    <li class="cerrar-sesion">
                    <a href="includes/logout.php" style="padding-left: 13px;"><i class="fa-solid fa-right-from-bracket" title="Cerrar Sesion"></i></a> </li>
                </ul>
            
            </nav>
        </div>
    </header>
    <main>
    
    <form action="crud2-actualizar-proveedor.php" class="registro" method="POST" enctype="multipart/form-data">
    <div class="form-inline">
        
      </div>
      <script type="text/javascript">
    (function(document) {
      'use strict';

      var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
          _input = e.target;
          var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
          Arr.forEach.call(tables, function(table) {
            Arr.forEach.call(table.tBodies, function(tbody) {
              Arr.forEach.call(tbody.rows, _filter);
            });
          });
        }

        function _filter(row) {
          var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
          row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('light-table-filter');
            Arr.forEach.call(inputs, function(input) {
              input.oninput = _onInputEvent;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          LightTableFilter.init();
        }
      });

    })(document);
    </script>

    

      <!-- Modal -->
    
      <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <h1 class= "crear-user">PRODUCTO</h1>
                <button type="button" class="boton-cerrar" data-dismiss="modal" >
                <i class="fa-solid fa-xmark"></i></button> 
            </div>
           
            <div class="modal-body">



                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Cantidad" name="Cantidad">
                </div>

                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Precio" name="Precio">
                </div>

                <div class="form-group">
                <input type="date" class="form-control"  placeholder= "" name="Fecha">
                </div>
 
            </div>
                
            <div class="modal-footer">
               
                <button type="submit" class="boton-ana3 px-3 py-1 " style="border:none;" >
                    Enviar Datos
                </button>
                

            </div>
                
            </div>
        </div>
        </div>  

        </div>
</form> 

 <!---- TABLA----->
 
 <div class="espacio-table">
    <table class="table" style="width: 1480px;">

        <thead class= "tabla-cabecera">
            <tr >
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px;">ID</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px;padding-left: 37px;">Imagen</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px;">Productos</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px;">Peso</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px;">Color</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px;">Valor de Venta</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px;">Unidades Disponibles</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px;padding-left: 40px;" >Unidades vendidas</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px;padding-left: 40px;" >Monto</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px;padding-left: 40px;" >Opciones</th>
                

                
                

            </tr>
        </thead>

        <tbody>
            <?php
               
                $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
                
                $sql="SELECT * FROM producto WHERE Proveedor = '$ID_PROV'";
                $result = mysqli_query($conexion,$sql);
                
                
                $monto = array();
                $ventastotal = array();
                $i = 0;
                $temp = 0;
                $temp2 = 0;
      
               
               

                while($mostrar = mysqli_fetch_array($result)){
                    $id = $mostrar['idProducto'];
                    $consulta_1="SELECT * FROM entrada_inventario WHERE idEntrada_Inventario = '$id'";
                    $result2 = mysqli_query($conexion,$consulta_1);
                    $mostrar2 = mysqli_fetch_array($result2);

                    

                    $consulta_validacion="SELECT * FROM ventas WHERE id_productos = '$id'";
                    $validacion_ID = mysqli_query($conexion,$consulta_validacion);

                    $arrayDatos = array();
                    $arrayDatos = mysqli_fetch_row($validacion_ID);
                    empty($arrayDatos);

                      if ($arrayDatos == 0) {
                        $monto[$i] = 0;
                        $ventastotal [$i] = 0;
                      }elseif($arrayDatos != 0) {
                        $consulta_2="SELECT * FROM (SELECT idDetalle_ventas,Subtotal,Cantidad FROM detalle_ventas)alias1 , 
                        (SELECT idVentas FROM ventas WHERE id_productos = '$id')alias2  WHERE idDetalle_ventas = idVentas";
                        $result3 = mysqli_query($conexion,$consulta_2);
                        while($mostrar3 = mysqli_fetch_array($result3)){
                          $temp += $mostrar3['Subtotal'];
                          $temp2 += $mostrar3['Cantidad'];
                          $monto[$i] = $temp;
                          $ventastotal[$i] = $temp2;
                          
                          
                        }  
                      }
                
            ?>
            <tr>

                <th style ="background-color:white;" ><?php echo $mostrar['idProducto'] ?></th>
                <th style ="background-color:white;" style="height: 35px;padding-left: 1px;padding-right: 12px;width: 12px;"><img height="100px" width="110px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar['Imagen'])?>"></th>
                <th style ="background-color:white;" ><?php echo $mostrar['Nombre'] ?></th>
                <th style ="background-color:white; padding-left:25px;" ><?php echo $mostrar['Peso'] ?></th>
                <th style ="background-color:white;" ><?php echo $mostrar['Color'] ?></th>
                <th style ="background-color:white; padding-left:50px;" >$ <?php echo $mostrar2['Valor_de_compra'] ?></th>
                <th style ="background-color:white; padding-left:90px;" ><?php echo $mostrar2['Cantidad_disponible'] ?> uds.</th>
                <th style ="background-color:white; padding-left:90px;" ><?php echo $ventastotal[$i]?> uds.</th>
                <th style="background-color:white;padding-left: 35px;" >$ <?php echo $monto[$i]?></th>
                

                <th style ="background-color:white;;" class="botones-op">

                    <div class= "botones-opciones">
                        
                            
                    <form action="crud2-actualizar-proveedor.php" class="registro" method="POST" enctype="multipart/form-data">
                                <input type="hidden"value="<?php echo$mostrar['idProducto']?>"name="txtID"readonly>
                                <button class="boton-ver" style="border:none;"><i class="fa-solid fa-gear" title = "Ver mas"> </i>  Ajustes</button>
                      </form>          
                            
                        
                    </div>
                </th>
            </tr>

            <?php
              $i = $i+1;
              $temp = 0;
              $temp2 = 0;
                }
            ?>

        </tbody>
   </table>
 </div>
 
    


    </main>
    
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    
</body>
</html>