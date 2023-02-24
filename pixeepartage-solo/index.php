<?php 
session_start();




require_once __DIR__ . './src/controllers/homePageCont.php';



if (!empty($_GET) && isset($_GET)) {
    if (!empty($_GET['action'] === 'login')){
        require_once __DIR__ . './src/controllers/loginCont.php';
        getViewLogin();
        
    } else if ( !empty($_GET['action'] === 'register')){
        require_once __DIR__ . './src/controllers/registerCont.php';
        getViewRegister();
    } else if (!empty($_GET['action'] == 'post')){
        require_once __DIR__ . './src/controllers/postCont.php';
        getViewPost();
    } else if (!empty($_GET['action'] === 'pictures') && (!isset($_GET["id"]) || empty($_GET["id"])) ){
        require_once __DIR__ . './src/controllers/picturesCont.php';
        getViewPictures();  
    } else if ( !empty($_GET['action'] === 'pictures') && isset($_GET["id"])){
        require_once __DIR__ . './src/controllers/picturesCont.php';
        $id_picture = $_GET["id"];
        getViewThisPicture($id_picture);
    } else if (!empty($_GET['action'] === 'videos') && (!isset($_GET["id"]) || empty($_GET["id"]))){
        require_once __DIR__ . './src/controllers/videoCont.php';
        getViewVideos();
    } else if (!empty($_GET['action'] === 'videos') && isset($_GET["id"])){
        require_once __DIR__ . './src/controllers/videoCont.php';
        $id_video = $_GET["id"];
        getViewThisPicture($id_video);
    } else if (!empty($_GET['action'] === 'disconnect')){
        require_once __DIR__ . './src/controllers/disconnectCont.php';
        getViewDisconnect();
    }
    // } else if ( $_GET['action'] == 'askRegister'){
    //     verifInscription ();
    
    // }
//   if (!empty($_GET['action'] === 'register')) {
//     registerView();
//     // if($_POST){
//       // var_dump($_POST);
//       // var_dump($errors);
//     // }
//   } else if (!empty($_GET['action'] === 'login')){
//     loginView();
//   } else if(!empty($_GET['action'] === 'pictures')){
//     picturesView();
//   } else if ($_GET['action'] === 'videos'){
//     videosView();
//   }


} else {
  getViewHomePage();
}

