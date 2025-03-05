<!DOCTYPE html>
<html>
  <head>
    <title>docker-compose.yml</title>
    <style>

        .max{
          position: absolute;
          left: 58px;
            width: 250px;
            height: 30px;
            padding: 5px;
            border: 2px solid #000;
            font-size: 16px;
            background-color: #f1f1f1;
            text-align: center;
        }
        .plus{
          position: absolute;
          left: 320px;
          width: 60px;
          height: 45px;
          font-size: 20px;
          background-color: green;
          cursor: pointer;
        }
        .minus{
          position: absolute;
          left:0px;
          width: 60px;
          height: 45px;
          font-size: 20px;
          background-color: red;
          cursor: pointer;
        }
        .text{
          position: absolute;
          left: 120px;
          font-size: 18px;
        }
  </style>
  </head>
  <body>
    <label>Sorted list of numbers</label> <br><br>
    <?php
      $extract = [];
      $min=1000000000;
      $max=0;
        $file_path=__DIR__ . '/data/input.txt';
        if(file_exists($file_path)){
            $file_content=file_get_contents($file_path);
            $extract=array_map('trim',explode("\n",trim($file_content)));
            $extract=array_filter($extract, 'is_numeric');
            $extract=array_map('intval',$extract);

            sort($extract);
            
        }else{
            echo "File not found!";
        }
       
        if( !empty($extract)){
          foreach($extract as $num){
            echo $num . "<br>";
          }
        } else{
          echo "No numbers found!";
        }
    $max=!empty($extract) ? max($extract) : 0;
      
    ?>
    <br>
    <label class="text">Highest number is</label> <br>
    <input type="text" id = "maxvalue" value="<?php echo $max; ?>" class="max" readonly>
    <button class="minus"onclick="updateValue(-5)">-5</button>
    <button class="plus"onclick="updateValue(5)">+5</button>
    <script>
      function updateValue(change){
        let inputField = document.getElementById("maxvalue");
        let currentValue = parseInt(inputField.value);
        let newvalue = Math.max(0, currentValue + change);
        inputField.value = newvalue;
      }
      </script>
  </body>
  </html>