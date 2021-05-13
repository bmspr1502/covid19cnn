<?php 
include('db.php');
$id = $_POST['pat_id'];
//echo $id;
$sql = "SELECT * FROM patient WHERE pat_id=$id";
$result = mysqli_query($con, $sql);
$details = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach($details as $detail)
{
    echo"
    <img src='prediction_api/train_img/$detail[img_name]' height='auto' width='100%'>
    <br><br>
    <form method='post' id='update' action='doc_update.php'>
        <div class='form-group'>
            <label for='exampleFormControlInput1'>PATIENT NAME</label>
            <input type='email' class='form-control' placeholder='$detail[pat_name]' readonly>
        </div>
        <div class='form-group'>
            <label for='exampleFormControlInput1'>MODELS PERCENTAGE OF BEING COVID POSITIVE</label>
            <input type='email' class='form-control' placeholder='$detail[percentage]' readonly>
        </div>
        <input type='hidden' name='id' value='$id'>
        <div class='form-group'>
            <label for='exampleFormControlSelect1'>RESULT</label><br>
            <p><input type='radio' name='doc_result' value=1> POSITIVE</p>
            <p><input type='radio' name='doc_result' value=0> NEGATIVE</p>   
        </div>
        <div class='form-group'>
            <label for='exampleFormControlInput1'>SCORE</label>
            <input class='form-control' name='score' placeholder='Score'>
        </div>
        <div class='form-group'>
            <label for='exampleFormControlTextarea1'>REMARKS</label>
            <textarea class='form-control' name='remarks' rows='2'></textarea>
        </div>
        <button type='submit' name='submit' class='btn btn-primary'>UPDATE</button>
    </form>
    ";
}
?>