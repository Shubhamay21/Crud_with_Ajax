<?php
include("connection.php");

$name= $_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$filename = $_FILES['file']['name'];
$tempname = $_FILES["file"]["tmp_name"];  
$folder = "./images/".$filename;
    
$output ="";
$sql ="INSERT into emp(emp_name,emp_email,emp_pass,images) values('".$name."','".$email."','".$pass."','".$filename."')";
$result=mysqli_query($conn,$sql);
if($result)
{
    move_uploaded_file($tempname,$folder);
    $msg="upload done";
}else{
$msg="invalid";
}
// $resp =array(
// 'output'=>$output
// );
// echo json_decode($resp);
?>