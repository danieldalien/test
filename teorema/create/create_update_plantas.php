<?php

  require $_SERVER['DOCUMENT_ROOT'].'/teorema/option/settings.php';
  session_start() ;
  //-------------------------------------
  // This script is respondsible for crossing the two parent plants and storing them
  // And for showing the table in the same page
  // ----------------------------------------

  // Start Variables 

    $planta_p1 = array() ;
    $planta_p2 = array() ;
    $cara_plantas = array() ;
    $plantas_f1 = array() ;
    $show_plants = array() ;

  // End Variables 
  $test_var_1 = $_POST['NameP_1'] ;
  $test_var_2 = $_POST['NameP_2'] ;

  $test_var_1 = '-'.$test_var_1.'-';
  $test_var_1 = str_replace("-","'",$test_var_1 );

  $test_var_2 = '-'.$test_var_2.'-';
  $test_var_2 = str_replace("-","'",$test_var_2 );


  // Start Select from Database

    $stmt = $link->prepare('SELECT * FROM plantas WHERE id = '.$test_var_1.'  ');
    $stmt->execute();
    $planta_p1 = $stmt->fetchAll();

    $stmt = $link->prepare('SELECT * FROM plantas WHERE id = '.$test_var_2.' ');
    $stmt->execute();
    $planta_p2 = $stmt->fetchAll();

    $stmt = $link->prepare('SELECT * FROM caracteristicas  ');
    $stmt->execute();
    $cara_plantas = $stmt->fetchAll();

  // End Select from Database
  // Start creating new plants


  $calc_1 = array() ;
  $calc_2 = array() ;

  $count = sizeof($cara_plantas) / 2 ;
  for($i = 2 ; $i < 2 + $count ; $i++){

    if(isset($planta_p1[0][$i]) && isset($planta_p2[0][$i])){

      $calc_1[] = str_split($planta_p1[0][$i],2) ;
      $calc_2[] = str_split($planta_p2[0][$i],2) ;
      
    }else{
      $calc_1[] = array('##','##') ;
      $calc_2[] = array('##','##') ;
    }
  }

  $count = sizeof($calc_1) ;
  for($i = 0 ; $i < $count ; $i++ ){

    if(isset($calc_1[$i][1])){

      $plantas_f1[] = array( $calc_1[$i][0].$calc_2[$i][0] ,
                            $calc_1[$i][1].$calc_2[$i][1] , 
                            $calc_1[$i][1].$calc_2[$i][0] , 
                            $calc_1[$i][1].$calc_2[$i][1] 
                          ) ;
    }else{
      $plantas_f1[] = array( '####' ,
      '####' , 
      '####' , 
      '####' 
       ) ;
    }
  }   

  // End creating new plants

 
  // Start inserting in databsase


    for($j = 0 ; $j < 4 ; $j++){


      $count = sizeof($cara_plantas) / 2 ;
      $test = 'INSERT INTO novas_plantas (nome , p_1 , p_2 ,' ;
      for($i = 0 ; $i < $count ; $i++){
    
        $z = $i + 1 ;
    
          if($i == $count -1 ){
    
            $test = $test.'cara_'.$z.') VALUES' ;
    
          }else{
    
            $test = $test.'cara_'.$z.',' ;
    
          }
      }
    
      $test_2 = '(-planta_'.( $j + 1 ).'-,-'.$planta_p1[0][1].'-'.',-'.$planta_p2[0][1].'-,-' ;
      for($i = 0 ; $i < $count ; $i++){

        if(isset($plantas_f1[$i][$j])){

          if($i == $count -1){
     
            $test_2 = $test_2.$plantas_f1[$i][$j].'-)' ;
     
          }else{
     
            $test_2 = $test_2.$plantas_f1[$i][$j].'-'.',-' ;
          }

        }else{

          if($i == $count -1){

            $test_2 = $test_2.'#'.'-)' ;

          }else{
            $test_2 = $test_2.'#'.'-'.',-' ;
          }

        }
      }
    
      $test_3 = 'ON DUPLICATE KEY Update nome = -planta_'.($j+1).'- , p_1 = -'.$planta_p1[0][1].'- ,p_2 = -'.$planta_p2[0][1].'- ,' ;   
      for($i = 0 ; $i < $count  ; $i++){
     
        $z = $i + 1 ;
        if(isset($plantas_f1[$i][$j])){

          if($i == $count - 1){
     
            $test_3 = $test_3.'cara_'.$z.'= -'.$plantas_f1[$i][$j].'-;' ;
     
          }else{
     
            $test_3 =  $test_3.'cara_'.$z.'= -'.$plantas_f1[$i][$j].'- ,' ;
     
          }
        }else{
            if($i == $count -1){

              $test_3 = $test_3.'cara_'.$z.'= -'.'#'.'-;' ;

            }else{
              $test_3 =  $test_3.'cara_'.$z.'= -'.'#'.'- ,' ;
            }
        } 
      }
      $test_2 = str_replace("-" , "'",$test_2) ;
      $test_3 = str_replace("-" , "'",$test_3) ;
      $sql = $test.$test_2.$test_3 ;

      if ($link->query($sql) === TRUE) {
        echo "New record created successfully";
      } 

    }
  // End inserting in databsase
   
  $test_var_1 = $_POST['idP_1'] ;
  $test_var_1 = '-'.$test_var_1.'-' ;
  $test_var_1 = str_replace("-" , "'" , $test_var_1) ;
  $test_var_2 = $_POST['idP_2'] ;
  $test_var_2 = '-'.$test_var_2.'-' ;
  $test_var_2 = str_replace("-" , "'" , $test_var_2) ;


   //Start binding informations 

    $stmt = $link->prepare('SELECT * FROM novas_plantas WHERE p_1 = '.$test_var_1.' AND p_2 = '.$test_var_2.'   ');
    $stmt->execute();
    $novas_plantas = $stmt->fetchAll();

    $count_1 = sizeof($novas_plantas) ;
    $count_test = sizeof($cara_plantas) / 2 + 4 ;
    $calc_1 = array() ;
    $calc_test = array() ;


    for($i = 0 ; $i < $count_1 ; $i++){ 
      $new = array() ;

      for($j = 4 ; $j < $count_test ; $j++){ 

        $new[] = array(
                          str_split($novas_plantas[$i][$j],2) 

                          );
      }

      $calc_test[] = array($novas_plantas[$i][1] ,$novas_plantas[$i][2] ,$novas_plantas[$i][3] ,$new) ;
    }

    $count = sizeof($cara_plantas) / 2 ;
    $count_2 = sizeof($cara_plantas) ;

    for($i = 0 ; $i < $count_1 ; $i++){

      $test_planta = array() ;

      for($j = 0 ; $j < $count ; $j++){

        $set_0 = 0 ;
        $set_1 = 0 ;
        $set_0_t  = 0 ;
        $set_1_t  = 0 ;

        for($z = 0 ; $z < $count_2 ; $z++){


          if($calc_test[$i][3][$j][0][0] == $cara_plantas[$z][0] ){

            $cara_1_0 = array($cara_plantas[$z][0] , $cara_plantas[$z][1] , $cara_plantas[$z][2] , $cara_plantas[$z][3] ) ;
            $set_0 = 1 ;
      
          } 

          if($calc_test[$i][3][$j][0][1] == $cara_plantas[$z][0] ){

            $cara_1_1 = array($cara_plantas[$z][0] , $cara_plantas[$z][1] , $cara_plantas[$z][2] , $cara_plantas[$z][3] ) ;
            $set_1  = 1 ;
      
          } 

          if($calc_test[$i][3][$j][0][0] === '##' ){
            $cara_1_0 = array('##' , 'Undifiend' , '##' , 'Undifiend' ) ;

            $set_0_t  = 1 ;

          } 
          if($calc_test[$i][3][$j][0][1] === '##' ){

            $cara_1_1 = array('##' , 'Undifiend' , '##' , 'Undifiend' ) ;
            $set_1_t  = 1 ;
      
          } 


          if($set_0 == 1 && $set_1 == 1 ){

            $test_planta[] = array($cara_1_0 , $cara_1_1);
            $z = $count_2 ;

            $cara_1_0 = array() ;
            $cara_1_1 = array() ;

          }
          if($set_0_t == 1 && $set_1_t == 1 ){

            $test_planta[] = array($cara_1_0 , $cara_1_1);
            $z = $count_2 ;

            $cara_1_0 = array() ;
            $cara_1_1 = array() ;

          }

        }

      }
      $show_plants[] = array( $calc_test[$i][0] , $calc_test[$i][1] , $calc_test[$i][2] , $test_planta) ;

    }

  // End binding informations 

  $count = sizeof($show_plants) ;
  $new_plants_counter = array() ;
  $count_2 = sizeof($cara_plantas) / 2 ;

  for($i = 0 ; $i < $count_2 ; $i++){
    $counter_dom = 0 ;
    for($j = 0 ; $j < $count ; $j++){

      if(ctype_upper($show_plants[$j][3][$i][0][2]) || ctype_upper($show_plants[$j][3][$i][1][2]) ){
        $counter_dom++ ;
      }
      
    }
    $new_plants_counter[] = $counter_dom / 4 * 100;
  }

  $_SESSION["new_plants"] = $show_plants ;
  $_SESSION["new_plants_counter"] = $new_plants_counter ;


  header("Location: ../show/show_cross_plants.php");
?>