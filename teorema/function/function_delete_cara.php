<?php

    require $_SERVER['DOCUMENT_ROOT'].'/teorema/option/settings.php';
    session_start() ;
    $test_var_1 = $_POST['NameP_1'] ;   

    $sql = "DELETE FROM caracteristicas WHERE id = '$test_var_1'";

    if($link->query($sql) === TRUE) {
        echo "New record created successfully";
        } 
    $test_var_1 = $test_var_1 + 1 ;
    $sql = "DELETE FROM caracteristicas WHERE id = '$test_var_1'";

    if ($link->query($sql) === TRUE) {
        echo "New record created successfully";
    } 
    $test_var_1 = 'cara_'.($test_var_1 / 2) ;
    $sql = "ALTER TABLE plantas DROP COLUMN $test_var_1  ";


    if ($link->query($sql) === TRUE) {
        echo "New record created successfully";
    } 
      
    $sql = "ALTER TABLE novas_plantas DROP COLUMN $test_var_1  ";
    if ($link->query($sql) === TRUE) {
      echo "New record created successfully";
    } 

     header("Location:../show/show_p1.php");

  ?>
