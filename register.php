<?php
 include_once("config/config.php");  
 if(isset($_POST['register'])){

	 if($_POST['first_name']=='' || $_POST['last_name']=='' || $_POST['email_id']=='' ||  $_POST['password']=='' || $_POST['address']=='' || $_POST['city']=='')
	 {
		 echo '<script> alert("Please fill the details");</script>';
	 }
	 else
	 {
	$query = "INSERT INTO `tab_user` (`first_name`, `last_name`, `email_id`, `password`, `address`, `city`, `state`, `country`, `mobile`, `phone`, `status`)"; 		$query .= " VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['email_id']."', '".$_POST['password']."', '";
	$query .=  $_POST['address']."', '".$_POST['city']."', '".$_POST['state']."', '".$_POST['country']."', '";
	$query .= $_POST['mobile']."', '".$_POST['phone']."', '0')";
//	echo $query;exit;
	if(mysql_query($query)){
		echo '<script> alert("Registerd successfully");</script>';
	}
	else{
		$_SESSION['message']='<span class="fail">Some errors occurs</span>';
	}
	 }
 }



 include("header.php"); 

?>
<script type="text/javascript">	
  $(document).ready(function(){
    $("#register_form").validate();
  });
</script>
<div id="right_navi" align="center">
	<br />
	<form action="" name="register_form"  id="register_form"  method="post">
	<img src="images.jpeg"></img>
	<table border="0" cellspacing="4" cellpadding="4"  class="displaycontent"  width="500">

	<tr>
		<th colspan="2">Register</th>
	<tr>
	<tr>
		<td class="col">First Name:</td>
		<td><input type="text" name="first_name" class="required" value="" /></td>
	</tr>

	<tr>
		<td class="col">Last Name:</td>
		<td><input type="text" name="last_name" value="" class="required" /></td>
	</tr>
	<tr>
		<td class="col">Email:</td>
		<td><input type="text" name="email_id" value="" class="required email"  /></td>
	</tr>
	<tr>
		<td class="col">Password:</td>
		<td><input type="password" name="password" value="" class="required" /></td>
	</tr>
	<tr>
		<td class="col">Retype Password:</td>
		<td><input type="password" name="repassword" value="" class="required" /></td>
	</tr>
	<tr>
		<td class="col">Address:</td>
		<td><input type="text" name="address" value="" class="required"  /></td>
	</tr>
	<tr>
		<td class="col">City</td>
		<td><input type="text" name="city" value="" class="required" /></td>
	</tr>
	<tr>
		<td class="col"  >state :</td>
		<td><input type="text" class="required" name="state" value="" /></td>
	</tr>
	<tr>
		<td class="col"  >Country:</td>
		<td><input type="text" class="required" name="country" value="" /></td>
	</tr>
	<tr>
		<td class="col"  >Mobile:</td>
		<td><input type="text" class="required" onkeypress="return numbers(event);" name="mobile" value="" /></td>
	</tr>
	<tr>
		<td class="col">Phone:</td>
		<td><input type="text" class="required" onkeypress="return numbers(event);" name="phone" value="" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td >
			<input type="submit" name="register" value="Register" />
		     	<input type="Reset"  value="Reset" />
		</td>
	</tr>
	</table>
	</form>

</div>
</div>
<?php include("footer.php");?>
