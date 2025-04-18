<?php
include_once("config.php");

include_once("staffheader.php"); 
 error_reporting(0);
mysql_connect("localhost","root","")  or die(mysql_error());
mysql_select_db("event")  or die(mysql_error());
		$query = "select * from tab_user";
		$result = mysql_query($query) or die(mysql_error());
?>
<div    align="center">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<h2> Students Details </h2>
	<center >
	
		<table border="1" cellspacing="6" class="displaycontent" width="800" style="border:10px solid Green;" align="center">  
			 <tr> 
		          <td  bgcolor=Yellow><strong><font color="Red">First Name</font></strong></td>
          <td bgcolor=Yellow><strong><font color="Red">Last Name</font></strong></td>
          <td bgcolor=Yellow><strong><font color="Red">Email</font></strong></td>
          <td bgcolor=Yellow><strong><font color="Red">Address</font></strong></td>
          <td bgcolor=Yellow><strong><font color="Red">City</font></strong></td>
		        <td bgcolor=Yellow><strong><font color="Red">State</font></strong></td>
          <td bgcolor=Yellow><strong><font color="Red">Country</font></strong></td>
          <td bgcolor=Yellow><strong><font color="Red">mobile</font></strong></td>
          <td bgcolor=Yellow><strong><font color="Red">phone</font></strong></td>
		 

        
					        

        </tr>
		<?php
    while($row=mysql_fetch_array($result))
	{

?>
			 <tr> 
          <td style="color: #000000"><?php echo  $row['first_name']; ?></td>
          <td style="color: #000000"><?php echo $row['last_name']; ?></td>
          <td style="color: #000000"><?php echo $row['email_id']; ?></td>
		          
          <td style="color: #000000"><?php echo $row['address']; ?></td>
          <td style="color: #000000"><?php echo $row['city']; ?></td>
          <td style="color: #000000"><?php echo $row['state']; ?></td>
          <td style="color: #000000"><?php echo $row['country']; ?></td>
		            <td style="color: #000000"><?php echo $row['mobile']; ?></td>
					          <td style="color: #000000"><?php echo $row['phone']; ?></td>
							  					          
							  
							           
																
       

         
    
  </tr>

		<?php
		}	

?>	
</table>

<form action="Viewuser.php" name="Viewuser" class="row" method="post">
	
<?php
 
 
 
if(isset($_GET['send']))
{
	
	$query1 = "update tab_user set status='yes' where U_name='".$_GET['send']."'"; 		
	
	echo $query1;
   
	if(mysql_query($query1))
		{
		
        echo '<script> alert("Accepted ok");</script>';
	}
	 // echo '<script> alert("Notok");</script>';


	header("location:viewuser.php");
	exit;
 }
 if(isset($_GET['rej']))
{
	
	$query1 = "update tab_user set status='no' where U_name='".$_GET['rej']."'"; 		
	
	//echo $query1;
   
	if(mysql_query($query1))
		{
		
        echo '<script> alert("Rejected ok");</script>';
	}
	 // echo '<script> alert("Notok");</script>';


	header("location:viewuser.php");
	exit;
 }
 ?>
 

	<br>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
</form>
</div>	 
<?php include_once("footer.php")?>	
</div>	<!-- End row -->	
</div>

</div>






 