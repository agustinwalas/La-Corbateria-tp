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
?>