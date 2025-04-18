<?php
include_once("config.php");

include_once("staffheader.php"); 
 error_reporting(0);
mysql_connect("localhost","root","")  or die(mysql_error());
mysql_select_db("event")  or die(mysql_error());
		$query = "select * from event";
		$result = mysql_query($query) or die(mysql_error());
?>
<div    align="center">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<h2> Events Details </h2>
	<center >
	
		<table border="1" cellspacing="6" class="displaycontent" width="800" style="border:10px solid Green;" align="center">  
			 <tr> 
		          <td  bgcolor=Yellow><strong><font color="Red">Event Name</font></strong></td>
          <td bgcolor=Yellow><strong><font color="Red">Category</font></strong></td>
          <td bgcolor=Yellow><strong><font color="Red">Event date</font></strong></td>
          <td bgcolor=Yellow><strong><font color="Red">Event Time</font></strong></td>
          <td bgcolor=Yellow><strong><font color="Red">Venue</font></strong></td>
		        <td bgcolor=Yellow><strong><font color="Red">Staff</font></strong></td>

		 

        
					        

        </tr>
		<?php
    while($row=mysql_fetch_array($result))
	{

?>
			 <tr> 
          <td style="color: #000000"><?php echo  $row['name']; ?></td>
          <td style="color: #000000"><?php echo $row['category']; ?></td>
          <td style="color: #000000"><?php echo $row['edate']; ?></td>
		          
          <td style="color: #000000"><?php echo $row['eventtime']; ?></td>
          <td style="color: #000000"><?php echo $row['venue']; ?></td>
          <td style="color: #000000"><?php echo $row['staff']; ?></td>

							  					          
							  
							           
																
       

         
    
  </tr>

		<?php
		}	

?>	
</table>

<form action="viewevents.php" name="Viewuser" class="row" method="post">
	
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






 