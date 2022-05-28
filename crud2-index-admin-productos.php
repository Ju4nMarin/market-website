<?php

include_once 'includes/user-admin.php';
include_once 'includes/user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "Hay sesión";
    $user->setUser($userSession->getCurrentUser());
    include_once 'crud2-productos.php';
}else if(isset($_POST['username']) && isset($_POST['password'])){
    //echo "Validación de login";

    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm, $passForm)){
        //echo "usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);  
        include_once 'home-admin.php';
        
        
    }else{
        if ($userForm == "" || $passForm == "" ) {
            include_once 'index-admin.html';
            ?>
            <script src="js/sweetAlert-2.js"></script>
            <?php
        }else {
            //echo "nombre de usuario y/o password incorrecto";
            include_once 'index-admin.html';
            ?>
            <script src="js/sweetAlert.js"></script>
            <?php
        }
    }

}else{
    //echo "Login";
    include_once 'index-admin.html';
}


?>