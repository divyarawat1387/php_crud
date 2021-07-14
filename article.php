<?php
    session_start();

    if(isset($_SESSION['email']) && !empty($_SESSION['password']) && !empty($_SESSION['user_id'])) {

    }
    else {
        header("location:login.php");
    }
    
    include 'config.php';

    $edit_id = $_SESSION['edit_id'];
    $getId = $_GET['edit_id'];

    if(isset($_GET['edit_id']))
    {
        if($edit_id != $getId)
        {
            header("location:dashboard.php");
        }
    }

    if(isset($_GET['edit_id']))
    {
        $article_id = $_GET['edit_id'];
        $sql = "SELECT * from article where id= $article_id";
        $result = $conn->query($sql); 
        $data = mysqli_fetch_assoc($result);
        // print_r($data); exit;

    }
    
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
<?php
    
?>
  <!-- Navigation-->
  <?php include 'header.php' ?>
  <div class="content-wrapper">
  <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card border-secondary">
                        <div class="card-header">
                            <h3 class="mb-0 my-2">
                            <?php if(isset($_GET['edit_id'])){?> Edit Article <?php } else{?> Add Article <?php } ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form class="form" method="post"  action="article_add.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <span class="text-danger">
                                    
                                    </span>
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php if(isset($_GET['edit_id'])){ echo $data['Name']; }?>">
                                </div>
                            
                                <div class="form-group">
                                    <label for="body">Title</label>
                                    <span class="text-danger">
                                    
                                    </span>
                                    <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?php if(isset($_GET['edit_id'])){ echo $data['title']; }?>">
                                </div>

                                <div class="form-group">
                                    <label for="Description">Description</label>
                                    <span class="text-danger">
                                    </span>
                                    <input type="text" class="form-control" id="description" placeholder="Description" name="description" value="<?php if(isset($_GET['edit_id'])){ echo $data['description']; }?>">
                                </div>
                                <div class="form-group">
                                    <label for="Description">Article Image</label>
                                    <span class="text-danger">
                                    </span>
                                    <input type="file" class="form-control" id="image_upload" name="image_upload">
                                </div>
                                <div>
                                    <?php if(isset($_GET['edit_id'])) { ?>
                                    <img src="article_images/<?php if(isset($_GET['edit_id'])){ echo $data['image']; }?>"  height="100" width="100">
                                    <?php } ?>
                                </div>

                                <p> 
                                    <input type="hidden" name="update_id" value="<?php if(isset($_GET['edit_id'])){ echo $data['id']; }?>">

                                    <input type="reset" value="Clear" name="reset" class="btn btn-success btn-lg float-right" style="margin:5px;">
                                    <?php if(isset($_GET['edit_id'])) { ?>
                                    <input type="submit" value="Update" name="submit" class="btn btn-success btn-lg float-right" style="margin:5px;">
                                    <?php } else { ?>
                                    <input type="submit" value="Add" name="submit" class="btn btn-success btn-lg float-right" style="margin:5px;">
                                    <?php } ?>

                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    

        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    
  </div>
</body>

</html>
<!-- partial -->
