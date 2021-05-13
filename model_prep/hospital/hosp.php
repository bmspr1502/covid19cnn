<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Hospital | Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src='hosp.js'></script>
    <style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: brown;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color:green;
}

.containerss {
    width:60%;
    border: solid black 5px;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-left:20%;
  margin-top:5%;
  align:center;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 7px;
  margin-left:10px
}

.col-75 {
  float: left;
  width: 60%;
  margin-top: 15px;
  margin-bottom:8px;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<script>
$(document).ready(function(){
      $("#addpatient").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);

            $.post("pat_details.php", formValues, function(data){
                // Display the returned data in browser
                $("#result").html(data);
            });
        });
    });
</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">HOSPITAL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">ADD PATIENT <span class="sr-only">(current)</span></a>
        </li>
        <li>
          <a class="nav-link" href="patient.php">PATIENT DETAILS<span class="sr-only">(current)</span></a>
        </li>
        <li>
          <a class="nav-link" href="#">POSITIVE<span class="sr-only">(current)</span></a>
        </li>
        <li>
          <a class="nav-link" href="#">NEGATIVE<span class="sr-only">(current)</span></a>
        </li>
        <li>
          <a class="nav-link" href="#">MONTH<span class="sr-only">(current)</span></a>
        </li>
        <li>
          <a class="nav-link" href="#">MONTH<span class="sr-only">(current)</span></a>
        </li>
        <li>
          <a class="nav-link" href="#">NOT VERFIED<span class="sr-only">(current)</span></a>
        </li>
        <li>
        <a class="nav-link" href="#">Log Out<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="containerss">
  <div id="result"></div>
  <form action="" id="addpatient" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="pname">PATIENT NAME</label>
      </div>
      <div class="col-75">
        <input type="text" id="prd" name="pat_name" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="pri">PATIENT PHONE</label>
      </div>
      <div class="col-75">
        <input type="text" id="pr" name="pat_phone" >
      </div>
      </div>
        <div class="row">
      <div class="col-25">
        <label for="pdesp">PATIENT ADDRESS</label>
      </div>
      <div class="col-75">
        <textarea id="desc" name="pat_address"  style="height:100px"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="pri">TEST DATE</label>
      </div>
      <div class="col-75">
        <input type="date" id="pr" name="date" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
          <br>
        <p>RTPCR TEST</p>
      </div>
      <div class="col-75">
        <input type="radio" id="access" name="rtpcr" value="1">
        <label for="acc">POSITIVE</label><br>
        <input type="radio" id="han" name="rtpcr" value="0">
        <label for="ha">NEGATIVE</label><br>
      </div>
    </div>
   
      <div class="row">
        <div class="col-25">
          <label>CT SCAN IMAGE</label>
        </div>
        <div class="col-75">
          <input type="file" name="image" id="image">
          <button type="button" id='upimg' class="btn btn-danger">Predict</button>
        </div>
      </div>
      <div class="row">
        <div class="col-25">PREVIEW</div>
        <div class = "col-75">
          <div class='preview'>
              <img src="" id="img" width="100" height="100">
              <p id='resultmodal'></p>
          </div>
  </div>
      </div>
      <div class="row">
      <div class="col-25">
        <label for="pri">PREDICTED RESULT</label>
      </div>
      <div class="col-75">
        <input type="text" id="scan_result" name="scan_result" value="-1">
      </div>
    </div>
    <input type="hidden" id='img_name' name="img_name" value="abc.jpg">
    
    <div class="row">
      <div class="col-25">
        <label for="pri">PREDICTED PERCENTAGE</label>
      </div>
      <div class="col-75">
        <input type="text" id="percentage" name="percentage" value="-1">
      </div>
    </div>
    
    
<!--
    <div class="row">
      <div class="col-25">
          <br>
        <p>DOCTOR'S RESULT</p>
      </div>
      <div class="col-75">
        <input type="radio" id="access" name="doc_result" value="1">
        <label for="acc">POSITIVE</label><br>
        <input type="radio" id="han" name="doc_result" value="0">
        <label for="ha">NEGATIVE</label><br>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="pri">SCORE</label>
      </div>
      <div class="col-75">
        <input type="text" id="pr" name="score" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="pdesp">REMARKS</label>
      </div>
      <div class="col-75">
        <textarea id="desc" name="remarks"  style="height:200px"></textarea>
      </div>
    </div>
-->
    <div class="row">
    <div class="col-75">
     <div style="text-align:center" >
     <button type="submit" name='submit' id='submit' class="btn btn-danger">Submit</button>
    </div>
    </div>
</div>
      
</form>
</div>
<br><br><br>

<?php include('footer.php');?>
</body>
</html>
