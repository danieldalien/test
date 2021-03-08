<?php

    // Start connect to the database

        try{
        
            // Creating a new connection.
        // Replace your-hostname, your-db, your-username, your-password according to your database
        $link = new \PDO(   'mysql:host=localhost;dbname=teorema;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                            'root', //'root',\PDO::FETCH_OBJ
                            '', //'',
                            [
                                PDO::ATTR_PERSISTENT            => true,
                                PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
                    
                            ]
                        );
        
        
        }catch(\PDOException $ex){
            print($ex->getMessage());
            echo 'ERROR!';
            print_r( $ex );
        }

    // End connect to the database


    /*
    functiongetUserAccessRoleByID($id)
    {
       
            
        $query = "select user_role from user_right where  id = ".$id;
        
        $rs = mysqli_query($link,$query);
        $row = mysqli_fetch_assoc($rs);
            
        return $row['user_role'];
    }
*/
    //echo "<pre>";
    //print_r($show_plants);
?>