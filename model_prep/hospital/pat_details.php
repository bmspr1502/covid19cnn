<?php
include('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pat_name = $con->real_escape_string($_POST['pat_name']);
    $pat_phone = $con->real_escape_string($_POST['pat_phone']);
    $pat_address = $con->real_escape_string($_POST['pat_address']);
    $date = $con->real_escape_string($_POST['date']);
    $rtpcr = $con->real_escape_string($_POST['rtpcr']);
    $scan_result = $con->real_escape_string($_POST['scan_result']);
    $percentage = $con->real_escape_string($_POST['percentage']);
    $img_name = $con->real_escape_string($_POST['img_name']);
    $sql = "INSERT INTO patient (pat_name, pat_phone, pat_address, test_date, rtpcr, img_name, scan_result, percentage) VALUES ('$pat_name', '$pat_phone', '$pat_address', '$date', '$rtpcr', '$img_name', '$scan_result', '$percentage')";
    if(mysqli_query($con, $sql))
    {
        echo "Successfully inserted";
    }
    else{
        echo "Error: " . $sql1 . "<br>" . $con->error;
    }
}
?>