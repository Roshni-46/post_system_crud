<?php
// session start here
session_start();
include "./database/env.php";

$query =  "SELECT * FROM posts ";
$response = mysqli_query($connect, $query);
$posts = mysqli_fetch_all($response, 1);



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
<div class="card col-lg mx-auto mt-10">
        <div class="card-header">
           All post
        </div>    
 <div class="card-body">

<!-- table starts here -->
<table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">Detail</th>
      <th scope="col">Name</th>
      <th scope="col">option</th>
    </tr>
    <?php foreach($posts as $key=>$post){
        ?>
    
    <tr>
      <td scope="col"><?= ++$key ?></td>
      <td scope="col"><?=  $post['title'] ?></td>
      <td scope="col"><?= strlen($post['detail']) > 50 ? substr($post['detail'], 0 , 30) . "..." : $post['detail'] ?></td>
     <td><img  style="width :40px; height:40px; border-radius:50%;"src="https://api.dicebear.com/7.x/initials/svg?seed=<?= $post['name']?>&backgroundColor=c0aede" alt=""></td>  
      <td>
        <div class="btn-group">
          <a href="./show.php?id=<?= $post['id'] ?>" class="btn btn-success">Show</a>
          <a href="./edit.php?id=<?= $post['id'] ?>" class="btn btn-info">Edit</a>
          <a href="./controller/delete.php?id=<?= $post['id'] ?>" class="btn btn-danger">Delete</a>
        </div>
      </td>
    </tr>
  </thead>
  <?php
    }
    ?>
  
</table>
<!-- table ends here -->

<div class="toast <?= isset($_SESSION['msg']) ? "show"  : "" ?>"  style= "position: absolute; bottom: 50px; right:50px;" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    
    <strong class="me-auto">Post system</strong>
    <small>1 sec ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
  <?= isset($_SESSION['msg']) ? "show"  : "Your post has been inserted" ?>
  </div>
</div>
</body>
</html>

<!-- session delete -->
<?php
session_unset();
?>