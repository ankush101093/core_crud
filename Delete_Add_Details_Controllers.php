<?php
    include("config.php");
    // $delete_query = "DELETE FROM details WHERE id='" . $_GET["id"] . "'"; // ye bhi Query thik chl rhi hai lekin se hard delete kr de rha hai 

        // aur ye soft delete kr rha hai
        $id = $_GET['id'];
        date_default_timezone_set("Asia/Calcutta");
        $deleted_at = date("Y-m-d H:i:s");
        $delete_query = " UPDATE details SET id = $id,  deleted_at ='$deleted_at' WHERE id = $id";

    if (mysqli_query($conn, $delete_query)) 
    {
        echo "Record deleted successfully";
        header('location:create_add_details_view.php');
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>