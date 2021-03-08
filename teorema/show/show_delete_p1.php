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
        width: 100% ;
        float: left;
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

  </style>

  <head>

    <title>Contact form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  </head>

  <body>

    <div class="main-block">

      <div class="left-part">
        <i class="fas fa-seedling"></i>
        <i class="fas fa-leaf"></i>
        <i class="fas fa-spa"></i>
      </div>

      <form action="../function/function_delete_p1.php" method="post" >
        <h1>Delete "Planta Pura"</h1>

        <div id="first">

          <div class="box">

            <select onchange="p_1(this);" required >
              <?php
                echo '<option value=""> Choose Plant';
              ?>
              <?php    
              $count = sizeof($planta_p1) ;
                for($i = 0 ; $i < $count ; $i++){  

                  echo ' 
                    <option value="['.$planta_p1[$i][0].' , '.$planta_p1[$i][1].']" > '.$planta_p1[$i][1].'
                  ';
                }
              ?>
            </select>

          </div>
          <br>
          <input type="hidden" value="idP_1" name="idP_1" size="32" readonly> <br> 
          <input type="hidden" value="NameP_1" name="NameP_1" size="32" readonly> <br> 

        </div>

        <button type="submit" value="Submit" >Submit</button>

      </form>
    </div>

  </body>
</html>

<script>  


  function p_1(el) {

    var form = el.form;

    var v = el.value;

    v = v.replace('[','');
    v = v.replace(']','');


    v = v.replace(/\s+/g, '-') ;
    v = v.split("-,-") ;
    console.log(v) ;


    form.idP_1.value = v[1];
    form.NameP_1.value = v[0];

  }


</script> 