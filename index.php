<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//error_reporting(E_ERROR | E_PARSE);
 
date_default_timezone_set("Asia/Calcutta");
 
//include_once 'config_settings.php';
//Database Connection
$con = mysqli_connect( "localhost","root","","draganddrop") or die(mysqli_error());
 
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$today = date("Y-m-d");


//$previous_week = strtotime("+ 1 day");
 
//Works out Previous Week ending Dates from Monday next week date.
$previous_week = date("Y-m-d", strtotime("+ 1 day"));

//$start_week = strtotime("last sunday midnight", $previous_week);
$start_week = strtotime("-1 week +1 day");

$monday = date("d M y", strtotime("+1 day", $start_week));
$monday1 = date("Y-m-d", strtotime("+1 day", $start_week));

$tuesday = date("d M y", strtotime(" +2 day", $start_week));
$tuesday1 = date("Y-m-d", strtotime(" +2 day", $start_week));

$wednesday = date("d M y", strtotime("+3 day", $start_week));
$wednesday1 = date("Y-m-d", strtotime("+3 day", $start_week));

$thursday = date("d M y", strtotime("+4 day", $start_week));
$thursday1 = date("Y-m-d", strtotime("+4 day", $start_week));

$friday = date("d M y", strtotime("+5 day", $start_week));
$friday1 = date("Y-m-d", strtotime("+5 day", $start_week));

$end_week = strtotime("next saturday", $start_week);
 
