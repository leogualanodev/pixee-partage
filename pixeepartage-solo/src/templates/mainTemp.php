<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="./public/css/style.css">  -->
  <link rel="stylesheet" href="./public/css/styleLogin.css"> 
  <link rel="stylesheet" href="./public/css/stylePictures.css">
  <link rel="stylesheet" href="./public/css/home.style.css">
  <link rel="stylesheet" href="./public/css/form.post.style.css">
  <!-- <link rel="stylesheet" href="./public/css/form.style.css"> -->
  <script src="./public/scripts/script.js" defer></script>
  <title><?= $title ?></title>
</head>

<body>

  <header>
    <nav>
      <div id="box-logo">
        <img src="./public/image/import/logo.png" alt="logo" id="logo">
        <span id="name-site">PixeePartage</span>
      </div>
      <ul>
        <li><a href="./">Accueil</a> </li>
        <li><a href="./?action=pictures">Photos</a> </li>
        <li><a href="./?action=videos">Vidéos</a> </li>
      </ul>
      <?= $nav ?>
      <!-- ce qui change en fonction de si on est connecté ou non  -->
    </nav>
  </header>

  <body>
    <?= $zone_flot ?>
    <?= $form ?>
    <?= $content ?>
  </body>

  <footer>
    <a href="https://twitter.com/" target="__blank">
      <img src="./public/image/import/twitter-icon.png" alt="icône twitter">
    </a>
    <a href="https://play.google.com/" target="__blank">
      <img src="./public/image/import/google-play-icon.png" alt="icône googleplay">
    </a>
    <a href="https://www.apple.com/" target="__blank">
      <img src="./public/image/import/apple-icon.png" alt="icône apple">
    </a>
    <a href="https://github.com/Aiola13">
      <img src="./public/image/import/github-icon.png" alt="icône github">
    </a>
    <p>&copy; PixeePartage 2023</p>
  </footer>
</body>

</html>

