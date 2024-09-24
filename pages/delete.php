<?php
include '../connection/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "DELETE FROM users WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: list.php"); 
    } else {
        echo "Error deleting record: " . $con->error;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>