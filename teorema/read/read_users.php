<?php

    require $_SERVER['DOCUMENT_ROOT'].'/teorema/option/settings.php';

    // Start Variables 

        $users = array() ;

    // End Variables 

    // Start READ data from database 

        $stmt = $link->prepare('SELECT * FROM users ');
        $stmt->execute();
        $users = $stmt->fetchAll();


    // End READ data from database 


?>