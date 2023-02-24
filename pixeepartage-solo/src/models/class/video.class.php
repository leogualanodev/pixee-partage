<?php

require_once('./src/models/class/database.class.php');

class Video extends Database {

  public int $id;
  public int $id_user;
  public string $title;
  public string $path;
  public string $date_publication;
  public function __construct()
  {
    parent::__construct();
  }

  public function addVideoPost(  $id_user_post ,  $title ,  $path , $desc , $format){
    $addVideoPost = $this->pdo->prepare("INSERT INTO videos ( id_user , title , path_post , desc_post , type_video ) VALUES ( :id_user , :title , :path_post , :desc_post , :type_video )");
    $addVideoPost->bindParam('id_user', $id_user_post);
    $addVideoPost->bindParam('title', $title);
    $addVideoPost->bindParam('path_post', $path);
    $addVideoPost->bindParam('desc_post', $desc);
    $addVideoPost->bindParam('type_video', $format);
    $addVideoPost->execute();
    
  }

  public function getVideosPost(){
    $getVideosPost = $this->pdo->prepare("SELECT desc_post , pseudo , title , date_publication , type_video , path_post , videos.id FROM videos INNER JOIN users ON videos.id_user = users.id ORDER BY videos.date_publication DESC;");
    $getVideosPost->execute();
    $result = $getVideosPost->fetchAll();

    return $result;
  }

  public function getThisVideo($id_video){
    $getThisVideo = $this->pdo->prepare("SELECT * FROM videos WHERE id=:id_post");
    $getThisVideo->bindParam('id_post' , $id_video);
    $getThisVideo->execute();
    $thisVideo = $getThisVideo->fetchAll();

    return $thisVideo ;
  }


  
}

// $video = new Video();