<?php

    require $_SERVER['DOCUMENT_ROOT'].'/teorema/function/function_plants.php';
    session_start() ;
    if(!isset($_SESSION['start']))
	{
		header('location:../index.php?lmsg=true');
		exit;
	}		
	
?>

<!DOCTYPE html>  
<html>  

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <style>

        h4 {
        text-decoration: underline ;
        }
        .description{
            margin-left: 80px ;
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
            <a href="show_p1.php" class="active">Plantas Puras</a>
            <a href="show_f1.php">Plantas F1</a>
            <a href="show_cross_plants.php">Cruzamento  Plantas</a>
            <a href="show_create_new_p.php">Crear nova Planta Pura</a>
            <a href="show_create_cara.php">Crear nova Caracteristica</a>
            <a href="../index.php?logout=true">Logout</a>
            <?php if($_SESSION["right"] == '1'){ echo '<a href="show_users.php">Settings</a>'; } ?>
            <a href="javascript:void(0);" class="icon" onclick="myFunction2()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <h2 align="center">Plantas P1 - Teorema</h2>  

    </head>  

    <body>  
        
        <button style= "margin-left: 110px ;" onclick="myFunction()"><i class="fa fa-info-circle"></i></i> Show Description  </button>
        <br><br>

        <div id="description" style="display:none" >

            <div style="width: 50%;  margin-left: 80px ;float: left; "> 

                <h4>Dominante : </h4>  <br>
                <?php

                    $count = sizeof($cara_plantas) ;
                    for($i = 0 ; $i < $count ; $i++ ){

                        if(ctype_upper( $cara_plantas[$i][2])){
                            echo '  '.$cara_plantas[$i][2].' =  '.$cara_plantas[$i][3].'

                            ';  
                            echo '<br>' ;
                        }

                    }
                ?>

            </div>
            <div style="margin-left: 50%;  "> 

                <h4>Recessivo : </h4>  <br>
                <?php

                    $count = sizeof($cara_plantas) ;
                    for($i = 0 ; $i < $count ; $i++ ){

                        if(ctype_lower( $cara_plantas[$i][2])){
                            echo '  '.$cara_plantas[$i][2].' =  '.$cara_plantas[$i][3].'

                            ';  
                            echo '<br>' ;
                        }

                    }
                ?>
            </div>
            <br><br><br><br><br>
        </div>

        <div class="container">  

            <div class="table-responsive">  

                <table id="employee_data" class="table table-striped table-bordered">  

                    <thead>  

                        <tr>  

                            <th>Nome</th>  

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
                            $count = sizeof($show_plants) ;
                            $count_cara = sizeof($cara_plantas) / 2 ;

                            for($i = 0 ; $i < $count ; $i++)  
                            {  
                                echo '  
                                    <tr>  
                                        <td> '.$show_plants[$i][0].'</td>  ';

                                            for($j = 0 ; $j < $count_cara ; $j++)  
                                            {  
                                                if(isset($show_plants[$i][1][$j][0][2])){
                                                    
                                                    echo '
                                                        <td> '.$show_plants[$i][1][$j][0][2].'-'.$show_plants[$i][1][$j][1][2].' </td>  

                                                    ';
                                                }else{

                                                    echo '
                                                    <td> Update Plant  </td>  

                                                ';
                                                }
                                            }
                                            echo '
                                    </tr>  
                                ';  
                            }  
                        ?>  
                    </tbody>    
                </table>  
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
    function myFunction2() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
    }
</script> 