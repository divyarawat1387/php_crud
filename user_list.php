<?php
    session_start();
    if(isset($_SESSION['email']) && !empty($_SESSION['password'])) {

    }
    else 
    header("location:login.php");

    include 'config.php';
    
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * from users";
    $result = $conn->query($sql);
    // $data = mysqli_fetch_array($result)
    // print_r($result); exit;

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> User Dashboard</title>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
  <link rel="stylesheet" href="css/stylesheet2.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <?php include 'header.php' ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>User List</div>
        <div class="card-body">
        <form action="import_csv.php" method="POST" name="import" enctype="multipart/form-data">
        <div class="form-group">
            <label class="" for="filebutton">Select File</label>
                <input type="file" name="file" id="file" class="input-large">                   
        </div>
        <div class="">
            <button type="submit" id="submit" name="import" class="btn btn-primary">Import</button>
        </div>
        </form>
        <hr>
          <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0" id="table_id">
              <thead>
                <tr>
                  <th>Sr. no</th>
                  <th>First Name</th>
                  <th>Last Nam</th>
                  <th>Mobile No</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $i=1;
              foreach($result as $row) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['first_name'] ?></td>
                  <td><?php echo $row['last_name'] ?></td>
                  <td><?php echo $row['mobile_no'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <form action="export_csv.php" method="post" enctype="multipart/form-data" name="export_excel">
                <div class="form-group">
                  <div class="col-md-4 col-md-offset-4">
                    <input type="submit" name="export" class="btn btn-success" value="export to excel">
                  </div>
                </div>
            </form>
          </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
  </div>
  
<script type="text/javascript">
	$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
</body>
</html>
