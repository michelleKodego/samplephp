<?php
  include 'dbcon.php';


$form_id = $_GET['dform_id'];


$sql2 = "DELETE  FROM `student_tbl` WHERE `student_id` = '$form_id'";


mysqli_query($con, $sql2);

header("location: index.php" );
?>