<?php 
session_start();
include('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $con->real_escape_string($_POST['pname']);
    //$phone = $con->real_escape_string($_POST['phone']);
    $phone = $_POST['phone'];
    $sql = "SELECT * FROM login_patient WHERE pat_name='$name' AND pat_phone='$phone'";
    $sql1 = "SELECT * FROM login_patient WHERE pat_phone='$phone'";
    $result = mysqli_query($con,$sql);
    $result1= mysqli_query($con,$sql1);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    $count1= mysqli_num_rows($result1);
    if($count == 1)
    {
        $_SESSION['pname'] = $name;
        $_SESSION['phone'] = $phone;
        echo "<script>window.location.href='patient.php'</script>";
    }
    elseif($count1==1)
    {
        echo "Re-check the name of the patient";
    }
    elseif(($count1==0) && ($count==0))
    {
        $sql2 = "INSERT INTO login_patient (pat_name, pat_phone) VALUES ('$name', '$phone')";
        if(mysqli_query($con, $sql2))
        {
            echo "New user inserted";
            echo "<script>window.location.href='patient.php'</script>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>