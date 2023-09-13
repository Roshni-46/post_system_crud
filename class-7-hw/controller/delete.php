<?php
session_start();
include "../database/env.php";
$id = $_REQUEST['id'];
$query = " DELETE FROM posts WHERE id ='$id'";
$response = mysqli_query($connect, $query);
if($response){
    $_SESSION['msg'] = "Your post has been deleted";
    header("location: ../index.php");
   }