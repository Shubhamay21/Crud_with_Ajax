<?php
include("connection.php");
if(isset($_GET['del_id']))
{
	$id=$_GET['del_id'];
	
	$sql="delete from emp where id='".$id."'";
	$result=mysqli_query($conn,$sql);
	
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Select Data Using AJAX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container py-5">
<div class="row">
<div class="col-lg-12">
<h1 class="text-center">CRUD Using AJAX</h1>
<button type="button" style="position:inherit;left: 90%;" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
  Add Info
</button>
<!-- <p class="text-right"><a href="add.php" class="btn btn-primary">Add</a></p> -->
<table class="table table-bordered table-striped" id="content">
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Enter Your Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container py-2">
            <form method="POST" enctype="multipart/form-data" id="myform">
       <h2></h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="nameid">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control" id="emailid">
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="text" name="pass" class="form-control" id="passid"></textarea>
              </div>
              <div class="form-group">
                <label for="file">Images:</label>
                <input type="file" name="file" class="form-control" id="fileid"></textarea>
              </div>   
            
          </div>
        </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" name="submit" id="save" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</table>

<script>
  $(document).ready(function(){
  $.ajax({
  url:"select.php",
  success:function(dataabc){
      //console.log(dataabc);
    $("#content").html(dataabc);		
  }});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$('#myform').on("submit",function() {
var fd = new FormData(this);
$.ajax({
  url:"insert.php",
  method:"POST",
  data:fd,
  dataType:"JSON",
  contentType:false,
  cache:false,
  processData:false,
  success:function(data){
  window.location.href="index.php";
  }
});
});
});
</script>
<!-- <script>
// $('#myform').on("submit",function() {

$(document).ready(function(){

$('#save').click(function () {

$name = $('#nameid').val();
$email = $("#emailid").val();
$password = $('#passid').val();
  $.ajax({
  url:"insert.php",
  method:"POST",
  dataType:"JSON",
  data:{nm:$name,em:$email,pwd:$password},
  success:function(dataabc){
    window.location.href="index.php";
  },
   });
  });
});
// });
</script> -->
</body>
</html>

