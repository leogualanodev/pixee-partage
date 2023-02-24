<?php $title = 'Les vidéos';
$zone_flot= '';
$form = '';
 ?>
<?php  
    if (isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){
        ob_start();?>
        <ul><li><img src="./public/images/uploads/<?=$_SESSION['avatar'] ?? "";?>" alt="Logo Profil">
        <a href="./?action=editProfil" ><?= $_SESSION['pseudo'] ?? "" ?></a>
        </li>
        <li><a href="./?action=disconnect" >Se déconnecter</a></li></ul> 
        <?php $nav = ob_get_clean(); 
    } else {
        ob_start(); ?>
        <div class="box-log">
        <li><a href="./?action=login" >Se connecter</a></li>
        <li><a href="./?action=register" >S'inscrire</a></li>
        </div>
        <?php $nav = ob_get_clean();
    }
?>
<?php
ob_start();
?>
<div id="container-video">
    <div class="row-video">
<?php  for( $i = 0 ; $i < count($video_post) ; $i++){ ?>

    <div class='video'>
        <div class='video-title'>
            <p><?= $video_post[$i]['title']; ?></p>
            <p><?= $video_post[$i]['pseudo']; ?></p>
        </div>
        <video controls>
            <source src="public\video\uploads\<?=$video_post[$i]['path_post'] ?>"  type="video/<?= $video_post[$i]["type_video"] ?>"> 
           Votre naviguateur ne supporte pas ce type de vidéos.
        </video>
        <div class="desc_video">
            <p><?= $video_post[$i]["desc_post"]; ?></p>
            <?php if( isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"]) ){ ?>
                <a href="./?action=videos&id=<?= $video_post[$i]["id"]?>" class="view-post">Plus <span></span></a>
                <?php } else {} ?>
        </div>
    </div>


<?php } ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . './../templates/mainTemp.php' ;