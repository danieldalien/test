<?php

    require $_SERVER['DOCUMENT_ROOT'].'/teorema/option/settings.php';

    // Start Variables 

        $planta_p1 = array() ;
        $cara_plantas = array() ;

    // End Variables 

    // Start READ data from database 

        $stmt = $link->prepare('SELECT * FROM plantas ');
        $stmt->execute();
        $planta_p1 = $stmt->fetchAll();

        $stmt = $link->prepare('SELECT * FROM caracteristicas  ');
        $stmt->execute();
        $cara_plantas = $stmt->fetchAll();


    // End READ data from database 


?>
