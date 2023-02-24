<?php


require_once __DIR__ . './../models/autoload.php';
require_once __DIR__ . './../models/class/video.class.php';


function getViewVideos(){
    $video = new Video();
    $video_post = $video->getVideosPost();
    
    require_once __DIR__ . './../view/VideosView.php';
}


function getViewThisPicture($id_video){
    $video = new Video();
    $this_video = $video->getThisVideo($id_video);

    require_once __DIR__ . './../view/thisVideoView.php';
}