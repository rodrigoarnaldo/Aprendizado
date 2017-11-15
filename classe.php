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
  
  private function getidvideosfromapi(){
   $url="https://api.myjson.com/bins/ec9qf" ;
    $json = file_get_contents($url);
    $data = json_decode($json);
//  return $data->items[0]->id->videoId;
    
//     $arr = array();
//     foreach($data->items as $item){
//       array_push($arr, $item->id->videoId);
//     }
    
//     return $arr;
return array_map(function($item){return $item->id->videoId;}, $data->items);
    
  }
  
  private function getimagefromapi($videoid){
    $url="https://api.myjson.com/bins/1e4f6v" ;
    $json = file_get_contents($url);
    $data = json_decode($json);

return $data->items[0]->snippet->thumbnails->medium->url; 
  }
  
  public static function getvideo(){
    //return self::getimagefromapi("teste");
    //return self::getidvideosfromapi();
    //$video1 = new video("imagem1", "link1");
    //$video2 = new video("imagem2", "link2");
    //$video3 = new video("imagem3", "link3");
    //return array($video1, $video2, $video3);
    $idVideosAPI = self::getidvideosfromapi();
    $videodesafio = 100;
    $videoquefaltam = $videodesafio - count($idVideosAPI);
    //echo $videoquefaltam;
    $videos = array();
    for($i = 1; $i <= $videoquefaltam; $i++){
      $semvideo = new Video("https://placeholdit.imgix.net/~text?txtsize=33&txt=&w=320&h=180", "#");
      array_push($videos, $semvideo);
    }
    
    foreach($idVideosAPI as $umvideoid){
            $image = self::getimagefromapi($umvideoid);
            $link = "https://www.youtube.com/watch?v=".$umvideoid;
              $video = new Video($image, $link);
            array_push($videos, $video);
            }
    return $videos;
    //die();

  }
}


// echo "<pre>";
// var_dump(canalyoutube::getvideo());
// echo "<pre>";

?>