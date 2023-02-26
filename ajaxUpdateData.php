<?php 

$con = mysqli_connect("localhost","root","","draganddrop") or die(mysqli_error());
 
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$allData = $_POST['allData'];
if(count($allData)>0) {
    $date = date('Y-m-d',strtotime($allData['date_required']));
    $sql = "UPDATE quotes SET date_required='".$date."' WHERE id=".$allData['id'];
    $con->query($sql);
}



