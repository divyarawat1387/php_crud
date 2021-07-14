<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<?php
    if(isset($_SESSION['email']) && !empty($_SESSION['password'])) {
    ?>
    Welcome <?php echo $_SESSION["email"]; ?>. 
    <?php
    }
    else 
    header("location:login.php");
?>
    <a href="logout.php" class="btn btn-primary" style="float: right; margin-top:50px; margin:20px;">Logout</a>
	<a href="article.php" class="btn btn-primary" style="float: right; margin-top:50px; margin:20px;">Add Article</a>

<div class="container" style="padding-top: 150px;">
<table class="table table-striped" id="table_id">	
  <thead>
    <tr>
      <th scope="col">Sr no.</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
      <td>
      </td>
    </tr>
  </tbody>
</table>
</div>

</body>
</html>