$goal_mon = mysqli_query($con, "SELECT
    SUM(IF(DATE(date_required) = '" . date('Y-m-d', strtotime('+1 day', $start_week)) . "' , 1, 0)) AS required,
    SUM(IF(DATE(sent_date) = '" . date('Y-m-d', strtotime('+1 day', $start_week)) . "' AND DATE(date_required) = '" . date('Y-m-d', strtotime('+1 day', $start_week)) . "', 1, 0)) AS sent
    FROM quotes
") or die(mysqli_error());
while($row = mysqli_fetch_array($goal_mon)) {
    $required = $row['required'];
    $sent = $row['sent']; //($row['sent'] = '0') ? $row['sent'] : '1';
    if($required === '0' || $sent === '0') { $mon_goal = '0'; } else { $mon_goal = ( $sent / $required ) * 100;}
    if ($mon_goal >= '100') { $mon_success = 'text-success fw-bold';} else { $mon_success = 'text-danger';}
}

$goal_tue = mysqli_query($con, "SELECT
    SUM(IF(DATE(date_required) = '" . date('Y-m-d', strtotime('+2 day', $start_week)) . "' , 1, 0)) AS required,
    SUM(IF(DATE(sent_date) = '" . date('Y-m-d', strtotime('+2 day', $start_week)) . "' AND DATE(date_required) = '" . date('Y-m-d', strtotime('+2 day', $start_week)) . "', 1, 0)) AS sent
    FROM quotes
") or die(mysqli_error());
while($row = mysqli_fetch_array($goal_tue)) {
    $required = $row['required'];
    $sent = $row['sent']; //($row['sent'] = '0') ? $row['sent'] : '1';
    if($required === '0' || $sent === '0' ) { $tue_goal = '0'; } else { $tue_goal = ( $sent / $required ) * 100; }
    if ($tue_goal >= '100') { $tue_success = 'text-success fw-bold';} else { $tue_success = 'text-danger';}
}


$goal_wed = mysqli_query($con, "SELECT
    SUM(IF(DATE(date_required) = '" . date('Y-m-d', strtotime('+3 day', $start_week)) . "' , 1, 0)) AS required,
    SUM(IF(DATE(sent_date) = '" . date('Y-m-d', strtotime('+3 day', $start_week)) . "' AND DATE(date_required) = '" . date('Y-m-d', strtotime('+3 day', $start_week)) . "', 1, 0)) AS sent
    FROM quotes
") or die(mysqli_error());
while($row = mysqli_fetch_array($goal_wed)) {
    $required = $row['required'];
    $sent = $row['sent']; //($row['sent'] = '0') ? $row['sent'] : '1';
    if($required === '0' || $sent === '0' ) { $wed_goal = '0'; } else { $wed_goal = ( $sent / $required ) * 100; }
    if ($wed_goal >= '100') { $wed_success = 'text-success fw-bold';} else { $wed_success = 'text-danger';}
}


$goal_thu = mysqli_query($con, "SELECT
    SUM(IF(DATE(date_required) = '" . date('Y-m-d', strtotime('+4 day', $start_week)) . "' , 1, 0)) AS required,
    SUM(IF(DATE(sent_date) = '" . date('Y-m-d', strtotime('+4 day', $start_week)) . "' AND DATE(date_required) = '" . date('Y-m-d', strtotime('+4 day', $start_week)) . "', 1, 0)) AS sent
    FROM quotes
") or die(mysqli_error());
while($row = mysqli_fetch_array($goal_thu)) {
    $required = $row['required'];
    $sent = $row['sent']; //($row['sent'] = '0') ? $row['sent'] : '1';
    if($required === '0' || $sent === '0' ) { $thu_goal = '0'; } else { $thu_goal = ( $sent / $required ) * 100;}
    if ($thu_goal >= '100') { $thu_success = 'text-success fw-bold';} else { $thu_success = 'text-danger';}
}


 
$goal_fri = mysqli_query($con, "SELECT
    SUM(IF(DATE(date_required) = '" . date('Y-m-d', strtotime('+5 day', $start_week)) . "' , 1, 0)) AS required,
    SUM(IF(DATE(sent_date) = '" . date('Y-m-d', strtotime('+5 day', $start_week)) . "' AND DATE(date_required) = '" . date('Y-m-d', strtotime('+5 day', $start_week)) . "', 1, 0)) AS sent
    FROM quotes
") or die(mysqli_error());
while($row = mysqli_fetch_array($goal_fri)) {
    $required = $row['required'];
    $sent = $row['sent']; //($row['sent'] = '0') ? $row['sent'] : '1';
    if($required === '0' || $sent === '0' ) { $fri_goal = '0'; } else { $fri_goal = ( $sent / $required ) * 100;}
    if ($fri_goal >= '100') { $fri_success = 'text-success fw-bold';} else { $fri_success = 'text-danger';}
}
 
$average_g = array_sum(array($mon_goal,$tue_goal,$wed_goal,$thu_goal,$fri_goal)) / count(array($mon_goal,$tue_goal,$wed_goal,$thu_goal,$fri_goal));
if($average_g === 'NAN') { $average_goal = '0'; } else { $average_goal = $average_g; }
?>
 
 
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="refresh" content="300">
        <title>Sent Quote Goal</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap-additional.css" type="text/css" >
        <link rel="stylesheet" href="css/progress.css" type="text/css" media="screen">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
        <!-- Print CSS for Progress Board//-->
        <link rel="stylesheet" href="css/productionPrint.css" type="text/css" media="print">
 
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://use.fontawesome.com/1e2844bb90.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
 
        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
 
        <style>
            html {
                height: 100%;
            }
            body {
                min-height: 100%;
                font-size: 0.9rem;
            }
            a {
                color: #D82508;
            }
            .box {
                cursor: move;
            }
            @media print {
                @page {
                    margin: 0.8cm;
                    size: A4;
                }
            }
        </style>
 
    </head>
 
    <?php //include "nav-header.php" ?>
 
    <body>
        <div class="container-fluid" style="height: 90vh;" >
            <div class="row mx-1 p-2">
                <div class="col mx-1 border rounded border-dark text-center">
                    <h1>Week Average: <?php echo $average_goal; ?>%</h1>
                </div>
                <div class="col-3 mx-1 border rounded border-dark text-center">David: </div>
                <div class="col-3 mx-1 border rounded border-dark text-center">Cameron: </div>
                <div class="col-3 mx-1 border rounded border-dark text-center">Seth: </div>
            </div>
            <div class="row border border-dark mx-1 h-25">
                <div class="col-12 col-md-6 border border-dark position-relative dropzone row_position" id="div_<?php echo $monday1; ?>" ondrop="drop(event)" ondragover="allowDrop(event)" date="<?php echo $monday1; ?>">
                    <h2 class="font-weight-bold border-bottom ">Monday <?php echo $monday; ?></h2>
                    <?php
                    $result_mon = mysqli_query($con, "SELECT `id`, `quote`, `client`, `company`, `mgr_initial`, `sent_date`, `date_required` FROM `quotes` WHERE `date_required` = '" . date('Y-m-d', strtotime('+1 day', $start_week)) . "'  ") or die(mysqli_error());
                    while($row = mysqli_fetch_array($result_mon)) {
                        if($row['sent_date'] === $row['date_required']) { $background = 'alert-success';} else { $background = '';}
                        echo '<h3  date_required="'.$row['date_required'].'" id="drag_'.$row['id'].'" draggable="true" ondragstart="drag(event)" ondrop="return false;" class="box border rounded m-1 px-1 my-1 '.$background.' ">' . floatval($row['quote']) . ' - <b>' . $row['client'] . '</b> ' . $row['company'] . ' - ' . $row['mgr_initial'] . '</h3>';
                    }
                    ?>
                    <h2 class="position-absolute bottom-0 end-0 font-weight-bold <?php echo $mon_success; ?>"><?php echo $mon_goal; ?>%</h2>
                </div>
                <div class="col-12 col-md-6 border border-dark position-relative dropzone row_position" id="div_<?php echo $tuesday1; ?>" ondrop="drop(event)" ondragover="allowDrop(event)" date="<?php echo $tuesday1; ?>">
                    <h2 class="font-weight-bold border-bottom">Tuesday <?php echo $tuesday; ?></h2>
                    <?php $result_tue = mysqli_query($con, "SELECT `id`,`quote`, `client`, `company`, `mgr_initial`, `sent_date`, `date_required` FROM `quotes` WHERE `date_required` = '" . date('Y-m-d', strtotime('+2 day', $start_week)) . "'    ") or die(mysqli_error());
                    while($row = mysqli_fetch_array($result_tue)) {
                        if($row['sent_date'] === $row['date_required']) { $background = 'alert-success';} else { $background = '';}
                        echo '<h3  date_required="'.$row['date_required'].'" id="drag_'.$row['id'].'" draggable="true" ondragstart="drag(event)" ondrop="return false;" class="box border rounded m-1 px-1 my-1 '.$background.' ">' . floatval($row['quote']) . ' - <b>' . $row['client'] . '</b> ' . $row['company'] . ' - ' . $row['mgr_initial'] . '</h3>';
                    }
                    ?>
                    <h2 class="position-absolute bottom-0 end-0 font-weight-bold <?php echo $tue_success; ?>"><?php echo $tue_goal ; ?>%</h2>
                </div>
            </div>
            <div class="row border border-dark mx-1 h-25">
                <div class="col-12 col-md-6 border border-dark position-relative dropzone row_position" id="div_<?php echo $wednesday1; ?>" ondrop="drop(event)" ondragover="allowDrop(event)" date="<?php echo $wednesday1; ?>">
                    <h2 class="font-weight-bold border-bottom">Wednesday <?php echo $wednesday; ?></h2>
                    <?php $result_wed = mysqli_query($con, "SELECT `id`, `quote`, `client`, `company`, `mgr_initial`, `sent_date`, `date_required` FROM `quotes` WHERE `date_required` = '" . date('Y-m-d', strtotime('+3 day', $start_week)) . "'    ") or die(mysqli_error());
                    while($row = mysqli_fetch_array($result_wed)) {
                        if($row['sent_date'] === $row['date_required']) { $background = 'alert-success'; $sent = 'Sent:' . date("d M y", strtotime($row['sent_date'])); } else { $background = ''; $sent ='';}
                        echo '<h3  date_required="'.$row['date_required'].'" id="drag_'.$row['id'].'" draggable="true" ondragstart="drag(event)" ondrop="return false;" class="box border rounded m-1 px-1 my-1 '.$background.' ">' . floatval($row['quote']) . ' - <b>' . $row['client'] . '</b> ' . $row['company'] . ' - ' . $row['mgr_initial'] . '</h3>';
                    }
                    ?>
                    <h2 class="position-absolute bottom-0 end-0 font-weight-bold <?php echo $wed_success; ?>"><?php echo $wed_goal ; ?>%</h2>
                </div>
                <div class="col-12 col-md-6 border border-dark position-relative dropzone row_position" id="div_<?php echo $thursday1; ?>" ondrop="drop(event)" ondragover="allowDrop(event)" date="<?php echo $thursday1; ?>">
                    <h2 class="font-weight-bold border-bottom">Thursday <?php echo $thursday; ?></h2>
                    <?php $result_thu = mysqli_query($con, "SELECT `id`, `quote`, `client`, `company`, `mgr_initial`, `sent_date`, `date_required` FROM `quotes` WHERE `date_required` = '" . date('Y-m-d', strtotime('+4 day', $start_week)) . "'    ") or die(mysqli_error());
                    while($row = mysqli_fetch_array($result_thu)) {
                        if($row['sent_date'] === $row['date_required']) { $background = 'alert-success';} else { $background = '';}
                        echo '<h3  date_required="'.$row['date_required'].'" id="drag_'.$row['id'].'" draggable="true" ondragstart="drag(event)" ondrop="return false;" class="box border rounded m-1 px-1 my-1 '.$background.' ">' . floatval($row['quote']) . ' - <b>' . $row['client'] . '</b> ' . $row['company'] . ' - ' . $row['mgr_initial'] . '</h3>';
                    }
                    ?>
                    <h2 class="position-absolute bottom-0 end-0 font-weight-bold <?php echo $thu_success; ?>"><?php echo $thu_goal ; ?>%</h2>
                </div>
            </div>
            <div class="row border border-dark mx-1 h-25">
                <div class="col-12 col-md-6 border border-dark position-relative dropzone row_position" id="div_<?php echo $friday1; ?>" ondrop="drop(event)" ondragover="allowDrop(event)" date="<?php echo $friday1; ?>">
                    <h2 class="font-weight-bold border-bottom">Friday <?php echo $friday; ?></h2>
                    <?php $result_fri = mysqli_query($con, "SELECT `id`, `quote`, `client`, `company`, `mgr_initial`, `sent_date`, `date_required` FROM `quotes` WHERE `date_required` = '" . date('Y-m-d', strtotime('+5 day', $start_week)) . "'    ") or die(mysqli_error());
                    while($row = mysqli_fetch_array($result_fri)) {
                        if($row['sent_date'] === $row['date_required']) { $background = 'alert-success';} else { $background = '';}
                        echo '<h3  date_required="'.$row['date_required'].'" id="drag_'.$row['id'].'" draggable="true" ondrop="return false;" ondragstart="drag(event)" class="box border rounded m-1 px-1 my-1 '.$background.' ">' . floatval($row['quote']) . ' - <b>' . $row['client'] . '</b> ' . $row['company'] . ' - ' . $row['mgr_initial'] . '</h3>';
                    }
                    ?>
                    <h2 class="position-absolute bottom-0 end-0 font-weight-bold <?php echo $fri_success; ?>"><?php echo $fri_goal ; ?>%</h2>
                </div>
                <div class="col-12 col-md-6 border border-dark position-relative">
                    <h2 class="font-weight-bold border-bottom">Follow Ups<small> Hot & Potential</small></h2>
                    <?php $result_fri = mysqli_query($con, "SELECT `id`, `quote`, `client`, `company`, `mgr_initial`, `sent_date`, `date_required` FROM `quotes` WHERE ( `follow_up` <= '" . date('Y-m-d', strtotime('-7 day', $start_week)) . "' OR `follow_up` IS NULL ) AND `sent_date` IS NOT NULL AND `stage` IN ('Hot', 'Potential') ORDER BY `quote` DESC LIMIT 10 ") or die(mysqli_error());
                    while($row = mysqli_fetch_array($result_fri)) {
                        echo '<h3 class="border rounded m-1 px-1 my-0">' . floatval($row['quote']) . ' - <b>' . $row['client'] . '</b> - ' . $row['mgr_initial'] . '</h3>';
                    }
                    ?>
                </div>
            </div>
            <div class="row border border-dark mx-1 h-25">
                <div class="col-12 col-md-6 border border-dark position-relative dropzone">
                    <h2 class="font-weight-bold border-bottom">Next Week Focus</h2>
                    <?php $result_fri = mysqli_query($con, "SELECT `id`, `quote`, `client`, `company`, `mgr_initial`, `sent_date`, `date_required` FROM `quotes` WHERE `date_required` > '" . date('Y-m-d', strtotime('+5 day', $start_week)) . "' AND `sent_date` IS NULL ") or die(mysqli_error());
                    while($row = mysqli_fetch_array($result_fri)) {
                        echo '<h3 draggable="true" class="box border rounded m-1 px-1 my-1">' . floatval($row['quote']) . ' - <b>' . $row['client'] . '</b> ' . $row['company'] . ' - ' . $row['mgr_initial'] . '</h3>';
                    }
                    ?>
                    <h2 class="position-absolute bottom-0 end-0 font-weight-bold float-right"></h2>
                </div>
                <div class="col-12 col-md-6 border border-dark position-relative dropzone">
                    <h2 class="font-weight-bold border-bottom">Enquiries to be allocated</h2>
                    <?php $result_fri = mysqli_query($con, "SELECT `quote`, `client`, `company`, `mgr_initial`, `sent_date`, `date_required` FROM `quotes` WHERE `date_required` IS NULL AND `sent_date` IS NULL AND  DATE(`enquiry_date`) BETWEEN '" . date("Y-01-01") . "' AND '" . $today . "' LIMIT 20 ") or die(mysqli_error());
                    while($row = mysqli_fetch_array($result_fri)) {
                        echo '<h3 draggable="true" class="box border rounded m-1 px-1 my-1">' . floatval($row['quote']) . ' - <b>' . $row['client'] . '</b> ' . $row['company'] . ' - ' . $row['mgr_initial'] . '</h3>';
                    }
                    ?>
                    <h2 class="position-absolute bottom-0 end-0 font-weight-bold float-right"></h2>
                </div>
            </div>
        </div>
<script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  var date = (ev.target.id).split('div_')[1];
  if(date==undefined || date=='' || date==null)
  {
    alert('Drop not allowed');
    return;
  }
  var h3 = document.getElementById(data);
  var newh3 = $(h3).attr('date_required',date);
  var idstr = $(h3).attr('id');
  var id = idstr.split('_');
  //console.log(id);
  ev.target.appendChild(h3);
  updateOrder({id : id[1],date_required:date});
}

 function updateOrder(aData) {
        $.ajax({
            url: 'ajaxUpdateData.php',
            type: 'POST',
            data: {
                allData: aData
            },
            success: function() {
                $(".container-fluid").load(location.href+" .container-fluid>*","");
                alert("Your change successfully saved");
            }
        });
    }
</script> 
        <script>
            // (function() {
            //     var dragged, listener;
 
            //     console.clear();
 
            //     dragged = null;
 
            //     listener = document.addEventListener;
 
            //     listener("dragstart", (event) => {
            //         console.log("start !");
            //         return dragged = event.target;
            //     });
 
            //     listener("dragend", (event) => {
            //         return console.log("end !");
            //     });
 
            //     listener("dragover", function(event) {
            //         return event.preventDefault();
            //     });
 
            //     listener("drop", (event) => {
            //         console.log("drop !");
            //         event.preventDefault();
            //         if (event.target.className === "dropzone") {
            //             dragged.parentNode.removeChild(dragged);
            //             return event.target.appendChild(dragged);
            //         }
            //     });
 
            // }).call(this);
        </script>
 
    </body>
</html>