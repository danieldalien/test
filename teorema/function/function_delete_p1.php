<?php

  require $_SERVER['DOCUMENT_ROOT'].'/teorema/option/settings.php';
  session_start() ;
  //-------------------------------------
  // This Scripts is execute when user deletes a plant 
  // ----------------------------------------
  $test_var_1 = $_POST['NameP_1'] ;   


  $sql = "DELETE FROM plantas WHERE id = '$test_var_1'";

  if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
  } 
  header("Location:../show/show_p1.php");

  ?>
