<?php

    require $_SERVER['DOCUMENT_ROOT'].'/teorema/read/read_cross_plants.php';

    //-------------------------------------
    // This script is respondsible for the table in page show_p1.php
    // ----------------------------------------

    // Start binding informations 

      $count_1 = sizeof($planta_p1) ;
      $count_2 = sizeof($cara_plantas) ;
      $count_test = sizeof($cara_plantas) / 2 + 2 ;

      $test = array() ;

      for($i = 0 ; $i < $count_1 ; $i++){

        $inf = array() ;

        for($j = 2 ; $j < $count_test ; $j++){

          if(isset($planta_p1[$i][$j])){

            $inf[] = array( str_split($planta_p1[$i][$j],2) );

          }else{

            $inf[] = array(array('##','##')) ;

          }
        }
        $test[] = array($planta_p1[$i][1] , $inf ) ;
      }

      for($i = 0 ; $i < $count_1 ; $i++){
  
        $test_planta = array() ;
  
        for($j = 0 ; $j < $count_2 / 2  ; $j++){
  
          $set_0 = 0 ;
          $set_1 = 0 ;
  
  
          for($z = 0 ; $z < $count_2 ; $z++){
  
  
            if($test[$i][1][$j][0][0] == $cara_plantas[$z][0] ){
  
              $cara_1_0 = array($cara_plantas[$z][0] , $cara_plantas[$z][1] , $cara_plantas[$z][2] , $cara_plantas[$z][3] ) ;
              $set_0 = 1 ;
        
            } 
  
            if($test[$i][1][$j][0][1] == $cara_plantas[$z][0] ){
  
              $cara_1_1 = array($cara_plantas[$z][0] , $cara_plantas[$z][1] , $cara_plantas[$z][2] , $cara_plantas[$z][3] ) ;
              $set_1  = 1 ;
        
            } 
  
            if($set_0 == 1 && $set_1 == 1 ){
  
              $test_planta[] = array($cara_1_0 , $cara_1_1);
              $z = $count_2 ;
  
              $cara_1_0 = array() ;
              $cara_1_1 = array() ;
  
            }
  
          }
  
        }
        $show_plants[] = array( $test[$i][0] , $test_planta) ;
  
      }


?>