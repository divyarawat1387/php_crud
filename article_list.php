<?php
    session_start();
    if(isset($_SESSION['email']) && !empty($_SESSION['password'])) {

    }
    else 
    header("location:login.php");

    include 'config.php';
    
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * from article where user_id= $user_id";
    $result = $conn->query($sql);
    // $data = mysqli_fetch_array($result)
    // print_r($result); exit;

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> User Dashboard</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
  <link rel="stylesheet" href="css/stylesheet2.css">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
  <?php include 'header.php' ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Article List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Sr. no</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Article Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $i=1;
              foreach($result as $row) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['Name'] ?></td>
                  <td><?php echo $row['title'] ?></td>
                  <td><?php echo $row['description'] ?></td>
                  <td>
                    <img src="article_images/<?php echo $row['image']; ?>" alt="" height="50" width="50">
                  </td>
                  <td>
                  <!-- <a href="view_article.php?view_id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a> -->
                  <a href="article.php?edit_id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
      	          <a href="delete_article.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this? ');">Delete</a>
                  
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              
            </table>
          </div>
        </div>
        <!-- <?php if(empty($result))?> <span style="color:red; text-align:center">No Records</span>  -->
    </div>
    
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include 'footer.php'; ?>
    
  </div>
</body>

</html>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</body>
</html>
