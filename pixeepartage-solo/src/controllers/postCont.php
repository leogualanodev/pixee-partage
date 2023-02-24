<?php 

require_once __DIR__ . './../models/autoload.php';
require_once __DIR__ . './../models/class/picture.class.php';
require_once __DIR__ . './../models/class/video.class.php';


const ERROR_EMPTY = "Votre publication doit contenir au moins un titre";
const ERROR_SIZE = "Votre post ne doit pas excéder 1000Mo";
const ERROR_SIZEFILE = "Vous devez poster une photo ou vidéo";
const ERROR_FILE = "Votre extention de fichier n'est pas bonne";


function getViewPost() {
    if( $_SERVER['REQUEST_METHOD'] === 'POST'){

        // if ( empty($_POST)){
        //     header('Location: ./');
        // }
        $input = filter_input_array(INPUT_POST , [
            'title' => FILTER_SANITIZE_SPECIAL_CHARS,
            'desc' => FILTER_SANITIZE_SPECIAL_CHARS,
        ]);
        
        $cheminPicture = 'C:\wamp64\www\pixeepartage-solo\public\image\uploads\\';
        $cheminPicture = trim($cheminPicture);
        $cheminVideo = 'C:\wamp64\www\pixeepartage-solo\public\video\uploads\\';
        $cheminVideo = trim($cheminVideo);
        var_dump($_POST);
        var_dump($_FILES);
        $errors = [
            'empty' => '',
            'size' => '',
            'file' => '',
            'emptyfile' => '',
        ];

        $title = $input['title'] ?? '';
        $id_user_post = intval($_SESSION['id']);
        $desc = $input['desc'] ?? '';
        $fichier = $_FILES["file"] ?? '';
        $tmp_name = $fichier['tmp_name'] ?? '';
        $type = $fichier['type'] ?? '';
        $name = $fichier['name'] ?? '';
        $name = md5($name);
        $chemin_final_picture = "$cheminPicture"."$name" ;
        $chemin_final_video = "$cheminVideo"."$name" ;
        
        if ( $fichier['size'] === 0){
            $errors['emptyfile'] = ERROR_SIZEFILE;
            header ('Location: ./');
        } else if ( $fichier['size'] >= 10485765 ) { // égale a 10Mo
            $errors['size'] = ERROR_SIZE;
            header ('Location: ./');
        } else if ( empty($title) || !isset($title)){
            $errors['empty'] = ERROR_EMPTY;
            header ('Location: ./');
        } else if ( $type === 'image/jpeg' ){
                    move_uploaded_file($tmp_name , $chemin_final_picture.'.jpeg');
                    $picture = new Picture();
                    $name = $name.'.jpeg';
                    $picture->addPicturePost( $id_user_post , $title ,  $name ,  $desc);
                    header ('Location: ./');
        } else if ($type === 'image/png' ) {
                    move_uploaded_file($tmp_name , $chemin_final_picture.'.png');
                    $picture = new Picture();
                    $name = $name.'.png';
                    $picture->addPicturePost( $id_user_post , $title ,  $name ,  $desc);
                    header ('Location: ./');
        } else if ( $type === 'video/mp4' ) {
                    $format = "mp4";
                    move_uploaded_file($tmp_name , $chemin_final_video.'.mp4');
                    $video = new Video();
                    $name = $name.'.mp4' ;
                    $video->addVideoPost($id_user_post , $title , $name , $desc , $format);
                    header ('Location: ./');
        } else if ( $type === 'video/avi'){
                    $format = "avi";
                    move_uploaded_file($tmp_name , $chemin_final_video.'.avi');
                    $video = new Video();
                    $name = $name.'.avi' ;
                    $video->addVideoPost($id_user_post , $title , $name , $desc , $format);
                    header ('Location: ./');
        } else if ($type === 'video/webm'){
                    $format = "webM";
                    move_uploaded_file($tmp_name , $chemin_final_video.'.WebM');
                    $video = new Video();
                    $name = $name.'.webm' ;
                    $video->addVideoPost($id_user_post , $title , $name , $desc , $format);
                    header ('Location: ./');
        } else {
            $errors['file'] = ERROR_FILE ;
            header ('location: ./');
        }
        

        
    }
}