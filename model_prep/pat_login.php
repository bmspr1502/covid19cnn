<?php 
session_start();
include('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $con->real_escape_string($_POST['pname']);
    $phone = $con->real_escape_string($_POST['phone']);
    //$phone = $_POST['phone'];
    $sql = "SELECT * FROM patient WHERE pat_name='$name' AND pat_phone='$phone'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
       ?>
        <div class='card text-center'>
            <div class='card-header'><h1>Name : <span style='color:green'><?php echo $row['pat_name']?></h1></div>
            <div class='card-body'>
                <div class='row'>
                    <div class='col-4'>
                        <b>Phone No: </b>
                    </div>
                    <div class='col-6'>
                        <?php echo $row['pat_phone']?>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-4'>
                        <b>Address: </b>
                    </div>
                    <div class='col-6'>
                        <?php echo $row['pat_address']?>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-4'>
                        <b>Test Date: </b>
                    </div>
                    <div class='col-6'>
                        <?php $date=date_create($row['test_date']);
                                echo date_format($date,"d F, Y");?>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-4'>
                        <b>RTPCR Test Result: </b>
                    </div>
                    <div class='col-6'>
                        <?php if($row['rtpcr']){
                                echo "You have been tested <b style='color:red'>POSITIVE</b> in RTPCR testing.";
                            }else{
                                echo "You have been tested <b style='color:green'>NEGATIVE</b> in RTPCR testing.";
                            }?>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-4'>
                        <b>CT Scan Image: </b>
                    </div>
                    <div class='col-6'>
                        <img src='hospital/prediction_api/train_img/<?php echo $row['img_name']?>' width='224' height='224' alt='Image not uploaded'/>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-4'>
                        <b>AI Prediction: </b>
                    </div>
                    <div class='col-6'>
                    <?php if($row['scan_result']==1){
                                echo "The AI model has detected that you are <b style='color:red'>INFECTED BY COVID19</b>. <br>Please wait for confirmation from the Doctors.";
                            }else if($row['scan_result']==0){
                                echo "The AI model has detected that you are <b style='color:green'>NOT INFECTED BY COVID19</b>. <br>Please wait for confirmation from the Doctors.";
                            }else{
                                echo "CT SCAN NOT UPLOADED";
                            }?>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-4'>
                        <b>Doctor's Result: </b>
                    </div>
                    <div class='col-6'>
                    <?php if($row['doctor_result']==1){
                                echo "It has been confirmed that you are <b style='color:red'>INFECTED BY COVID19</b>.";
                            }else if($row['scan_result']==0){
                                echo "It has been confirmed that you are <b style='color:green'>NOT INFECTED BY COVID19</b>.";
                            }else{
                                echo "Waiting for confirmation.";
                            }?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class='row'>
                    <div class='col-4'>
                        <b>Remarks: </b>
                    </div>
                    <div class='col-6'>
                        <?php echo $row['remarks']?>
                    </div>
                </div></div>
        </div>
       <?php
    }
    else{
        echo "Sorry! Your data is not there in our database";
    }
}
?>