<?php


require_once __DIR__ . './../models/autoload.php';
require_once __DIR__ . './../models/class/picture.class.php';


function getViewPictures(){
    $picture = new Picture();
    $picture_post = $picture->getPicturesPost();
    
    require_once __DIR__ . './../view/picturesView.php';
}

function getViewThisPicture($id_post){
    $picture = new Picture();

    if ( $_SERVER['REQUEST_METHOD'] == "POST"){
        if ( isset($_POST["comment"]) && !empty($_POST["comment"])){
            $input = filter_input_array(INPUT_POST , [
                'comment' => FILTER_SANITIZE_SPECIAL_CHARS
            ]);

            $errors["commentaire"] = '' ;
            if (strlen($input["comment"]) < 50 ){
                $comment = $input["comment"];
                $picture->addCommentPicture($comment);
            } else {
                $errors["commentaire"] = "Votre commentaire est trop grand !";
            }
            
        }
    }

    $this_comment = $picture->getThisComments($id_post);
    $this_picture = $picture->getThisPicture($id_post);

    require_once __DIR__ . './../view/thisPictureView.php';
}



