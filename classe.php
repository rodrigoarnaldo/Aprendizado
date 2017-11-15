<?php
class video{
  public $image;
  public $link;
  
  public function __construct($image, $link) {
    $this->image = $image;
    $this->link = $link;
  }
}

class canalyoutube {
  public static function getvideo(){
    $video1 = new video("imagem1", "link1");
    $video2 = new video("imagem2", "link2");
    $video3 = new video("imagem3", "link3");
    
    return array($video1, $video2, $video3);

  }
}
echo "<pre>";
print_r(canalyoutube::getvideo());
echo "<pre>";

?>