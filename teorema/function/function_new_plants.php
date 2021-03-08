<?php

    require $_SERVER['DOCUMENT_ROOT'].'/teorema/read/read_new_plants.php';
    //-------------------------------------
    // This script is respondsible for the table in page show_f1.php
    // ----------------------------------------
    // Start Variables
        $show_new_plants = array() ;
    // End Variables

    // Start binding informations 

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
      $show_new_plants[] = array( $calc_test[$i][0] , $calc_test[$i][1] , $calc_test[$i][2] , $test_planta) ;

    }
    // End Binding infornation

?>
