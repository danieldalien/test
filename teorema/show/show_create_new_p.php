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

    #first {
      width: 40% ;
      float: left;
      height: 100%;


    }
    #second {
    width: 40% ;
      float: right;
      height: 100%;

    }
    .box select {
    background-color: #0563af;
    color: white;
    padding: 12px;
    width: 100%;
    border: none;
    font-size: 15px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
    -webkit-appearance: button;
    appearance: button;
    outline: none;
    }
    .box:hover::before {
    color: rgba(255, 255, 255, 0.6);
    background-color: rgba(255, 255, 255, 0.2);
    }

    .box select option {
    padding: 30px;
    }
    html, body {
    min-height: 100%;
    padding: 0;
    margin: 0;
    font-family: Roboto, Arial, sans-serif;
    font-size: 14px;
    color: #666;
    }
    h1 {
    margin: 0 0 20px;
    font-weight: 400;
    color: #1c87c9;
    }
    p {
    margin: 0 0 5px;
    }
    .main-block {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: green;
    }
    form {
    padding: 25px;
    margin: 25px;
    box-shadow: 0 2px 5px #f5f5f5; 
    background: #f5f5f5; 
    }
    .fas {
    margin: 25px 10px 0;
    font-size: 72px;
    color: #fff;
    }
    .fa-seedling {
    transform: rotate(-20deg);
    }
    .fa-at , .fa-mail-bulk{
    transform: rotate(10deg);
    }
    input, textarea {
    width: calc(100% - 18px);
    padding: 8px;
    margin-bottom: 20px;
    border: 1px solid #1c87c9;
    outline: none;
    }
    input::placeholder {
    color: #666;
    }
    button {
    width: 100%;
    padding: 10px;
    border: none;
    background: #1c87c9; 
    font-size: 16px;
    font-weight: 400;
    color: #fff;
    }
    button:hover {
    background: #2371a0;
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
    .myButton {
    background-color:#c62d1f;
    border-radius:10px;
    border:1px solid #d02718;
    display:inline-block;
    cursor:pointer;
    color:#050005;
    font-family:Arial;
    font-size:17px;
    font-weight:bold;
    font-style:italic;
    padding:8px 15px;
    text-decoration:none;
    }

        
  </style>

  <head>
    <div class="topnav" id="myTopnav">
      <a href="show_p1.php">Plantas Puras</a>
      <a href="show_f1.php">Plantas F1</a>
      <a href="show_cross_plants.php">Cruzamento  Plantas</a>
      <a href="show_create_new_p.php" class="active">Crear nova Planta Pura</a>
      <a href="show_create_cara.php">Crear nova Caracteristica</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction2()"> <i class="fa fa-bars"></i></a>
    </div>
    <title>Create New Planta Pura</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  </head>

  <body>

    <div class="main-block">

      <div class="left-part">
        <i class="fas fa-seedling"></i>
        <i class="fas fa-leaf"></i>
        <i class="fas fa-spa"></i>
        <a href="show_delete_p1.php" class="myButton">Delete Plant</a>
      </div>

      <form action="../create/create_new_plant.php" method="post" >
        <h1>Create new "Planta Pura"</h1>
        <h2>To update a plant enter Name and new caracteristics in the formular</h2>
        <h2>To creat a plant enter new Name and new caracteristics in the formular</h2>

        <div class="info">
          <p> Nome da Planta </p>
          <input type="text" name="name" placeholder="Full Name" required >
        </div>

        <div id="first">

          <?php 
            $count = sizeof($cara_plantas) ;
            for($i = 0 ; $i < $count ; $i += 2 ):  

            echo ' <p> Alele 1 : '.$cara_plantas[$i][1].'  </p>'   
          ?>

          <div class="box">

            <select onchange="p_<?php echo $i; ?>(this);" required >
              <?php
                echo '<option value=""> Choose attribute';
              ?>
              <?php    
                for($j = 0 ; $j < 2 ; $j++){  

                  echo ' 
                    <option value="['.$cara_plantas[$j + $i][3].' , '.$cara_plantas[$j+ $i][0].']" > '.$cara_plantas[$j+ $i][3].'
                  ';
                }
              ?>
            </select>

          </div>
          <br>
          <input type="hidden" value="idP_<?php echo $i ; ?>" name="idP_<?php echo $i  ; ?>" size="32" readonly> <br> 

          <?php endfor?>

        </div>

        <div id="second">
          <?php 

            $count = sizeof($cara_plantas) ;
            for($i = 0 ; $i < $count ; $i += 2 ):  

              echo ' <p> Alele 2 : '.$cara_plantas[$i][1].' </p>'   
          ?>

            <div class="box">

              <select onchange="p2_<?php echo $i; ?>(this);" required >
                <?php
                  echo '<option value=""> Choose attribute';
                ?>

                <?php    
                  for($j = 0 ; $j < 2 ; $j++){  

                    echo ' 
                      <option value="['.$cara_plantas[$j + $i][3].' , '.$cara_plantas[$j+ $i][0].']" > '.$cara_plantas[$j+ $i][3].'
                    ';
                  }
                ?>
              </select>

            </div>
            <br>
            <input type="hidden" value="id2P_<?php echo $i ; ?>" name="id2P_<?php echo $i  ; ?>" size="32" readonly> <br> 

          <?php endfor?>
        </div>

        <button type="submit" value="Submit" >Submit</button>

      </form>
    </div>
  </body>
</html>


<script>  
   <?php for($i = 0 ; $i < $count ; $i += 2 ):  ?>

  function p_<?php echo $i ; ?>(el) {

    var form = el.form;

    var v = el.value;

    v = v.replace('[','');
    v = v.replace(']','');


    v = v.replace(/\s+/g, '-') ;
    v = v.split("-,-") ;
    console.log(v) ;


    form.idP_<?php echo $i ; ?>.value = v[1];


  }
  <?php endfor?>

  <?php for($i = 0 ; $i < $count ; $i += 2 ):  ?>

  function p2_<?php echo $i ; ?>(el) {

  var form = el.form;
  console.log(form) ;

  var v = el.value;

  v = v.replace('[','');
  v = v.replace(']','');


  v = v.replace(/\s+/g, '-') ;
  v = v.split("-,-") ;

  console.log(v) ;

  form.id2P_<?php echo $i ; ?>.value = v[1];


  }
  <?php endfor?>

  function myFunction2() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

</script> 