<?php

require_once('./src/models/class/database.class.php');

class Picture extends Database {

  public int $id;
  public int $id_user;
  public string $title;
  public string $path;
  public string $date_publication;

  public function __construct()
  {
    parent::__construct();
  }

  public function addPicturePost(  $id_user_post ,  $title ,  $path , $desc){
    $addPicturePost = $this->pdo->prepare("INSERT INTO pictures ( id_user , title , path_post , desc_post ) VALUES ( :id_user , :title , :path_post , :desc_post )");
    $addPicturePost->bindParam('id_user', $id_user_post);
    $addPicturePost->bindParam('title', $title);
    $addPicturePost->bindParam('path_post', $path);
    $addPicturePost->bindParam('desc_post', $desc);
    $addPicturePost->execute();
    
  }

  public function getPicturesPost(){
    $getPicturesPost = $this->pdo->prepare("SELECT desc_post , pseudo , title , date_publication , path_post , pictures.id FROM pictures INNER JOIN users ON pictures.id_user = users.id ORDER BY pictures.date_publication DESC;");
    $getPicturesPost->execute();
    $result = $getPicturesPost->fetchAll();

    return $result;
  }

  public function getThisPicture($id_picture){
    $getThisPicture = $this->pdo->prepare("SELECT * FROM pictures INNER JOIN users ON pictures.id_user = users.id  WHERE pictures.id=:id_post");
    $getThisPicture->bindParam('id_post' , $id_picture);
    $getThisPicture->execute();
    $thisPicture = $getThisPicture->fetchAll();
    
    return $thisPicture ;
  }

  public function getThisComments ($id_picture){
    $getThisComments = $this->pdo->prepare("SELECT * FROM comment_picture INNER JOIN users ON comment_picture.id_user = users.id WHERE comment_picture.id_picture=:id_pic  ORDER BY comment_picture.date_comment  ");
    $getThisComments->bindParam('id_pic' , $id_picture);
    $getThisComments->execute();
    $result = $getThisComments->fetchAll();

    return $result ;
  }

  public function addCommentPicture($comment){
    $addCommentPicture = $this->pdo->prepare("INSERT INTO comment_picture (id_user , id_picture , comment) VALUES ( :id_user , :id_picture , :comment)");
    $addCommentPicture->bindParam('id_user' , $_SESSION["id"]);
    $addCommentPicture->bindParam('id_picture' , $_GET["id"]);
    $addCommentPicture->bindParam('comment' , $comment);
    $addCommentPicture->execute();
    

  }

}


// $picture = new Picture(); b  