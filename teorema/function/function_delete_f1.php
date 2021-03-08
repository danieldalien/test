<?php

  require $_SERVER['DOCUMENT_ROOT'].'/teorema/option/settings.php';

  //-------------------------------------
  // This Scripts is execute when user deletes ALL the f1 table 
  // ----------------------------------------

  $sql = " TRUNCATE TABLE novas_plantas;";

  if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
  } 
  header("Location:../show/show_f1.php");

  ?>
