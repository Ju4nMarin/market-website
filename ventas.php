
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
    <script language="JavaScript" type="text/javascript" src="js/ventanas.js"></script>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    
    <link rel="icon" type="image/png" href="images/icons/Logo-2.ico"/>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script> 
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">       
    
    <link rel="stylesheet" type="text/css" href="css/home-admin.css" th:href="@{/css/home.css}">
    
    
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    
    
    

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<header class="header">
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
            
        </div>
        <div class = "container logo-nav-container">
            
            <nav class = "navigation">
                <ul>
                    
                    
                    
                    
                    
                </ul>
            
            </nav>
        </div>
        <input class="form-control col-md-3 light-table-filter" 
        data-table="table" type="text" placeholder=" Buscar Productos..." style="height: 47px;border-left-width: 1px;top: 8px;right: 750px;" id="busqueda">
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fa-solid fa-circle-user"></i>
            <h4><?php echo $user->getNombre(); ?></h4>
        </div>

        <div class="options__menu">	
            <div class = "opciones-icon">
            <a href="index-admin.php">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="#" class="selected">
                <div class="option">
                    <i class="fa-solid fa-sack-dollar" title="Ventas"></i>
                    <h4>Ventas</h4>
                </div>
            </a>
            
            <a href="crud2-index-admin-productos.php">
                <div class="option">
                    <i class="fa-solid fa-box-archive" title="Gestion Productos"></i>
                    <h4>Productos</h4>
                </div>
            </a>

            <a href="crud-index-admin-user.php">
                <div class="option">
                    <i class="fa-solid fa-users-gear" title="Gestion Usuarios"></i>
                    <h4>Usuarios</h4>
                </div>
            </a>
            </div>

            <a href="includes/logout.php" class= "salir-sesion">
                <div class="option">
                    <i class="fa-solid fa-right-from-bracket" title="Cerrar Sesion"></i>
                    <h4>Salir</h4>
                </div>
            </a>

        </div>

    </div>
<main>

    
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
                <h1 class= "crear-user">USUARIO LOGIN</h1>
                <button type="button" class="boton-cerrar" data-dismiss="modal" >
                <i class="fa-solid fa-xmark"></i></button> 
            </div>
           
            <div class="modal-body">

                <div class="form-group">
                <input type="text" class="form-control" placeholder= "Usuario" name="Usuario">
                </div>

                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Contrasena" name="Contrasena">
                </div>
                
                <select class="form-control" name = "tipo-user">
                    <option value = "admin">Admin</option>
                    <option value = "cliente">Cliente</option>
                    <option value = "proveedor">Proveedor</option>
                </select>

                
                

                
 
            </div>
                
            <div class="modal-footer">
   
                
                <button type="button" class="boton-ana px-3 py-1" style="border:none;" data-dismiss="modal" data-toggle="modal" 
                data-target="#modalCRUD-2" data-controls-modal="modalCRUD-2" 
                data-backdrop="static" data-keyboard="false"><i class="fa-solid fa-arrow-right-long" title = "siguiente"></i></button>
                

            </div>
                
            </div>
        </div>
        </div>  
      
    
    
        </div>

 <!-- Modal 2 -->
    
 <div class="modal fade" id="modalCRUD-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <h1 class = "documento">DOCUMENTO</h1>
                <button type="button" class="boton-cerrar" data-dismiss="modal" >
                <i class="fa-solid fa-xmark"></i></button> 
            </div>
           
            <div class="modal-body">

                <div class="form-group">
                <input type="text" class="form-control" placeholder= "ID" name="ID" >
                </div>

                <div class="form-group">
                <input type="text" class="form-control" placeholder= "Codigo" name="Codigo">
                </div>

                <select class="form-control" name = "Nombre">
                    <option value = "Cedula">Cedula</option>
                    <option value = "Tarjeta de Identida">Tarjeta de Identidad</option>
                    <option value = "Cedula de Extranjeria">Cedula de Extranjeria</option>
                </select> 

            </div>
            <div class="modal-footer">
                
                <button type="button" id="btnGuardar"  class="boton-ana px-3 py-1" style="border:none;" data-dismiss="modal" data-toggle="modal" 
                data-target="#modalCRUD" data-controls-modal="modalCRUD" 
                data-backdrop="static" data-keyboard="false"><i class="fa-solid fa-arrow-left-long" title = "siguiente"></i></button>

                <button type="button" id="btnGuardar"  class="boton-ana px-3 py-1" style="border:none;" data-dismiss="modal" data-toggle="modal" 
                data-target="#modalCRUD-3" data-controls-modal="modalCRUD-3" 
                data-backdrop="static" data-keyboard="false"><i class="fa-solid fa-arrow-right-long" title = "siguiente"></i></button>

            </div>
            
        </div>
    </div>
</div>  
      
    
    
</div>

<!-- Modal 3 -->
    
