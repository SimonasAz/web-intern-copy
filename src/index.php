<!DOCTYPE html>
<html>
  <head>
    <title>docker-compose.yml</title>
  </head>
  <body>
    <?php
      $extract = [];
      $min=1000000000;
        $file_path=__DIR__ . '/data/input.txt';
        if(file_exists($file_path)){
            $file_content=file_get_contents($file_path);
            $extract=explode("\n", trim($file_content));
            
        }else{
            echo "File not found!";
        }
        for( $i=0; $i < count($extract); $i++){
          for( $j=$i + 1; $j < count($extract); $j++){
              if($extract[$i] > $extract[$j]){
                  $temp = $extract[$i];
                  $extract[$i] = $extract[$j];
                  $extract[$j] = $temp;
                }
              }
          }
          
      for( $i=0; $i < count($extract); $i++){
        echo $extract[$i] . "<br>";
    }

        
        

        
    ?>
  </body>
  </html>