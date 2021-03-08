<?php

  require $_SERVER['DOCUMENT_ROOT'].'/teorema/option/settings.php';

  $stmt = $link->prepare('SELECT id , valor FROM caracteristicas ORDER BY id DESC LIMIT 1 ');
  $stmt->execute();
  $cara_plantas = $stmt->fetchAll();

  $id =  $cara_plantas[0][0] + 1 ; // To increment the NUMBER id 

  $valor =  $cara_plantas[0][1] ;
  $valor++; // To increment alphabet 
  $valor = strtolower($valor) ; 
  $nome = $_POST['nameC'] ;
  $cara = $_POST['nameR'] ;

  $sql = "INSERT INTO caracteristicas (
      id, 
      nome , 
      valor , 
      cara  ) 
      VALUES 
      ('$id', 
      '$nome', 
      '$valor' ,
      '$cara')
      ";
   if ($link->query($sql) === TRUE) {
  echo "New record created successfully";
  } 

  $id++ ;
  $valor = strtoupper($valor) ;
  $nome = $_POST['nameC'] ;
  $cara = $_POST['nameD'] ;

  $sql = "INSERT INTO caracteristicas (
    id, 
    nome , 
    valor , 
    cara  ) 
    VALUES 
    ('$id', 
    '$nome', 
    '$valor' ,
    '$cara')
    ";
    echo '<pre>';
    echo $sql;
  
  if ($link->query($sql) === TRUE) {
  echo "New record created successfully";
  } 


  $id = $id / 2 ;
  $column_name = 'cara_'.$id ;// To insert new columns into plantas for the new cara

  $id = $id - 1 ;
  $column_last = 'cara_'.$id ;
  $sql = "ALTER TABLE plantas ADD COLUMN $column_name VARCHAR(15) AFTER $column_last; ";

  
  if ($link->query($sql) === TRUE) {
      echo "New record created successfully";
      } 
      
  $sql = "ALTER TABLE novas_plantas ADD COLUMN $column_name VARCHAR(15) AFTER $column_last; ";

  if ($link->query($sql) === TRUE) {
      echo "New record created successfully";
      } 
      header("Location:../show/show_p1.php");
?>
