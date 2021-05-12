<?php 
if(isset($_POST['predict'])){
    $file = $_FILES['image'];
    if(isset($file)) {
        $filename = $_FILES['image']['name'];
        $filetmp = $_FILES['image']['tmp_name'];
        $filesize = $_FILES['image']['size'];
        $fileerror = $_FILES['image']['error'];
        $filetype = $_FILES['image']['type'];

        $fileext = explode('.', $filename);
        $fileactualext = strtolower(end($fileext));

        $allowed = array('jpg', 'jpeg', 'png');
        if(in_array($fileactualext, $allowed)){
            if ($fileerror === 0){
                $filenamenew = uniqid('', true) . "." . $fileactualext;
                $filedestination = 'images/' . $filenamenew;
                move_uploaded_file($filetmp, $filedestination);
            } 
            else{
                $_SESSION['data'] = $_POST;
                echo "<script>";
                echo "alert('Image not uploaded. Try again!!');";
                echo "window.location.href = 'index.php';";
                echo "</script>";
                die('Not Uploaded');
            }
        }
        else{
            $_SESSION['data'] = $_POST;
            echo "<script>";
            echo "alert('File type not supported. Try again');";
            echo "window.location.href = 'index.php';";
            echo "</script>";
            die('Not Uploaded');
        }
    }
}
else{
    echo "<script>";
    echo "alert('Access Denied');";
    echo "window.location.href = 'index.php';";
    echo "</script>";
}
?>