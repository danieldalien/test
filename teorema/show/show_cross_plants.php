<?php

  require $_SERVER['DOCUMENT_ROOT'].'/teorema/read/read_cross_plants.php';
  session_start() ;
  if(!isset($_SESSION['start']))
	{
		header('location:../index.php?lmsg=true');
		exit;
	}		
	

?>

<!DOCTYPE html>  
<html>  
  <style>

    h4 {
    text-decoration: underline ;
    }

    div.parent {
    position: relative;
    margin-left:150px;
    display : inline-block ;
    }

    div.select {
    position: sticky;
    margin-top:50px;
    float: left;
    clear: none; 
    }
    .topnav {
    overflow: hidden;
    background-color: #333;
    }

    .topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    }

    .topnav a:hover {
    background-color: #ddd;
    color: black;
    }

    .topnav a.active {
    background-color: #4CAF50;
    color: white;
    }

    .topnav .icon {
    display: none;
    }

    @media screen and (max-width: 600px) {
    .topnav a:not(:first-child) {display: none;}
    .topnav a.icon {
    float: right;
    display: block;
    }
    }

    @media screen and (max-width: 600px) {
    .topnav.responsive {position: relative;}
    .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
    }
    .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
    }
    }

  </style>
  <head>  

    <title>Plantas - Teorema</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <div class="topnav" id="myTopnav">
      <a href="show_p1.php" >Plantas Puras</a>
      <a href="show_f1.php">Plantas F1</a>
      <a href="show_cross_plants.php" class="active">Cruzamento  Plantas</a>
      <a href="show_create_new_p.php">Crear nova Planta Pura</a>
      <a href="show_create_cara.php">Crear nova Caracteristica</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction2()"><i class="fa fa-bars"></i></a>
    </div>
    <h3 align="center">Plantas - Teorema</h3>  

  </head>  

  <body>  
    <div class="container">  

      <button onclick="myFunction()"> Show Description  </button>

        <form action="../create/create_update_plantas.php" method="post" name="form1" id="form1">

          <div class="select" >

            <select class="paselect" onchange="p_1(this);" required>
              <?php
                  echo '<option value=""> Choose Plant';
              ?>

              <?php 
                $count = sizeof($planta_p1) ;
                for($i = 0 ; $i < $count ; $i++){  

                  echo ' 
                    <option value="['.$planta_p1[$i][0].' , '.$planta_p1[$i][1].']"> '.$planta_p1[$i][1].'

                  ';
                } 
              ?>
              
            </select>

              X

            <select class="paselect" onchange="p_2(this);" required >
              <?php
                echo '<option value=""> Choose attribute';
              ?>

              <?php 
                $count = sizeof($planta_p1) ;
                for($i = 0 ; $i < $count ; $i++){  

                  echo ' 
                    <option value="['.$planta_p1[$i][0].' , '.$planta_p1[$i][1].']"> '.$planta_p1[$i][1].'

                  ';
                } 
              ?>

            </select>

          </div>    

          <div  style="margin-left: 50%; height: 100px; " >

              <input type="hidden" name="idP_1" size="32" readonly> <br> 
              <input type="hidden"  name="NameP_1" >

              <input type="hidden" name="idP_2" size="32" readonly> 
              <input type="hidden"  name="NameP_2" >
              <input type="submit" value="Cruzamento "> 

          </div>

        </form>

  </body> 

  <body>  

    <div class="container">  

      <div class="table-responsive">  

        <table id="employee_data" class="table table-striped table-bordered">  

          <thead>  

            <tr>  

              <th>Nome</th>  
              <th>P 1</th>  
              <th>P 2</th> 

              <?php

                $count = sizeof($cara_plantas) ;
                for($i = 0 ; $i < $count ; $i++ ){

                  if(ctype_upper( $cara_plantas[$i][2])){
                      echo '  <th> '.$cara_plantas[$i][1].' </th>  ';  
                  }

                }
              ?> 

            </tr>  
          </thead>  
          <tbody>

            <?php  
              if(isset($_SESSION["new_plants"])){

              $count = sizeof($_SESSION["new_plants"]) ;
            }else{
              $count = 0 ;
              }
              $count_2 = sizeof($cara_plantas) / 2 ;
              for($i = 0 ; $i < $count ; $i++)  
              {  
                  echo '  
                  <tr>  
                          <td> '.$_SESSION["new_plants"][$i][0].'</td>  
                          <td> '.$_SESSION["new_plants"][$i][1].'</td>  
                          <td> '.$_SESSION["new_plants"][$i][2].'</td> 
                          ';
                          for($j = 0 ; $j < $count_2 ; $j++){
                            if(isset($_SESSION["new_plants"][$i][3][$j][0][2])){ 
                              echo'
                                <td> '.$_SESSION["new_plants"][$i][3][$j][0][2].'-'.$_SESSION["new_plants"][$i][3][$j][1][2].' </td>  
                              ';
                            }else{
                              echo'
                              <td> Undefiend </td>  
                              ';
                            }
                          }
                echo '</tr>' ;  
                    
              }  
              echo '  
                <tr>  
                        <td> Porcentagem alelo dominante </td>  
                        <td> </td>  
                        <td> </td>  ';
                        for($j = 0 ; $j < $count_2 ; $j++){
                          if(isset($_SESSION["new_plants_counter"][$j])){
                            echo '
                            <td> '.$_SESSION["new_plants_counter"][$j].' %</td> 

                            ';
                          }else{
                            echo '
                            <td> Undefiend </td> 

                            ';
                          }
                        }
                echo '        
                </tr>  
              ';  

            ?>  
          </tbody>    
        </table>  

      </div>  
    </div>  

  </body>  
  
  <body> 

    <div class="parent" id="description" style="display:none" >

      <div style="width: 50%; height: 100px; float: left; "> 

        <h4>Dominante : </h4>  <br>

        <?php

          $count = sizeof($cara_plantas) ;
          for($i = 0 ; $i < $count ; $i++ ){

            if(ctype_upper( $cara_plantas[$i][2])){
              echo '  '.$cara_plantas[$i][2].' =  '.$cara_plantas[$i][3].' ';  
              echo '<br>' ;
            }

          }
       ?>

      </div>

      <div style="margin-left: 50%; height: 100px; "> 

        <h4>Recessivo : </h4>  <br>

        <?php

          $count = sizeof($cara_plantas) ;
          for($i = 0 ; $i < $count ; $i++ ){

              if(ctype_lower( $cara_plantas[$i][2])){
                  echo '  '.$cara_plantas[$i][2].' =  '.$cara_plantas[$i][3].' ';  
                  echo '<br>' ;
              }

          }
        ?>

      </div>

    </div>

  </body> 

</html> 

 <script>  
  $(document).ready(function(){  
        $('#employee_data').DataTable();  


  });  

  function myFunction() {
    var x = document.getElementById("description");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

  function p_1(el) {

    var form = el.form;

    var v = el.value;
    console.log(v) ;

    v = v.replace('[','');
    v = v.replace(']','');

    v = v.replace(/\s+/g, '-') ;
    v = v.split("-,-") ;

    form.idP_1.value = v[1];
    form.NameP_1.value = v[0];

  }

  function p_2(el) {

    var form = el.form;
    console.log(form) ;

    var v = el.value;

    v = v.replace('[','');
    v = v.replace(']','');

    v = v.replace(/\s+/g, '-') ;
    v = v.split("-,-") ;

    form.idP_2.value = v[1];
    form.NameP_2.value = v[0];
  }
  function myFunction2() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
  }
</script> 