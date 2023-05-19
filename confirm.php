<?php
  include 'dbcon.php';

$form_fname= $_GET['form_fname'];
$form_lname= $_GET['form_lname'];
$form_bi= $_GET['form_batchid'];
// $_POST

$sql2 = "INSERT INTO `student_tbl` (`fname`, `lname`, `batch_id`) VALUES ('$form_fname', '$form_lname', '$form_bi')";

mysqli_query($con, $sql2);

header("location: index.php" );
?>