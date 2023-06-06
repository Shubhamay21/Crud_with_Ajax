<?php 

include_once('connection.php');

$id = $_GET['edit_id'];
$sql = "select * from emp where id='".$id."'";
$result = mysqli_query($conn,$sql);

$data=mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Using AJAX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-align mt-5">Edit Data</h2>
    <form id="myform"  method="POST" enctype="multipart/form-data" action="" >
    <div lass="form-group">
	<input type="hidden" name="postid" id="postid" value="<?php echo $_GET['edit_id'];?>">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" id="nameid" value="<?php echo $data['emp_name'];?>" >
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
   
      <input type="text" class="form-control" name="email" id="emailid" value="<?php echo $data['emp_email'];?>" >
    </div>
	   <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" name="pass" id="passid" value="<?php echo $data['emp_pass'];?>" >
    </div>
    <div class="form-group">
      <label for="image">Images:</label>
      <div><img src="images/<?php echo $data['images'];?>" height="100" width="100" >
        <span> <?php echo $data['images'];?> </span>
      </div><br/>
      <div>
        <input type="file" name="file" class="form-control" id="imgid">
      </div>
    </div>
	  <button type="submit" name="submit" id="save" class="btn btn-primary">Submit</button>
  </form>
</div>



<script type="text/javascript">
$(document).ready(function(){
$('#myform').on("submit",function() {
var fd = new FormData(this);
$.ajax({
  url:"update.php",
  method:"POST",
  data:fd,
  dataType:"JSON",
  contentType:false,
  cache:false,
  processData:false,
});
$.ajax({success:function(data){
  window.location.href="index.php";
}});
});

});
</script>
<!-- <script>
$('#save').click(function () {
$id=$("#postid").val();
//alert($id);
$name = $('#nameid').val();
$email = $("#emailid").val();
$pwd = $("#passid").val();
$.ajax({
  url:"update.php",
  method:"POST",
  data:{postid:$id,name:$name,email:$email,pass:$pwd},
  success:function(dataabc){
  window.location.href="index.php";
}});

});
</script> -->
</body>
</html>
