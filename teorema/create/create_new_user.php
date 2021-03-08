<?php

  require $_SERVER['DOCUMENT_ROOT'].'/teorema/option/settings.php';

  $first_name = $_POST['first_name'] ;
  $last_name = $_POST['last_name'] ;
  $email = $_POST['email'] ;
  $password = $_POST['password'] ;
  $right = $_POST['rights'] ;


  $sql = "INSERT INTO `users`(
      `user_role_id`, 
      `first_name`, 
      `last_name`, 
      `email`, 
      `password`) 
      VALUES (
        '$right',
        '$first_name'  ,
        '$last_name'  ,
        '$email'  ,
        '$password' 
        )" ;

if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
    } 
    header("Location:../show/show_users.php");


?>
