<?php
include 'db.php';
$sql = "SELECT pat_name, img_name, scan_result, doctor_result FROM patient WHERE trained = 0";
if($result = $con->query($sql)){
    $rowcount=mysqli_num_rows($result);
   echo $rowcount;
}
?>