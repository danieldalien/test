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

    .box select {
    background-color: white;
    color: black;
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

    <title>Create New User</title>

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

      <form action="../create/create_new_user.php" method="post" >
        <h1>Create new User</h1>

        <div class="info">
          <p> First Name </p>
          <input type="text" name="first_name" placeholder="First Name" required >
        </div>

        <div class="info">
            <p> Last Name </p>
            <input type="text" name="last_name" placeholder="Last Name" required >
        </div>

        <div class="info">
            <p> E-mail </p>
            <input type="email" name="email" placeholder="E-mail " required >
        </div>

        <div class="info">
            <p> Password </p>
            <input type="password" name="password" placeholder="Password" required >
        </div>
        <div class="box" >
        <p> Select user rights </p>
            <select name = "rights" id = "rights">
                <option value="">--- </option>
                <option value="admin">Admin</option>
                <option value="client">Client</option>
            </select>
        </div><br><br>
        <button type="submit" value="Submit" >Submit</button>

      </form>
    </div>
  </body>
</html>


<script>  
</script> 