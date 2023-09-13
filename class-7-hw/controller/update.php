<?php
session_start();
include "../database/env.php";
$id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$name = $_REQUEST['name'];
$errors = [];

if(empty($title)){
    $errors['title_error'] = "Fill-up";
}else if(strlen($title) > 15 ){
    $errors['title_error'] = "Name is too long";
}

if(empty($detail)){
    $errors['detail_error'] = " please Enter your Email";
}
if(empty($name)){
    $errors['name_error'] = "Enter your detail";
}

if(count($errors) > 0){
 
    $_SESSION['form_error'] = $errors;
    header("location: ../edit.php?id=$id");
}
else{
   $query = " UPDATE posts SET title='$title', detail='$detail', name='$name'  WHERE id ='$id'";

   $result =  mysqli_query($connect, $query);
   $_SESSION['msg'] = "Your post has been updated";
   header("location: ../allpost.php");



}