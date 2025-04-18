<?php
 include_once("config.php");  
 if(isset($_POST['fogotpass'])){
	$query ="select * from  tab_user where email_id='".$_POST['email_id']."'  and status='0'";
	$result = mysql_query($query);
	if(mysql_num_rows($result)){
		$row = mysql_fetch_assoc($result);
		if($row['status']=='0'){
			include_once('phpmailer/class.smtp.php');
	include_once('phpmailer/class.pop3.php');
	include_once('email.class.inc.php');
	$html .= 'Hi sir,<br />';
	$html .= 'Want To Buy,<br />';	
	$html .= 'Mobile No:'.$row['password'].'<br />';
	$email = new Email();
	$email->set_from($configVars['my_email']);
	$email->set_from_name('Password Verfication');		
	$email->set_subject('Password Restore');
	$email->set_message(html_entity_decode($html.'<br /><br />'));

   


   

	
		
		$email->add_to($_POST['email_id'],$row['password']);
		//$email->add_to('karthibala252@gmail.com','karthi');
		
		
	
	$sent_flag = $email->send();
	
			$_SESSION['message']='<span class="succuess">Your password sent to Email id</span>';
			header('Location:forgotpass.php');
			exit;
		}
		else{
			$_SESSION['message']='<span class="fail">Your account Block by admin. contact Admin</span>';
		}
	}
	else{
		$_SESSION['message']='<span class="fail">Email id does not exist</span>';
	}
	header("location:forgotpass.php");
	exit;
 }



 include("header.php"); 


?>
<script type="text/javascript">	
  $(document).ready(function(){
    $("#forgotpass_form").validate();
  });
</script>
<div  align="center>
	<form action="" name="forgotpass_form" id="forgotpass_form"  method="post">
	<br />
	<table border="0"  class="displaycontent" >
	<caption><?php echo $_SESSION['message'];$_SESSION['message']=''; ?></caption>
	<tr>
		<th colspan="2">Forgot Password</th>
	<tr>
	<tr>
		<td class="col">Email:</td>
		<td><input type="text" name="email_id" value=""  style="width:250px;" class="required email"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td >
			<input type="submit" name="fogotpass" value="Get My Password" />
		     	<input type="reset"  value="Reset" />
			
		</td>
	</tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr>
		<td><a href="register.php">Create New Account</a></td>
		<td style="text-align:right;"><a href="login.php">Login</a></td>
	</tr>
	</table>
	</form>

</div>
</div>
<?php include("footer.php")?>
