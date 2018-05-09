<?php

if(isset($_COOKIE['num_visitas'])==false or $_COOKIE['num_visitas']>=10){
    $num_visitas=1;
}

else{
    $num_visitas=$_COOKIE['num_visitas'];
    $num_visitas++;
}

setcookie('num_visitas',$num_visitas,time()+5);

echo 'Numero de veces que has visitado esta página '.$num_visitas.'<br>';
echo '<a href="visitas.php">Volver a visitar</a>';

?>