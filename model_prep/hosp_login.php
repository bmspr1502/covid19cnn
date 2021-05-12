<?php
session_start();
include('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $con->real_escape_string($_POST['hosp_id']);
    if($id == "HOSP@123")
    {
        echo "Welcome";
        echo "<script>window.location.href='hospital.php'</script>";
    }
    else{
        echo "Incorrect hospital ID";
    }
}
?>