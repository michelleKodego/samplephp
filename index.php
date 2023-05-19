<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
</head>
<body class='container'>
  <?php  include 'nav.php'; ?>
  <div class='row'>
    <div class='col-9'>
    <h1>Student Database</h1>
    </div>
    <div class='col-3'>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Data
      </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="confirm.php" method="get">
            First Name:
            <input type='text' class='form-control' name='form_fname'><br>
            Last Name:
            <input type='text' class='form-control' name='form_lname'><br>
            Batch ID:
            <input type='text' class='form-control' name='form_batchid'><br>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Data</button>
          </div>
        </form>
          </div>
          
        </div>
      </div>
    </div>
    <div >
    </div>
  </div>
   
    
  
   <table class="table table-bordered">
        <thead>
            <th>ID No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Batch Name</th>
            <th>Class Size</th>
            <th>Actions</th>
        </thead>
  

                    
                
    <?php
        include 'dbcon.php';
      
        //localhost/foldername/filename.php
        // echo "<h1 style='background-color: yellow;'>Hello PHP!</h1>";

        // include 'second.php';
        
        // //variable
        // $a = "hi!" . "<br/>";
        // echo $a;
        
        $sql = "SELECT * FROM `student_tbl` INNER JOIN `batch_tbl` ON `student_tbl`.`batch_id` = `batch_tbl`.`batch_id`";

       

       


        $result = mysqli_query($con,$sql);

        if($result -> num_rows > 0){
            //assoc key : col name -value per row per col
            while($row = mysqli_fetch_assoc($result)){
                //  echo "Firstname: " .  $row['fname'] . "<br>";
                //  echo "Lastname: " .  $row['lname'] . "<br>";
                //  echo "Batch ID: " .  $row['batch_id'] . "<br>";
                //  echo "Batch Name: " . $row['batchname'] . "<br>";
                //  echo "classSize: " . $row['classSize'] . "<br>";
                //  echo "-------" . "<br>";

                echo "
                <tr>
                        <td>" .  $row['student_id'] . "</td>
                        <td>" .  $row['fname'] . "</td>
                        <td>" .  $row['lname'] . "</td>
                        <td>" .  $row['batchname'] . "</td>
                        <td>" .  $row['classSize'] . "</td>
                        <td> <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#" . $row['student_id'] . "'>
                            View Data
                            </button> 
                            <div class='modal fade' id='" . $row['student_id'] . "' tabindex='-1' aria-labelledby='" . $row['student_id'] . "Label' aria-hidden='true'>
                            <div class='modal-dialog'>
                              <div class='modal-content'>
                                <div class='modal-header'>
                                  <h5 class='modal-title' id='" . $row['student_id'] . "Label'>Modal title</h5>
                                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                      <form action='update.php' method='get'>
                                          <input type='hidden' class='form-control' name='form_id' value = '" . $row['student_id'] . "'><br>
                                          First Name:
                                          <input type='text' class='form-control' name='form_fname' value = '" . $row['fname'] . "'><br>
                                          Last Name:
                                          <input type='text' class='form-control' name='form_lname' value = '" . $row['lname'] . "'><br>
                                          Batch ID:
                                          <input type='text' class='form-control' name='form_batchid' value = '" . $row['batch_id'] . "'><br>
                                        <div class='modal-footer'>
                                          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                          <button type='submit' class='btn btn-primary'>Confirm Update</button>
                                        </div>
                                      </form>
                                      
                                </div>
                               
                              </div>
                            </div>
                          </div>
                      

                         
                        
                        <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#d" . $row['student_id'] . "'>
                        Delete Data
                        </button> 
                        <div class='modal fade' id='d" . $row['student_id'] . "' tabindex='-1' aria-labelledby='d" . $row['student_id'] . "Label' aria-hidden='true'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='d" . $row['student_id'] . "Label'>Warning:</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                  <form action='delete.php' method='get'>
                                      <input type='hidden' class='form-control' name='dform_id' value = '" . $row['student_id'] . "' readonly><br>
                                      First Name:
                                      <input type='text' class='form-control' name='dform_fname' value = '" . $row['fname'] . "' readonly><br>
                                      Last Name:
                                      <input type='text' class='form-control' name='dform_lname' value = '" . $row['lname'] . "' readonly><br>
                                      Batch ID:
                                      <input type='text' class='form-control' name='dform_batchid' value = '" . $row['batch_id'] . "' readonly><br>
                                    <div class='modal-footer'>
                                      <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                      <button type='submit' class='btn btn-danger'>Confirm Delete</button>
                                    </div>
                                  </form>
                                  
                            </div>
                           
                          </div>
                        </div>
                      </div>
                        </td>
                     
                        
                </tr>
                ";
            }
            
        }else{
            echo "no results found";
        }
   ?>


</table>


</body>
</html>

