<link href="jsDatePick_ltr.min.css" type="text/css" rel="stylesheet"  />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>



<?php
include('userheader.php');
error_reporting(0);
 include_once("config.php");
?>

<?php

mysql_connect("localhost","root","")  or die(mysql_error());
mysql_select_db("event")  or die(mysql_error());
if(isset($_GET['delete']))
	{
	
	$query = "delete from busstatus where id='".$_GET['delete']."'";
	mysql_query($query);
		echo '<script>alert("Deleted");</script>';
	//	$_SESSION['message']='<span class="succuess">Record Delete succussfully</span>';
		
header("location:DriverStatus.php");
	exit;
	}
 
	 
?>
<div align="center">

<script type="text/javascript">	
  $(document).ready(function(){
    $("#Allocatetomanager").validate();
  });
</script>
<div class="content">
    <div class="content_resize">

    
<form action="eventsubsribe.php" name="eventsubscribe"  id="eventsubscribe"  method="post">
<br>
<div align="center">
<h2> Events Calender </h2>
<br>
	<center >
	<table border="2" cellspacing="6" class="displaycontent" width="800" height="120" style="border:10px solid #800000;" align="center">
	<tr>
	    
			<th bgcolor=Black><font color=white size=2>Id </font></th>
			<th bgcolor=Black><font color=white size=2>Name</font></th>
			<th bgcolor=Black><font color=white size=2>Category</font></th>
			<th bgcolor=Black><font color=white size=2>Event Date</font></td>
						<th bgcolor=Black><font color=white size=2>Event Time</font></td>
				
				<th bgcolor=Black><font color=white size=2>Select</font></td>
  
         
	</tr>
	
	<?php
	mysql_connect("localhost","root","")  or die(mysql_error());
mysql_select_db("event")  or die(mysql_error());
	$query = "select * from event";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_assoc($result))
		{
 ?>
	<tr>
		
       
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['id']; ?></font></td>
	
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['name']; ?></font></td>
 		<td bgcolor=white><font color=#000000 size=2><?php echo $row['category']; ?></font></td>
        <td bgcolor=white><font color=#000000 size=2><?php echo $row['edate']; ?></font></td>
		        <td bgcolor=white><font color=#000000 size=2><?php echo $row['eventtime']; ?></font></td>
   <td bgcolor=pink><font color=#000000 size=2><a href="eventupdate.php?select=<?php echo $row['id'];?>">Select</a></font></td>
		
        
	</tr>
	<?php }  ?>
	
	</table>
	
	

<?php
include('footer.php');
?>
 

