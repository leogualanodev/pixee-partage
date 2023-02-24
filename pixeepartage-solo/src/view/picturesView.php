<?php
$title = 'Les Photos';
?>
<?php  
    if (isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){
        ob_start();?>
        <ul><li><img src="./public/images/uploads/<?=$_SESSION['avatar'] ?? "";?>" alt="Logo Profil">
        <a href="./?action=editProfil" ><?= $_SESSION['pseudo'] ?? "" ?></a>
        </li>
        <li><a href="./?action=disconnect" >Se déconnecter</a></li></ul>'; 
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
<?php $zone_flot=''; 
$form = '';
?>


<?php
ob_start();
?>
<div id="container-pictures">
<div class="row">
<?php  for( $i = 0 ; $i < count($picture_post) ; $i++){ ?>

   

    <div class="image">
                <img src="public\image\uploads\<?=$picture_post[$i]['path_post'] ?>" alt="">
                <div class="details">
                    <h2>. <span><?= $picture_post[$i]['title'] ?></span></h2>
                    <p><?=$picture_post[$i]['desc_post']?></p>
                        <div class="more">
                            <?php if( isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"]) ){ ?>
                            <a href="./?action=pictures&id=<?= $picture_post[$i]["id"]?>" class="view-post">Plus <span></span></a>
                            <?php } else {} ?>
                        <div class="like-pseudo">
                            
                            <a href=""><img src="./image/import/aimer.png" alt=""></a>
                            
                            <a href=""><?= $picture_post[$i]['pseudo'] ?></a>
                        </div>
                    </div>
                </div>
            </div>



<?php } ?>
</div>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . './../templates/mainTemp.php' ;