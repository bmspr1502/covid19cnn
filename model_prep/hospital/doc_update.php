<?php
include('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $con->real_escape_string($_POST['id']);
    $doc_result = $con->real_escape_string($_POST['doc_result']);
    $score = $_POST['score'];
    $remarks = $con->real_escape_string($_POST['remarks']);
    $sql = "UPDATE patient SET doctor_result='$doc_result', score='$score', remarks='$remarks' WHERE pat_id='$id'";
    if(mysqli_query($con, $sql))
    {
        //echo  "<script>alert('Updated');</script>";
        echo "<script>window.location.href='patient.php'</script>";
    }
    //echo $doc_result;
}
?>