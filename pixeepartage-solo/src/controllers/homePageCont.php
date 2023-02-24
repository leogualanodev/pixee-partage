<?php 
require_once __DIR__ . './../models/class/picture.class.php';
require_once __DIR__ . './../models/class/video.class.php';

function getViewHomePage(){
   
        $picture = new Picture();
        $video = new Video();
        $last_picture = $picture->getPicturesPost();
        $last_video = $video->getVideosPost();
        require_once __DIR__.'./../view/homePageView.php';
} 
