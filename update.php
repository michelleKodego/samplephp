<?php
  include 'dbcon.php';

$form_fname= $_GET['form_fname'];
$form_lname= $_GET['form_lname'];
$form_bi= $_GET['form_batchid'];
$form_id = $_GET['form_id'];
// $_POST

$sql2 = "UPDATE `student_tbl` INNER JOIN `batch_tbl` ON `student_tbl`.`batch_id` = `batch_tbl`.`batch_id`
 SET `student_tbl`.`fname`='$form_fname',`student_tbl`.`lname`='$form_lname',`batch_tbl`.`batch_id`='$form_bi' WHERE `student_tbl`.`student_id` = '$form_id'";

mysqli_query($con, $sql2);

header("location: index.php" );
?>