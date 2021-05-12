<?php 
session_start();
include('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $con->real_escape_string($_POST['pname']);
    $phone = $con->real_escape_string($_POST['phone']);
    //$phone = $_POST['phone'];
    $sql = "SELECT * FROM patient WHERE pat_name='$name' AND pat_phone='$phone'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
        $_SESSION['pname'] = $name;
        $_SESSION['phone'] = $phone;
        echo "<script>window.location.href='patient.php'</script>";
    }
    else{
        echo "Sorry! Your data is not there in our database";
    }
}
?>