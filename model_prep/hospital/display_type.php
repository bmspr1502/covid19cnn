<?php 
include('db.php');
$type = $_POST['disp_type'];
//echo $type;
if($type == 1)
{
    $sql = "SELECT * FROM patient";
    $result = mysqli_query($con, $sql);
    $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo "
    <table style='border: 1px solid black;' class='table table-dark'>
    <tr>
        <th>NAME</th>
        <th>PHONE</th>
        <th>TEST DATE</th>
        <th>RTPCR</th>
        <th>SCAN RESULT</th>
        <th>PERCENTAGE</th>
        <th>DOCTORS RESULT</th>
        <th>DOCTORS SCORE</th>
        <th>REMARKS</th>
    </tr>
    ";
    foreach($details as $detail)
    {
        echo "
        <tr>
        <td> $detail[pat_name] </td>
        <td> $detail[pat_phone] </td>
        <td> $detail[test_date] </td>
        <td> $detail[rtpcr] </td>
        <td> $detail[scan_result] </td>
        <td> $detail[percentage] </td>
        <td> $detail[doctor_result] </td>
        <td> $detail[score] </td>
        <td> $detail[remarks] </td>
        </tr>
        ";
    }
    echo "</table>";
    //print_r($details);
}
elseif($type == 2)
{
    $sql = "SELECT * FROM patient WHERE doctor_result=1";
    $result = mysqli_query($con, $sql);
    $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo "
    <table style='border: 1px solid black;' class='table table-dark'>
    <tr>
        <th>NAME</th>
        <th>PHONE</th>
        <th>TEST DATE</th>
        <th>RTPCR</th>
        <th>SCAN RESULT</th>
        <th>PERCENTAGE</th>
        <th>DOCTORS RESULT</th>
        <th>DOCTORS SCORE</th>
        <th>REMARKS</th>
    </tr>
    ";
    foreach($details as $detail)
    {
        echo "
        <tr>
        <td> $detail[pat_name] </td>
        <td> $detail[pat_phone] </td>
        <td> $detail[test_date] </td>
        <td> $detail[rtpcr] </td>
        <td> $detail[scan_result] </td>
        <td> $detail[percentage] </td>
        <td> $detail[doctor_result] </td>
        <td> $detail[score] </td>
        <td> $detail[remarks] </td>
        </tr>
        ";
    }
    echo "</table>";
}
elseif($type == 3)
{
    $sql = "SELECT * FROM patient WHERE doctor_result=0";
    $result = mysqli_query($con, $sql);
    $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo "
    <table style='border: 1px solid black;' class='table table-dark'>
    <tr>
        <th>NAME</th>
        <th>PHONE</th>
        <th>TEST DATE</th>
        <th>RTPCR</th>
        <th>SCAN RESULT</th>
        <th>PERCENTAGE</th>
        <th>DOCTORS RESULT</th>
        <th>DOCTORS SCORE</th>
        <th>REMARKS</th>
    </tr>
    ";
    foreach($details as $detail)
    {
        echo "
        <tr>
        <td> $detail[pat_name] </td>
        <td> $detail[pat_phone] </td>
        <td> $detail[test_date] </td>
        <td> $detail[rtpcr] </td>
        <td> $detail[scan_result] </td>
        <td> $detail[percentage] </td>
        <td> $detail[doctor_result] </td>
        <td> $detail[score] </td>
        <td> $detail[remarks] </td>
        </tr>
        ";
    }
    echo "</table>";
}
elseif($type == 4)
{
    $sql = "SELECT * FROM patient WHERE doctor_result=-1 OR score=-1";
    $result = mysqli_query($con, $sql);
    $details = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo "
    <table style='border: 1px solid black;' class='table table-dark'>
    <tr>
        <th>NAME</th>
        <th>PHONE</th>
        <th>TEST DATE</th>
        <th>RTPCR</th>
        <th>SCAN RESULT</th>
        <th>PERCENTAGE</th>
        <th>DOCTORS RESULT</th>
        <th>DOCTORS SCORE</th>
        <th>REMARKS</th>
        <th>VIEW</th>
    </tr>
    ";
    foreach($details as $detail)
    {
        echo "
        <tr>
        <td> $detail[pat_name] </td>
        <td> $detail[pat_phone] </td>
        <td> $detail[test_date] </td>
        <td> $detail[rtpcr] </td>
        <td> $detail[scan_result] </td>
        <td> $detail[percentage] </td>
        <td> $detail[doctor_result] </td>
        <td> $detail[score] </td>
        <td> $detail[remarks] </td>
        <td> <button onclick='view($detail[pat_id])' type='button' class='btn btn-primary view' data-toggle='modal' data-target='#exampleModalLong'>
        View
      </button> </td>
        </tr>
        ";
    }
    echo "</table>";
}
?>