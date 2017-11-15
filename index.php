<?php
require("classe.php");
$videos = canalyoutube::getvideo();
// var_dump($videos);
// die();

$videosfaltam = array_filter($videos, function($k){ return $k->link =="#";});
// echo count($videosfaltam) ;
// die();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title> Padrão</title>
  </head>
  <body>
    <div class="cabecalho">
         <h1>
      Aprendizado de ferramentas onlines
    </h1>
    <h2>
      Faltam <?php echo count($videosfaltam) ;?> videos
    </h2> 
    </div> 
    <?php foreach($videos as $video): ?>
    <a target="_blank" href="<?php echo $video->link ?>">
       <img src="<?php echo $video->image ?>"
    </a>
  <?php endforeach;?>
  </body>
</html>