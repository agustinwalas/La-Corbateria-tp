<?php 
function redirect($pURL){
    if(strlen($pURL)> 0){
        if(headers_sent()){
            echo "<script>document.location.href='".$pURL."';</script>\n";
        }else{
            header("location: " . $pURL);
        }
        exit();
    }
}

function toStar($puntuacion){
    switch ($puntuacion) {
        case 0:
          echo "Sin Puntuaciones";
          break;
        case 1:
          echo "&#9733; &#9734; &#9734; &#9734; &#9734;";
          break;
        case 2:
          echo "&#9733; &#9733; &#9734; &#9734; &#9734;";
          break;
        case 3:
            echo "&#9733; &#9733; &#9733; &#9734; &#9734;";
            break;
        case 4:
            echo "&#9733; &#9733; &#9733; &#9733; &#9734;";
            break;
        case 5:
            echo "&#9733; &#9733; &#9733; &#9733; &#9733;";
            break;
    }
}

function promedioPuntaje($puntuacion){

  $comentarios= file_get_contents('datos/comentarios.json');
  $comentariosJson = json_decode($comentarios, true);
  $puntuacionPromedio = 0;
  $i = 0;
  foreach($comentariosJson as $c){
        if($c['productComment'] == $puntuacion){
            $puntuacionPromedio = $puntuacionPromedio + $c['puntuacion']; 
            $i = $i + 1;
        }
    }
    
    if($i > 0){
        $puntuacionPromedio = $puntuacionPromedio / $i;  
      } else {
        $puntuacionPromedio = $puntuacionPromedio;
      }
      
    toStar(round($puntuacionPromedio));
}

?>