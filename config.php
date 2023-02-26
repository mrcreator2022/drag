<?php

$con = mysqli_connect("localhost","root","","draganddrop") or die(mysqli_error());
 
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
