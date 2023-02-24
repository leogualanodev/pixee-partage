<?php
if  (!isset($_SESSION["pseudo"]) && empty($_SESSION["pseudo"])) {
    header('location: ./?action=videos');
}
if($this_video == null ){
    $title = "erreur";
} else {
    $title = $this_video[0]["title"];
}


$zone_flot = "";
$form = "";

ob_start();
?>
 <ul><li><img src="./public/images/uploads/<?=$_SESSION['avatar'] ?? "";?>" alt="Logo Profil">
        <a href="./?action=editProfil" class="button"><?= $_SESSION['pseudo'] ?? "" ?></a>
        </li>
        <li><a href="./?action=disconnect" class="button">Se déconnecter</a></li></ul>
<?php $nav = ob_get_clean();

if (empty($this_video)){
    ob_start(); ?>
    <div>Cette photo n'existe pas :)</div>
    <a href="./?action=pictures"> Retourner aux Photos</a>
    <?php  $content = ob_get_clean(); 
} else {
    ob_start(); ?>

        <video controls>
            <source src="public\video\uploads\<?=$this_video[0]['path_post'] ?>"  type="video/<?= $this_video[0]["type_video"] ?>"> 
           Votre naviguateur ne supporte pas ce type de vidéos.
        </video>
<?php $content = ob_get_clean(); 
} 

require_once __DIR__ . './../templates/mainTemp.php' ;