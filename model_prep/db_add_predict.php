<?php

include('db.php');
if(isset($_POST['img_name'])){
    $img_name = $con->real_escape_string($_POST['img_name']);
    $result = $_POST['result'];

    $query = "INSERT INTO prediction (img_name, result) VALUES ('$img_name','$result');";
    if($con->query($query)){
        echo "SUCCESS";
    }else{
        echo $con->error;
    }
}else{
    echo "NOT VIEWABLE STUFF";
}