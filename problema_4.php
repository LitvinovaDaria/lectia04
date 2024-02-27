<?php

$cale="dosar";
    if(is_dir($cale)){
      $fisiere =scandir($cale);
      $fisiere=array_diff($fisiere,['.','..']);
      foreach($fisiere as $fisier){
        if(is_dir($fisiere)){
             stergereDosar($fisiere);
        }elseif(file_exists($fisiere)){
        unlink($fisier);
        echo "Fisierele au fost sterse!";
            }
      }
      
    }
    else{
        echo "Calea indicata nu este corecta! Nu exista dosar!";
      }

    function stergereDosar(string $directoriu){
        if(!is_dir($directoriu)){
            return false;
        }else{
            $files=scandir($directoriu);
            $files=array_diff($files, ['.','..']);
                foreach($files as $file){
                    if(is_dir($file)){
                      stergereDosar($file);
                    }else{
                       unlink($file); 
                    }
                }
                return rmdir($directoriu);
        }
    }
?>