<div class="modal fade" id="modalCRUD-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <h1 class = "informacion">INFORMACION</h1>
                <button type="button" class="boton-cerrar" data-dismiss="modal" >
                <i class="fa-solid fa-xmark"></i></button> 
            </div>
         
            <div class="modal-body">

                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Identificacion" name="Identificador">
                </div>

                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Primer Nombre" name="Primer-Nombre">
                </div>

                <div class="form-group">
                <input type="text" class="form-control" placeholder= "Segundo Nombre" name="Segundo-Nombre">
                </div>
                
                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Primer Apellido" name="Primer-Apellido">
                </div>

                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Segundo Apellido" name="Segundo-Apellido">
                </div> 
 
                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Correo" name="Correo">
                </div>

                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Telefono" name="Telefono">
                </div> 


                

                
            </div>
            <div class="modal-footer">
                

                <button type="button" id="btnGuardar"  class="boton-ana px-3 py-1" style="border:none;" data-dismiss="modal" data-toggle="modal" 
                data-target="#modalCRUD-2" data-controls-modal="modalCRUD-2" 
                data-backdrop="static" data-keyboard="false"><i class="fa-solid fa-arrow-left-long" title = "anterior"></i></button>

                <button type="button" id="btnGuardar"  class="boton-ana px-3 py-1" style="border:none;" data-dismiss="modal" data-toggle="modal" 
                data-target="#modalCRUD-4" data-controls-modal="modalCRUD-4" 
                data-backdrop="static" data-keyboard="false"><i class="fa-solid fa-arrow-right-long" title = "siguiente"></i></button>
                
            </div>
            
        </div>
    </div>
</div>  
   
</div>

<!-- Modal 4 -->
    
<div class="modal fade" id="modalCRUD-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <h1 class="direccion">DIRECCION</h1>
                <button type="button" class="boton-cerrar" data-dismiss="modal" >
                <i class="fa-solid fa-xmark"></i></button> 
            </div>
         
            <div class="modal-body">

                <div class="form-group" >

                    <div class="form-inline">

                        <input type="hidden" class="carrera-control"  placeholder= "Carrera" name="Carrera">

                        <input type="text" class="form-control"  placeholder= "Calle" name="Calle">

                        <div class="carrera-control">
                        <input type="text" class="form-control"  placeholder= "Num" name="Num">
                        </div>

                        

                     </div>
                    
 
                </div>

                <div class="form-group">
                <input type="text" class="form-control" placeholder= "Codigo Postal" name="Codigo-postal">
                </div>
                
                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Ciudad" name="Ciudad">
                </div>

                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Zona" name="Zona">
                </div> 
                

                
            </div>
            <div class="modal-footer">
                

                <button type="button" id="btnGuardar"  class="boton-ana px-3 py-1" style="border:none;" data-dismiss="modal" data-toggle="modal" 
                data-target="#modalCRUD-3" data-controls-modal="modalCRUD-3" 
                data-backdrop="static" data-keyboard="false"><i class="fa-solid fa-arrow-left-long" title = "siguiente"></i></button>
                <button type="submit" class="boton-ana3 px-3 py-1 " style="border:none;" >
                    Enviar Datos
                </button>
                
            </div>
            
        </div>
    </div>
 </div>  
    
 </div>

 

 <!---- TABLA----->
 
 <div class="espacio-table" style ="margin-left: 170px;">
    <table class="table" style="width: 1480px;">

        <thead class= "tabla-cabecera">
            <tr >
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px; padding-left: 37px;">ID</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px;padding-left: 37px;">Imagen</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px; padding-left: 37px;">Productos</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px; padding-left: 80px;">Cantidad</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px; padding-left: 80px;">Subtotal</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px; padding-left: 80px;">Comprador</th>
                <th scope="col" style="border-top-width: 0px;border-bottom-width: 0px; padding-left: 90px;">Serial</th>

                
                

                
                

            </tr>
        </thead>

        <tbody>
            <?php
               
                $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
                
                $sql="SELECT * FROM ventas";
                $result = mysqli_query($conexion,$sql);
                
                
                
      
               
               

                while($mostrar = mysqli_fetch_array($result)){
                    $id = $mostrar['id_productos'];
                    $id2 = $mostrar['idVentas'];
                    
                    $consulta_1="SELECT * FROM detalle_ventas WHERE idDetalle_Ventas = '$id2'";
                    $result2 = mysqli_query($conexion,$consulta_1);
                    $mostrar2 = mysqli_fetch_array($result2);
                    $id3 =$mostrar2['id_personas'];

                    $consulta_4="SELECT nom1 FROM persona WHERE idPersona = '$id3'";
                    $result4 = mysqli_query($conexion,$consulta_4);
                    $mostrar4 = mysqli_fetch_array($result4);

                    $consulta_2="SELECT * FROM producto WHERE idProducto = '$id'";
                    $result3 = mysqli_query($conexion,$consulta_2);
                    $mostrar3 = mysqli_fetch_array($result3);
     
            ?>
            <tr>

                <th style ="background-color:white;" ><?php echo $mostrar['idVentas'] ?></th>
                <th style ="background-color:white;" style="height: 35px;padding-left: 1px;padding-right: 12px;width: 12px;"><img height="100px" width="110px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar3['Imagen'])?>"></th>
                <th style ="background-color:white; padding-left:50px;" ><?php echo $mostrar3['Nombre'] ?></th>
                <th style ="background-color:white; padding-left:90px;" ><?php echo $mostrar2['Cantidad'] ?> uds.</th>
                <th style ="background-color:white; padding-left:90px;" >$ <?php echo $mostrar2['Subtotal'] ?> </th>
                <th style ="background-color:white; padding-left:90px;" ><?php echo $mostrar4['nom1'] ?> </th>
                <th style ="background-color:white;" ><?php echo $mostrar['Serial'] ?></th>

                

                
            </tr>

            <?php
             
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