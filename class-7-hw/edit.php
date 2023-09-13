<?php
// session start here
session_start();
include "./database/env.php";
$id = $_REQUEST['id'];
$query =  "SELECT * FROM posts WHERE id ='$id'";
$response = mysqli_query($connect, $query);
$post = mysqli_fetch_assoc($response);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <!-- navbar starts here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="./index.php">Post system</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
        </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./allpost.php">All Post</a>
        </li>
          
      
          </ul>


       
 
    </div>
  </div>
</nav>

<!-- pos system start here -->
<div class="card col-lg-4 mx-auto mt-10">
        <div class="card-header">
            Add post
        </div>    
 <div class="card-body">

 <!-- form starts here  -->

    <form action="./controller/update.php" method="post">
        <input type="hidden" name="id"   value="<?=   $post['id'] ?>">
        <input name="title"
       value="<?=   $post['title'] ?>"
        type="text" class="form-control my-3" placeholder="Enter Your title">
        <?php
        if(isset($_SESSION['form_error']['title_error'])){
            
            ?>
           <span class="text-danger"><?php echo $_SESSION['form_error']['title_error'] ?></span>
            <?php
        }
         ?>

        <textarea name="detail" class="form-control my-3"  placeholder="Enter Your detail" ><?=  $post['detail']?></textarea>
        <?php
        if(isset($_SESSION['form_error']['detail_error'])){
            ?>
            <span class="text-danger"> <?php echo $_SESSION['form_error']['detail_error'] ?></span>
            <?php
        }
        ?>
        
        <input value="<?=   $post['name']?>" name="name"  type="text" class="form-control my-3" placeholder="Enter Your name">

        <?php
        if(isset($_SESSION['form_error']['name_error'])){
            ?>
            <span class="text-danger"><?php echo $_SESSION['form_error']['name_error'] ?></span>
            <?php
        }
        ?>

       <br>
        <button class="btn btn-warning">update your post</button>
    </form>
 </div>
    
</div>


<div class="toast <?= isset($_SESSION['msg']) ? "show"  : "" ?>"  style= "position: absolute; bottom: 50px; right:50px;" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    
    <strong class="me-auto">Post system</strong>
    <small>1 sec ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
  <?= isset($_SESSION['msg']) ? "show"  : "Your post has been updated" ?>
  </div>
</div>
</body>
</html>

<!-- session delete -->
<?php
session_unset();
?>