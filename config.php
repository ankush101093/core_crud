<?php 
    $server_name ="localhost";
    $user_name ="root";
    $password ="";
    $database_name ="core_crud_php";

    $conn = mysqli_connect($server_name,$user_name,$password,$database_name);

    if(!$conn)
    {
        die("connection failed");
    }


// name
// email
// country_name
// state_name
// city_name
// contact
// image
// created_at
// updated_at
// deleted_at

?>
