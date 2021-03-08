<?php

    require $_SERVER['DOCUMENT_ROOT'].'/teorema/read/read_users.php';
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
    .addButton {
    background-color:#00ff00;
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
    .delButton {
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
    
    <title>Plantas - Users</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
    <div class="topnav" id="myTopnav">
        <a href="show_p1.php" >Plantas Puras</a>
        <a href="show_f1.php">Plantas F1</a>
        <a href="show_cross_plants.php">Cruzamento  Plantas</a>
        <a href="show_create_new_p.php">Crear nova Planta Pura</a>
        <a href="show_create_cara.php">Crear nova Caracteristica</a>
        <a href="../index.php?logout=true">Logout</a>
        <?php if($_SESSION["right"] == '1'){ echo '<a href="show_users.php" class="active">Settings</a>'; } ?>
        <a href="javascript:void(0);" class="icon" onclick="myFunction2()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <h2 align="center">Users</h2>  

</head>  

<body>  
    

    <div class="container">  

        <div class="table-responsive">  
        <a href="show_add_user.php" class="addButton">Add User </a>&nbsp;&nbsp; 
    <a href="show_delete_user.php" class="delButton">Delete User</a><br> <br>

            <table id="employee_data" class="table table-striped table-bordered">  

                <thead>  

                    <tr>  

                        <th>First Name</th>  
                        <th>Last Name </th>  
                        <th>User Role </th>  
                        <th>E-mail</th>  
                        <th>Password</th>  

                    </tr>  
                </thead>
                <tbody>
                <?php  
                            $count = sizeof($users) ;


                            for($i = 0 ; $i < $count ; $i++)  
                            {  
                                echo '  
                                    <tr>  

                                        <td> '.$users[$i][2].'</td>  
                                        <td> '.$users[$i][3].'</td>  
                                        <td> '.$users[$i][1].'</td>  
                                        <td> '.$users[$i][4].'</td>  
                                        <td> '.$users[$i][5].'</td>  

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

    function myFunction2() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
    }

</script> 