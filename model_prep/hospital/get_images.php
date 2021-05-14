<?php
include 'db.php';
if(isset($_POST['train'])){
    $train = $_POST['train'];

    $sql = "SELECT pat_name, img_name, scan_result, doctor_result FROM patient WHERE trained = $train";
    if($result = $con->query($sql)){
        ?>
        <div class='row'>
        <?php
        while($row = $result->fetch_assoc()){
            ?>
            <div class='col-3 col-md-4 col-sm-6'>
            <div class="card">
                <img class="card-img-top img-fluid" src="prediction_api/train_img/<?php echo $row['img_name']?>" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row['pat_name']?></h4>
                    <p class="card-text">The ML model has predicted this to be 
                    <?php
                        if($row['scan_result']==1){
                            echo "<b style='color:red'>INFECTED</b>";
                        }else{
                            echo "<b style='color:green'>NOT INFECTED</b>";
                        }
                    ?> to CoVID-19. <br>
                    The doctor's result is : <?php
                        if($row['doctor_result']==1){
                            echo "<b style='color:red'>INFECTED</b>";
                        }else{
                            echo "<b style='color:green'>NOT INFECTED</b>";
                        }
                    ?> to CoVID-19.
                    <br>
                    <?php
                        if($row['doctor_result']===$row['scan_result']){
                            echo "<b style='color:green'>The model was correct.</b>";
                        }else{
                            echo "<b style='color:red'>The model identified incorrectly, needs to learn.</b>";
                        }
                    ?>
                    </p>
                    
                </div>
            </div>
            </div>
            <?php
        }
        ?>


        </div>
        <?php
    }else{
        echo "Error: " . $sql . "<br>". $con->error;
    }

}
?>