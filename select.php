<?php
include("connection.php");

$sql="select * from emp";
$result = mysqli_query($conn,$sql);


echo ' <tr>
	 <th>Sr.No</th>
	 <th>Name</th>
	 <th>Email</th>
	 <th>Password</th>
	 <th>Images</th>
	 <th>Edit</th>
	 <th>Delete</th>
	 </tr>';

$i=1;
while($data=mysqli_fetch_array($result))
{
	 echo '
	
	 <tr>
	 <td>'.$i.'</td>
	  <td>'.$data['emp_name'].'</td>
        <td>'.$data['emp_email'].'</td>
        <td>'.$data['emp_pass'].'</td>'?>
		<td><img src="./images/<?php echo $data['images'];?>" width="80" height="80"></td>                              
		<?php
		echo '<td><a href="edit.php?edit_id='.$data['id'].'"><button class="btn btn-success">Edit</button></a></td>
		<td><a href="index.php?del_id='.$data['id'].'" ><button class="btn btn-danger">Delete</button></a></td>
      </tr>';	  
	  $i++;
}
?>