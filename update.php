<?php
include("connection.php");

$id = $_POST['postid'];
$nm= $_POST['name'];
$em=$_POST['email'];
$pwd=$_POST['pass'];
$filename = $_FILES['file']['name'];
$tempname = $_FILES["file"]["tmp_name"];  
$folder = "./images/".$filename;

//echo $id;
$sql ="UPDATE emp SET emp_name='".$nm."',emp_email='".$em."',emp_pass='".$pwd."',images='".$filename."' where id='".$id."'";
mysqli_query($conn,$sql);
if($result)
{
    move_uploaded_file($tempname,$folder);
    $msg="upload done";
}else{
$msg="invalid";
}

?>