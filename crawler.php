<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Crawler</title>
    <link rel="stylesheet" href="crawler.css">
  </head>
  <body>
  
  <h1>Crawler</h1>
  <div class="form">
  <form action="" method="GET">
    <input type="text" name="search" placeholder="Place a website address here..."><br>
    <input type="submit" value="Crawl!">
    </form>
    </div>
    <?php
    if(isset($_GET["search"])){
         $url=$_GET["search"];
         }
    
      //URL validation
      $url = filter_var($url, FILTER_SANITIZE_URL);
      
      if(filter_var($url, FILTER_VALIDATE_URL)){
         //echo("$url is a valid URL");
         }
         else{
         echo("$url is not a valid URL");
         }
      
        $doc=new DOMDocument(); //utworzenie nowego obiektu
        libxml_use_internal_errors(true);
        $doc->loadHTMLFile($url); //zaladowanie strony
        $links = $doc->getElementsByTagName('a'); //wyszukiwanie po tagu
        
        foreach($links as $link){
         $attribute= $link->getAttribute('href'); //wydobywanie linku
         echo '<span class="result">'.$attribute.'</span>';
        
        }
        
        
      //echo "<dir> Hello world";
      ?>
  </body>
</html>