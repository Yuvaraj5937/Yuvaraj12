<?php
 include_once("config/config.php");  
 if(isset($_POST['login'])){
	 $query ="select * from  tab_user where email_id='".$_POST['email_id']."'  and	password ='".$_POST['password']."'";
	$result = mysql_query($query);
echo $query;
	if(mysql_num_rows($result)){
		$row = mysql_fetch_assoc($result);
		
			$_SESSION['login_user'] = $row['email_id'];
          
			

		
			echo '<script> alert("Login success"); window.location.href = "userhome.php" </script>';
		
	
 }
 else

	 {
echo '<script> alert("Login failed");</script>';
	 }
 }



 include("header.php"); 

?>
<script type="text/javascript">	
  $(document).ready(function(){
    $("#login_form").validate();
  });
</script>
<div align="center">
	<form action="" name="login_form" id="login_form"  method="post">
	<br />
	<img src="stdLogin.png"></img>
	<table border="0"  class="displaycontent" >
	
	<tr>
		<th colspan="2">User Login</th>
	<tr>
	<tr>
		<td class="col">Email Id:</td>
		<td><input type="text" name="email_id" value="" class="required"/></td>
	</tr>
	<tr>
		<td  class="col">Password:</td>
		<td><input type="password" name="password" value="" class="required"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td >
			<input type="submit" name="login" value="Login" />
		     	<input type="Reset"  value="Reset" />
			
		</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr>
		<td><a href="register.php">Create New Account</a></td>
	
	</tr>
	</table>
	</form>

</div>
</div>
<?php include("footer.php")?>
