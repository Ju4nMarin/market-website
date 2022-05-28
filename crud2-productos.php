
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Producto</title>
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

            <a href="index-admin-ventas.php">
                <div class="option">
                    <i class="fa-solid fa-sack-dollar" title="Ventas"></i>
                    <h4>Ventas</h4>
                </div>
            </a>
            
            <a href="#" class="selected">
                <div class="option" >
                    <i class="fa-solid fa-box-archive" title="Gestion Productos"></i>
                    <h4>Productos</h4>
                </div>
            </a>

            <a href="crud-index-admin-user.php" >
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
<main style= "margin-left: 30px;">
<form action="crud2-registro-productos.php" class="registro" method="POST" enctype="multipart/form-data">
    <div class="form-inline">
        <div class="col-13">
        <button type="button" class="boton-ana2 px-3 py-2" style="border:none;" data-toggle="modal" data-target="#modalCRUD" data-controls-modal="modalCRUD" data-backdrop="static" data-keyboard="false">
          Anadir Datos
        </button>
      </div>
      <input class="form-control col-md-3 light-table-filter" data-table="table" type="text" placeholder="Buscar Productos..." style="height: 47px;border-left-width: 1px;left: 5px;">
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
                <input type="text" class="form-control" name="ID" placeholder = "ID" required="Ingreas un ID">
                </div>

               

                <div class="form-group">
                <input type="text" class="form-control" placeholder= "Nombre" name="Nombre">
                </div>

                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Peso" name="Peso">
                </div>

                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Color" name="Color">
                </div>

                <div class="form-group">
                <input type="text" class="form-control"  placeholder= "Precio" name="Precio">
                </div>

                           
                <select class="form-control" name = "categoria" style="margin-bottom: 16px;">
                    <option value = "Tecnologia">Tecnologia</option>
                    <option value = "Ropa">Ropa</option>
                    <option value = "Alimento">Alimento</option>
                    <option value = "Cosmetico">Cosmetico</option>
                </select>


                <div class="form-group">
                <input type="date" class="form-control"  placeholder= "" name="Fecha">
                </div>

                
     
                <?php
               
                $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
                $sql="SELECT * FROM proveedor";
               
                $result = mysqli_query($conexion,$sql);
                ?>
                <select class="form-control" name = "proveedor">
                
                <?php
                while($mostrar = mysqli_fetch_array($result)){
                    $id = $mostrar['idProveedor'];
                    $consulta = "SELECT validacion_nombre FROM cliente WHERE idCliente = '$id'";
                    $result2 = mysqli_query($conexion,$consulta);
                    $mostrar2 = mysqli_fetch_array($result2)
                
                ?>
                  <option value = "<?php echo $mostrar['idProveedor']?>"><?php echo $mostrar2['validacion_nombre'] ?></option>
                

               <?php }?>
               </select>
                <div class="form-group">
                <input type="file" class="form-control" style="border:none; margin-top:13px; padding-left:0px;" name="Imagen" required="Sube una imagen">
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

<div class="form-inline">
 <!---- TABLA ----->
 
 <div class="espacio-table">
    <table class="table" style="width: 670px;">

        <thead class= "tabla-cabecera">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Imagen</th>
                <th scope="col">Productos</th>
                <th scope="col">Peso</th>
                <th scope="col">Color</th>
                
                
                
                <th scope="col" style = "padding-left: 50px;">Opciones</th>
                

                
                

            </tr>
        </thead>

        <tbody>
            <?php
               
                $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
                $sql="SELECT * FROM producto";
                $result = mysqli_query($conexion,$sql);

                while($mostrar = mysqli_fetch_array($result)){
                    $id = $mostrar['idProducto'];
                
            ?>
            <tr>
                <th ><?php echo $mostrar['idProducto'] ?></th>
                <th style="height: 35px;padding-left: 1px;padding-right: 12px;width: 12px;"><img height="100px" width="110px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar['Imagen'])?>"></th>
                <th ><?php echo $mostrar['Nombre'] ?></th>
                <th ><?php echo $mostrar['Peso'] ?> kg</th>
                <th ><?php echo $mostrar['Color'] ?></th>
                
                

                <th class="botones-op">

                    <div class= "botones-opciones">
                        <div class="form-inline">
                            <!---- eliminar ----->
                            
                            <!---- ACTULIZAR----->   
                            <form action="crud2-actualizar-productos.php" method="post">
                                <input type="hidden"value="<?php echo$mostrar['idProducto']?>"name="txtID"readonly>
                                <button class="boton-editar" style="border:none;" data-dismiss="modal" data-toggle="modal" 
                                data-target="#modalEDIT" data-controls-modal="modalEDIT" 
                                data-backdrop="static" data-keyboard="false"><i class="fa-solid fa-pen-to-square" title = "Actualizar"></i></button>
                            </form>
                            <form action="crud2-ver-mas-productos.php" method="post">
                                <input type="hidden"value="<?php echo$mostrar['idProducto']?>"name="txtID"readonly>
                                <button class="boton-ver" style="border:none;" data-dismiss="modal" data-toggle="modal" 
                                data-target="#modalEDIT" data-controls-modal="modalEDIT" 
                                data-backdrop="static" data-keyboard="false"><i class="fa-solid fa-eye" title = "Ver mas"></i></button>
                            </form>
                        </div>
                    </div>
                </th>
            </tr>

            <?php
                }
            ?>

        </tbody>
   </table>
 </div>
 <!---- TABLA2 ----->
 <div class="espacio-table " style= "margin-left: 100px; ">
    <table class="table" style="width: 810px;">

        <thead class= "tabla-cabecera">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha de entrada</th>
                <th scope="col">Valor de compra</th>
                <th scope="col">Cantidad Disponible</th>
                
                
                
                
                

                
                

            </tr>
        </thead>

        <tbody>
            <?php
               
                $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
                $sql="SELECT * FROM entrada_inventario";
                
                $result = mysqli_query($conexion,$sql);
                

                while($mostrar = mysqli_fetch_array($result)){
                    $id = $mostrar['idEntrada_Inventario'];
                
            ?>
            <tr>
                <th ><?php echo $mostrar['idEntrada_Inventario'] ?></th>
                <th ><?php echo $mostrar['Fecha'] ?></th>
                <th ><?php echo $mostrar['Valor_de_compra'] ?> $</th>
                <th ><?php echo $mostrar['Cantidad_disponible'] ?></th>
                
            </tr>

            <?php
                }
            ?>

        </tbody>
   </table>
 </div>

 </div>
 




    </main>

        
    
    
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    



</body>
</html>