<?php
 include_once("config.php");
 
	$query = "select * from staff";
	
	$result = mysql_query($query) or die(mysql_error());
	
	while($row = mysql_fetch_assoc($result))
		{
			$cname[] = $row;
		}
	if(isset($_GET['edit']))
		{
			$id = $_GET['edit'];
		}
	else
		{
			$id = '';
		}
	$i=1;
 include_once("adminheader.php");

?>	


	<?php

mysql_connect("localhost","root","")  or die(mysql_error());
mysql_select_db("event")  or die(mysql_error());
if(isset($_POST['up_name']))
	{
	$query = "UPDATE `staff` set name='".$_POST['up_name']."',uname='".$_POST['up_uname']."',password='".$_POST['up_password']."',department='".$_POST['up_department']."',email='".$_POST['up_email']."',mobile='".$_POST['up_mobile']."' where id=".$_GET['edit']."";
	if(mysql_query($query))
		{
		$_SESSION['message']='<span class="succuess">Record updated succussfully</span>';
		header('location:addstaff.php');
		}
	
	else
		{
		$_SESSION['message']='<span class="fail">Record Not Updated</span>';
		}
	header("location:addstaff.php");
	exit;
	}



//fot status
if(isset($_GET['stat']))
	{
//	echo '<script>alert("hi");</script>';
	//echo 'hhhhhi';
	$query = "UPDATE `staff` set status=if(status='Active','InActive','Active') where id=".$_GET['stat']."";
	echo $query;
	if(mysql_query($query))
		{
		$_SESSION['message']='<span class="succuess">Record updated succussfully</span>';
		header('location:addstaff.php');
		}
	
	else
		{
		$_SESSION['message']='<span class="fail">Record Not Updated</span>';
		}
	header("location:addstaff.php");
	exit;
	}


// for insert 
	if(isset($_POST['submit']))
	{
		

	$query = "insert into `staff` values (null,'".$_POST['name']."','".$_POST['uname']."','".$_POST['password']."','".$_POST['department']."','".$_POST['email']."','".$_POST['mobile']."','Active')";
			//echo $query;
	if(mysql_query($query))
		{
		$_SESSION['message']='<span class="succuess">Record Inserted succussfully</span>';
	header('location:addstaff.php');
		}
	
	else
		{
		$_SESSION['message']='<span class="fail">Record Not Updated</span>';
		}
//header("location:addstaff.php");
	exit;
	}


	?>
<?php
mysql_connect("localhost","root","")  or die(mysql_error());
mysql_select_db("event")  or die(mysql_error());
if(isset($_GET['delete']))
	{
	
	$query = "delete from staff where id=".$_GET['delete']."";
	mysql_query($query);
		echo '<script>alert("Deleted");</script>';
	//	$_SESSION['message']='<span class="succuess">Record Delete succussfully</span>';
		
header("location:addstaff.php");
	exit;
	}
 
	
?>


<style>
table.tab tr td,table.tab tr th{
	padding:5px;
	border:1px solid #000;
}
</style>
		</br>
				</br>
						</br>
								</br>	

			<form action="" name="passwordform"  method="post" enctype="multipart/form-data">
			<div align="center">
						
						</br>
						<img src="staff.jpeg"  width="500" height="200">
				<h3 align="center" style="color: #000000" >Staff Details</h3>
				<table width="450" border="2" cellpadding="2" cellspacing="2" class="displaycontent" style="border:10px solid lightblue;" align="center" >
			<tr>
					<td style="color: #000000"> Staff Name </td>
					<td>
										<div id="department" class="col-md-12">
					<input type="text" name="name" placeholder="Staff Name" style="color: #000000"> </div> </td></tr>


		
		<tr > 
					<tr>
					<td style="color: #000000"> Username </td>
					<td>
										<div id="department" class="col-md-12">
					<input type="text" name="uname" placeholder="User Name" style="color: #000000"> </div> </td></tr>


		
		<tr > 
					<tr>
					<td style="color: #000000"> Password</td>
					<td>
										<div id="department" class="col-md-12">
					<input type="text" name="password" placeholder="Password" style="color: #000000"> </div> </td></tr>


		
		<tr > 
					<tr>
					<td style="color: #000000"> Department</td>
					<td>
										<div id="department" class="col-md-12">
					<input type="text" name="department" placeholder="Department" style="color: #000000"> </div> </td></tr>


			<tr > 
					<tr>
					<td style="color: #000000"> Email</td>
					<td>
										<div id="department" class="col-md-12">
					<input type="text" name="email" placeholder="email" style="color: #000000"> </div> </td></tr>
						<tr > 
					<tr>
					<td style="color: #000000"> Mobile</td>
					<td>
										<div id="department" class="col-md-12">
					<input type="text" name="mobile" placeholder="mobile" style="color: #000000"> </div> </td></tr>

