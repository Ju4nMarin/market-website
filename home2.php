<?php $i = 1; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="//code.tidio.co/eb45wiqhlgnpk4pe08ptsaaiufvlkl4w.js" async></script>
   <title>Home</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="icon" type="image/png" href="images/icons/Logo-2.ico"/>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <!-- custom js file link  -->
   <script src="js/script2.js" defer></script>
   <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<header class="header">
        
        <div class = "container logo-nav-container" style="margin-right: 0px;padding-right: 0px;padding-bottom: 0px;padding-top: 0px;">
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
   
<div class="container">
<div class="products-container">
<?php
             
   $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
   $sql="SELECT * FROM producto";
   $result = mysqli_query($conexion,$sql);


   while($mostrar = mysqli_fetch_array($result)){
     $id = $mostrar['idProducto'];
     $consulta = "SELECT * FROM entrada_inventario where idEntrada_Inventario = '$id'";
     $consulta3 = "SELECT Cantidad_disponible FROM entrada_inventario where idEntrada_Inventario = '$id'";
     $result3 = mysqli_query($conexion,$consulta3);
     $mostrar3 = mysqli_fetch_array($result3);
     $arraycant = array();
     $arraycant[$i] = $mostrar3['Cantidad_disponible'];
     $result2 = mysqli_query($conexion,$consulta);
     $mostrar2 = mysqli_fetch_array($result2);
     
     
               
?>

   

      <div class="product" data-name="p-<?php echo $i?>">
         <img width="280px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar['Imagen'])?>">
         <h3><?php echo $mostrar['Nombre'] ?></h3>
         
         <div class="price">$<?php echo $mostrar2['Valor_de_compra'] ?></div>
         <?php if ($arraycant[$i] == 0) {
            ?> <h4 style = "color:red;"> No hay Stock.</h4> <?php
         }else {
            ?> <h4><?php echo $mostrar2['Cantidad_disponible'] ?> uds.</h4> <?php
         }?>
         
      </div>

   

   <?php
    $i = $i+1; }
   ?>
</div>
</div>


<div class="products-preview">

<?php
    $i = 1;           
   $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
    $sql="SELECT * FROM producto";
    $sql3 = "SELECT * FROM cliente where validacion_nombre = '$user'";
    $result3 = mysqli_query($conexion,$sql3);
    $mostrar3 = mysqli_fetch_array($result3);
   $result = mysqli_query($conexion,$sql);
            
            
   while($mostrar = mysqli_fetch_array($result)){
      $id = $mostrar['idProducto'];
      $consulta = "SELECT * FROM entrada_inventario where idEntrada_Inventario = '$id'";
      $result2 = mysqli_query($conexion,$consulta);
      
      $mostrar2 = mysqli_fetch_array($result2);
      
                        
 ?>
   <form action="crud3-registro-venta.php" method="post" enctype="multipart/form-data"> 
   <div class="preview" data-target="p-<?php echo $i?>">
      <i class="fas fa-times"></i>
      <img width="324px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar['Imagen'])?>">
      <h3><?php echo $mostrar['Nombre'] ?></h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 120 )</span>
      </div>
      <input type="hidden"value="<?php echo $mostrar['idProducto']?>"name="txtID"readonly>
      <input type="hidden"value="<?php echo $mostrar3['idCliente']?>"name="txtID2"readonly>
      <input type="hidden"value="<?php echo $mostrar2['Cantidad_disponible'] ?>"name="lots"readonly>
      <input type="hidden"value="<?php echo $user?>"name="usuario"readonly>
      <input type="hidden"value="<?php echo $mostrar2['Valor_de_compra'] ?>"name="precio"readonly>
      <input style="margin-top: 2px;padding-left: 30px; font-size: 20px; " type="number" 
       value= "<?php echo $mostrar2['Cantidad_disponible'] ?>" min="0" max="<?php echo $mostrar2['Cantidad_disponible'] ?>" class="form-control px-3" name="unidades">
    
      
      <div class="price" style="padding-right: 15px;">$ <?php echo $mostrar2['Valor_de_compra'] ?></div>
      <div class="buttons">
         <button type="submit" class="buy">Comprar</button>
      </div>
   </div>
   </form>
   <?php
    $i = $i+1; }
   ?>
   
   
</div>

</body>
</html>