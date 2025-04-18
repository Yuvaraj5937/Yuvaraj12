<?php
 include_once("config.php");
 
include_once("userheader.php");

?>	


	<?php

mysql_connect("localhost","root","")  or die(mysql_error());
mysql_select_db("event")  or die(mysql_error());

	// $query = "select * from applyod";
	// 	$result = mysql_query($query) or die(mysql_error());


// for insert 
	
	if(isset($_POST['submit']))
	{
		

	$query = "insert into `feedback` values ('null','".$_POST['uname']."','".$_POST['Ename']."')";
			//echo $query;
	if(mysql_query($query))
		{
		$_SESSION['message']='<span class="succuess">Record Inserted succussfully</span>';
	//	header('location:Feeback.php');
		}
	
	else
		{
		$_SESSION['message']='<span class="fail">Record Not Updated</span>';
		}

	//exit;
	}


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
						
					
				<h3 align="center" style="color: #000000" >Queries</h3>
				<br>
				<table width="450" border="2" cellpadding="2" cellspacing="2" class="displaycontent" style="border:10px solid lightblue;" align="center" >
				<tr>
					<td style="color: #000000"> User Name </td>
					<td>
										<div id="eventtime" class="col-md-12">
					<input type="text" name="uname" placeholder="User Name" style="color: #000000"> </div> </td></tr>


		
		<tr > 
			<tr>
					<td style="color: #000000"> Queries</td>
					<td>
										<div id="eventtime" class="col-md-12">
					<input type="text" name="Ename" placeholder="queries" style="color: #000000"> </div> </td></tr>


		

<tr> <td>
				</br>	
				<input type="submit" name="submit" value="Add" id="submit" style="color: #000000" />
 </td><tr>
					
</table>
</div>	   <!-- End container -->		
				</form>

		</br>		</br>		</br>	<br><br>
<?php			
	include_once("footer.php");
?>
