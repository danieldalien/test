<?php
  require $_SERVER['DOCUMENT_ROOT'].'/teorema/option/settings.php';
  //----------------------
  //This script is executed when the user creates a new plant pura
  //Its add a new plant into the database in function how many caracteristiqua are in the database 'caracteristicas'
  //-----------------------
  $new_plant = array() ;
  $count =( count($_POST) - 1 ) ;

  for($i = 0 ; $i < $count ; $i += 2){ // Increment by two because CaraName is same for to alele

    $new_plant[] = $_POST['idP_'.$i.''].$_POST['id2P_'.$i.''] ;

  }
  array_push($new_plant, $_POST['name']);

  // Start inserting in databsase
  $count = sizeof($new_plant) ;

  //To create a dynamique insert into 
  $test = 'INSERT INTO plantas (nome ,' ;
  for($i = 0 ; $i < $count - 1; $i++){

    $z = $i + 1 ;

    if($i == $count - 2){

      $test = $test.'cara_'.$z.') VALUES' ;

    }else{

      $test = $test.'cara_'.$z.',' ;

    }
  }

   $test_2 = '(-'.$new_plant[$count - 1].'-'.',-' ;
  for($i = 0 ; $i < $count - 1 ; $i++){

    if($i == $count - 2){

      $test_2 = $test_2.$new_plant[$i].'-)' ;

    }else{

      $test_2 = $test_2.$new_plant[$i].'-'.',-' ;

    }
  }

  $test_3 = 'ON DUPLICATE KEY Update nome = -'.$new_plant[$count - 1].'- ,' ;
  for($i = 0 ; $i < $count - 1 ; $i++){

    $z = $i + 1 ;

    if($i == $count - 2){

      $test_3 = $test_3.'cara_'.$z.'= -'.$new_plant[$i].'-;' ;

    }else{

      $test_3 =  $test_3.'cara_'.$z.'= -'.$new_plant[$i].'- ,' ;

    }
  }
  // For Syntax reason changing arrays
  $test_2 = str_replace("-" , "'",$test_2) ;

  $test_3 = str_replace("-" , "'",$test_3) ;
  $sql = $test.$test_2.$test_3 ;

  if ($link->query($sql) === TRUE) {
      echo "New record created successfully";
  } 

  header("Location:../show/show_p1.php");

?>
