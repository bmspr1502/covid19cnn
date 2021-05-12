<?php 
if(isset($_FILES)){
    //print_r($_FILES);
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
                $filedestination = 'prediction_api/pred_img/' . $filenamenew;
                if(move_uploaded_file($filetmp, $filedestination)){
                    echo $filenamenew;
                }
                else{
                    echo '0';
                }
            } 
            else{
                echo '0';
            }
        }
        else{
            echo "0";
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