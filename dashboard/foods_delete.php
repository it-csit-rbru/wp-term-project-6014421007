<?php
    $delete_id = $_GET['id'];
    if(isset($delete_id))
    {
        require '../connect.php';
        $delete_food = $conn->query("DELETE FROM foods WHERE food_id=$delete_id");
        if ($delete_food == TRUE) {
            Header("Location: foods_list.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
?>