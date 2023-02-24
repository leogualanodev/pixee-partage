<?php
if  (!isset($_SESSION["pseudo"]) && empty($_SESSION["pseudo"])) {
    header('location: ./?action=pictures');
}
if($this_picture == null ){
    $title = "erreur";
} else {
    $title = $this_picture[0]["title"];
}


$zone_flot = "";
$form = "";

ob_start();
?>
 <ul><li><img src="./public/images/uploads/<?=$_SESSION['avatar'] ?? "";?>" alt="Logo Profil">
        <a href="./?action=editProfil" ><?= $_SESSION['pseudo'] ?? "" ?></a>
        </li>
        <li><a href="./?action=disconnect" >Se déconnecter</a></li></ul>
<?php $nav = ob_get_clean();

if (empty($this_picture)){
    ob_start(); ?>
    <div>Cette photo n'existe pas :)</div>
    <a href="./?action=pictures"> Retourner aux Photos</a>
    <?php  $content = ob_get_clean(); 
} else {
    ob_start(); 
    // var_dump($this_picture);
    // var_dump($this_comment);
    // var_dump($_GET["id"]);
    $date_str = $this_picture[0]["date_publication"];
    $timestamp = strtotime($date_str);
    $date_format = date('d/m/y à H:i' , $timestamp);
     ?>
    <div id="container-this-picture">
        <div id="this-picture">
            <img src="public\image\uploads\<?= $this_picture[0]["path_post"]; ?>" alt="">
            <div id="info-this-picture">
                <p>le <?= $date_format ?></p>
                <img src="./public/image/import/aimer.png" alt="">
            </div>
        </div>
        <div id="comment-this-picture">
            <div id="container-title">
                <div id="title-this-picture">
                    <img src="./public/image/import/titlepicture.gif" alt="">
                    <h2><?= $this_picture[0]['title'] ?></h2>
                </div>
                <div id="pseudo-this-picture">
                    <img src="./public/image/import/avatar.png" alt="">
                <p><?= $this_picture[0]['pseudo'] ?></p>
                </div>
            </div>
            <p id="desc-this-picture"> <span><?= $this_picture[0]['pseudo'] ?>:</span> <?=  $this_picture[0]['desc_post'] ?></p>

            <div id="comment-users-this-picture">
                <!-- boucle qui affichera les commentaires de cette photo  -->
                <?php for( $i = 0 ; $i < count($this_comment) ; $i++){ ?>
                <div>
                    <div class="comments-of-users">
                        <div>
                            <img src="./public/image/import/<?= $this_comment[$i]["avatar"] ?>" alt="">
                            <p><?= $this_comment[$i]["pseudo"] ?></p>
                        </div>
                        <h3><?= $this_comment[$i]['comment'] ?></h3>
                    </div>
                    <div class="comment-date-pseudo">
                        <?php   $date_str1 = $this_comment[$i]["date_comment"];
                                $timestamp1 = strtotime($date_str1);
                                $date_format1 = date('d/m' , $timestamp1); ?>
                        <p><?= $date_format1 ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>

            <form id="input-comment" action="./?action=pictures&id=<?= $_GET["id"]?>" method="post">
                    <?php if ( !empty($errors["commentaire"])){ ?>
                        <div class="error-com"><?= $errors["commentaire"]?></div>
                        <?php } ?>
                <input class="textarea-comment" type="text" name="comment" placeholder="Votre commentaire">
                <input class="button-comment" type="submit" value="Commenter">
            </form>
        </div>
    </div>
    
<?php $content = ob_get_clean(); 
} 

require_once __DIR__ . './../templates/mainTemp.php' ;
