<?php 


function getViewDisconnect(){
    if ( empty($_SESSION['pseudo'])){
        header ('location: ./');
    } else {
        
        require_once __DIR__ .'./../view/disconnectView.php'; 
        session_destroy();
    }
}