<tr> <td>
				</br>	
				<input type="submit" name="submit" value="Add" id="submit" style="color: #000000" />
 </td><tr>
					
<div align="center">
	<center >
	<table width="900" border="2" cellpadding="2" cellspacing="2" class="displaycontent" style="border:10px solid lightblue;" align="center" >
	<tr>
	    <th bgcolor=lightblue><font color=white size=2>Sno</font></th>
		<th bgcolor=lightblue><font color=white size=2>Staff Name</font></th>
		<th bgcolor=lightblue><font color=white size=2>User Name</font></td>
		<th bgcolor=lightblue><font color=white size=2>Password</font></td>
				<th bgcolor=lightblue><font color=white size=2>Department</font></td>
								<th bgcolor=lightblue><font color=white size=2>email</font></td>
																<th bgcolor=lightblue><font color=white size=2>mobile</font></td>
		<th bgcolor=lightblue><font color=white size=2>Status</font></td>
		<th bgcolor=lightblue><font color=white size=2>Edit</font></th>
		<th bgcolor=lightblue><font color=white size=2>Delete</font></th>
	</tr>
	<?php
  	  if(count($cname)>0){
	  foreach($cname as $cat){
		if($id == $cat['id']){
	  ?>
	<tr>
		
		<td><?php echo $i++; ?></td>
		<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['name'];?>" name="up_name" class="required" /></font></td>	
		<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['uname'];?>" name="up_uname" class="required" /></font></td>
				<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['password'];?>" name="up_password" class="required" /></font></td>
				<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['department'];?>" name="up_department" class="required" /></font></td>
		<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['email'];?>" name="up_email" class="required" /></font></td>
				<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['mobile'];?>" name="up_mobile" class="required" /></font></td>
		<td bgcolor=white><font color=#000000 size=2><a href="?stat=<?php echo $cat['id'];?>"><?php echo $cat['status']; ?></a></font></td>		
		<td><font color=#000000 size=2><input type="hidden" value="<?php echo $id; ?>"  name="id"/>
		<input type="submit" value="update" /></font></td>
		<td><font color=#000000 size=2><input type="button" value="cancel" onClick="window.location.href='addstaff.php';"/></font></td>
		<td><input type="submit" value="delete" name="delete"/></td>
	</tr>
	<?php }else{	?>
	<tr>
		<td bgcolor=white><font color=#000000 size=2><?php echo $i++; ?></font></td>	
		<td bgcolor=white><font color=#000000 size=2><?php echo $cat['name']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $cat['uname']; ?></font></td>		
		<td bgcolor=white><font color=#000000 size=2><?php echo $cat['password']; ?></font></td>	
				<td bgcolor=white><font color=#000000 size=2><?php echo $cat['department']; ?></font></td>	
								<td bgcolor=white><font color=#000000 size=2><?php echo $cat['email']; ?></font></td>	
																<td bgcolor=white><font color=#000000 size=2><?php echo $cat['mobile']; ?></font></td>	
		<td bgcolor=white><font color=#000000 size=2><a href="?stat=<?php echo $cat['id'];?>"><?php echo $cat['status']; ?></a></font></td>	
		<td bgcolor=white><font color=#000000 size=2><a href="?edit=<?php echo $cat['id'];?>">Edit</a></font></td>
		<td bgcolor=white><font color=#000000 size=2><a href="?delete=<?php echo $cat['id'];?>">Delete</a></font></td>
       
	</tr>
	<?php } }} ?>
	
  </table>
</div>	   <!-- End container -->		
				</form>

		</br>		</br>		</br>	
<?php			
	include_once("footer.php");
?>
