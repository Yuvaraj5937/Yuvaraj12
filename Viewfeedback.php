<?php
 include_once("config.php");
 
include_once("adminheader.php");

?>	


	<?php

mysql_connect("localhost","root","")  or die(mysql_error());
mysql_select_db("event")  or die(mysql_error());

	$query = "select * from feedback";
		$result = mysql_query($query) or die(mysql_error());


// for insert 
	
	?>
<?php
mysql_connect("localhost","root","")  or die(mysql_error());
mysql_select_db("event")  or die(mysql_error());

 
	
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

			<form action="" name="edateform"  method="post" enctype="multipart/form-data">
		
					
<div align="center">
	<center >
		<table border="2" cellspacing="6" class="displaycontent" width="800" style="border:10px solid Green;" align="center">  
			<tr>
			<th bgcolor=Black><font color=white size=2>ID</font></th>
			<th bgcolor=Black><font color=white size=2>User Name</font></th>
			<th bgcolor=Black><font color=white size=2>Feedback</font></th>
			
		
			
		            
	</tr>
		<?php
    while($row=mysql_fetch_array($result))
	{

?>
			<tr>
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['id']; ?></font></td>	
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['Uname']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $row['Feedback']; ?></font></td>
	
		
 	</tr>
		<?php
		}	

?>	
</table>

</div>	   <!-- End container -->		
				</form>

		</br>		</br>		</br>	<br><br><br><br><br>
<?php			
	include_once("footer.php");
?>
