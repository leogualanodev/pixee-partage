<?php $title = 'HomePage'; ?>
<?php  
    if (isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){
        ob_start();?>
          <ul id="box-profil">
            <li><img src="./public/image/import/<?= $_SESSION['avatar'] ?>" alt="Logo Profil" id="img-profil">
              <a href="./?action=editProfil" id="name-user"><?= $_SESSION['pseudo'] ?? "" ?></a>
            </li>
            <li><a href="./?action=disconnect" id="btn-dc">Se déconnecter</a></li>
          </ul>
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
<?php ob_start(); ?>
<section id="container">
  <figure>
    <img src="./public/image/import/landscape.png" alt="landscape">
  </figure>
  <div id="float-text">
    <h1>Le partage en toute liberté</h1>
    <p id="welcome">Bienvenue sur <span class="seo"> PixeePartage </span>,</p>
    <p id="join">Venez partager vos <span class="seo">photos</span> et <span class="seo">vidéos</span> <br>sur notre <span class="seo">réseau social</span> innovant !</p>
  </div>
</section>
<?php  $zone_flot = ob_get_clean(); ?>
<?php if (isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){
    ob_start(); ?>
 <div >
    <h1>Poster une photo ou vidéo </h1>

    <form id="form-post" action="./?action=post" method="post" enctype="multipart/form-data">
      <p>Titre du Post :</p>
      <?php if (!empty($errors['empty'])) { ?>
        <div><?= $errors['empty'] ?></div>
      <?php } else if (!empty($errors['size'])) { ?>
        <div><?= $errors['size'] ?></div>
      <?php } else if (!empty($errors['emptyfile'])) { ?>
        <div><?= $errors['emptyfile'] ?></div>
      <?php } ?>
      <input class="input" type="text" name="title">

      <p>Description du post :</p>
      <input class="input" type="text" name="desc">

      <div class="btn-post">
        <p>Uploader une Photo ou Vidéo</p>
        <input class="input" type="file" name="file" id="input-file-post">
        <input class="button" type="submit" value="Poster" id="input-submit-post">
      </div>

    </form>
</div>
<?php $form = ob_get_clean();} else {
    $form = "";
} ?>
<?php 
ob_start();
?>

 <!-- var_dump($last_picture);
 var_dump($last_video);  -->
<h1>ici les photos et videos </h1>

<?php
$content = ob_get_clean();
require_once __DIR__.'./../templates/mainTemp.php';