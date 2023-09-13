<?php
// session start
session_start();
include "../database/env.php";

$title= $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$name = $_REQUEST['name'];
$errors = [];

if(empty($title)){
$errors['title_error'] = "Fill-up";
}else if(strlen($title) > 15){
    $errors['title_error'] = "Name is too long";
}

if(empty($detail)){
    $errors['detail_error'] = " please Enter your Email";
}
if(empty($name)){
    $errors['name_error'] = "Enter your detail";
}
if(count($errors) > 0){
    $_SESSION['old'] = $_REQUEST;
   
    $_SESSION['form_error'] = $errors;
header("location: ../index.php");
}

else {
  $query = " INSERT INTO posts( title, detail, name ) VALUES ('$title', '$detail', '$name')";
   $result =  mysqli_query($connect, $query);
   if($result){
    $_SESSION['msg'] = "Your post has been inserted";
    header("location: ../index.php");
   }
}