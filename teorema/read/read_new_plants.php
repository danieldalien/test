<?php

    require $_SERVER['DOCUMENT_ROOT'].'/teorema/option/settings.php';

    // Start Variables 

        $novas_plantas = array() ;
        $cara_plantas = array() ;

    // End Variables 

    // Start READ data from database 

        $stmt = $link->prepare('SELECT * FROM novas_plantas ');
        $stmt->execute();
        $novas_plantas = $stmt->fetchAll();

        $stmt = $link->prepare('SELECT * FROM caracteristicas  ');
        $stmt->execute();
        $cara_plantas = $stmt->fetchAll();


    // End READ data from database 


?>
