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
<div class="card col-lg-4 mx-auto mt-4">
        <div class="card-header">
           <h3><?=ucfirst($post['title']) ?> </h3>
        </div>    
 <div class="card-body">

<p><?= $post['detail'] ?></p>

   
 </div>
 <div class="card-footer">
    <h5>author name :<?= $post['name']?></h5>
 </div>
    
</div>


</body>
</html>

<!-- session delete -->
<?php
session_unset();
?>