<?php
session_start();
// include_once("config.php");
include_once('config/config.php');
include_once('phpmailer/class.smtp.php');
include_once('phpmailer/class.pop3.php');
include_once('email.class.inc.php');

$conn = mysqli_connect("localhost", "root", "", "event");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch all events
$query = "SELECT * FROM event";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

$cname = array();
while ($row = mysqli_fetch_assoc($result)) {
    $cname[] = $row;
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';

include_once("adminheader.php");

// Update event
if (isset($_POST['up_name'])) {
    $query = "UPDATE `event` SET 
        name = '" . $_POST['up_name'] . "', 
        category = '" . $_POST['up_category'] . "', 
        edate = '" . $_POST['up_edate'] . "', 
        eventtime = '" . $_POST['up_eventtime'] . "', 
        venue = '" . $_POST['up_venue'] . "', 
        staff = '" . $_POST['up_staff'] . "' 
        WHERE id = " . $_GET['edit'];

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = '<span class="success">Record updated successfully</span>';
    } else {
        $_SESSION['message'] = '<span class="fail">Record Not Updated</span>';
    }
    exit;
}

// Toggle event status
if (isset($_GET['stat'])) {
    $query = "UPDATE `event` SET status = IF(status='Active', 'Inactive', 'Active') WHERE id=" . $_GET['stat'];
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = '<span class="success">Record updated successfully</span>';
    } else {
        $_SESSION['message'] = '<span class="fail">Record Not Updated</span>';
    }
    header("location: addevent.php");
    exit;
}

// Insert new event
if (isset($_POST['submit'])) {
    $query = "INSERT INTO `event` (name, category, edate, eventtime, venue, staff, status) 
              VALUES (
                '" . $_POST['name'] . "',
                '" . $_POST['category'] . "',
                '" . $_POST['edate'] . "',
                '" . $_POST['eventtime'] . "',
                '" . $_POST['venue'] . "',
                '" . $_POST['staff'] . "',
                'Active')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = '<span class="success">Record Inserted successfully</span>';

        // Fetch all users to send email
        $user_query = "SELECT email_id FROM tab_user";
        $user_result = mysqli_query($conn, $user_query);

        // Initialize email class
        $email = new Email();
        $email->set_from("admin@example.com");
        $email->set_from_name("Event Registration Admin");
        $email->set_subject("New Event Alert");
        $email->set_message("Dear students, <br><br> A new event has been added to our website.<br>All students will visit our websites and get to know about the events details. <br> We encourage all our students to participate in these events. <br><br>Thank you! <br>");

        // Send email to each user
        while ($user = mysqli_fetch_assoc($user_result)) {
            $email->add_to($user['email_id']);
        }

        // Send email
        if ($email->send()) {
            echo "<script>alert('Email sent successfully!');</script>";
        } else {
			
            echo "<script>alert('Email failed to send!');</script>";
        }

        header('location: addevent.php');
    } else {
        $_SESSION['message'] = '<span class="fail">Record Not Inserted</span>';
    }
    exit;
}
?>



<?php
mysql_connect("localhost","root","")  or die(mysql_error());
mysql_select_db("event")  or die(mysql_error());
if(isset($_GET['delete']))
	{
	
	$query = "delete from event where id=".$_GET['delete']."";
	mysql_query($query);
		echo '<script>alert("Deleted");</script>';
	//	$_SESSION['message']='<span class="succuess">Record Delete succussfully</span>';
		
header("location:addevent.php");
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

			<form action="" name="edateform"  method="post" enctype="multipart/form-data">
			<div align="center">
						
						</br>
						<img src="event.jpg"  width="500" height="200">
				<h3 align="center" style="color: #000000" >Event Details</h3>
				<table width="450" border="2" cellpadding="2" cellspacing="2" class="displaycontent" style="border:10px solid lightblue;" align="center" >
			<tr>
					<td style="color: #000000"> Event Name </td>
					<td>
										<div id="eventtime" class="col-md-12">
					<input type="text" name="name" placeholder="Event Name" style="color: #000000"> </div> </td></tr>


		
		<tr > 
					<tr>
					<td style="color: #000000"> Category</td>
					<td>
										<div id="eventtime" class="col-md-12">
					<input type="text" name="category" placeholder="Category" style="color: #000000"> </div> </td></tr>


		
		<tr > 
					<tr>
					<td style="color: #000000"> Event Date</td>
					<td>
										<div id="eventtime" class="col-md-12">
					<input type="text" name="edate" placeholder="Event Date" style="color: #000000"> </div> </td></tr>


		
		<tr > 
					<tr>
					<td style="color: #000000">Event Timing</td>
					<td>
										<div id="eventtime" class="col-md-12">
					<input type="text" name="eventtime" placeholder="Event Timing" style="color: #000000"> </div> </td></tr>


			<tr > 
					<tr>
					<td style="color: #000000"> Venue</td>
					<td>
										<div id="eventtime" class="col-md-12">
					<input type="text" name="venue" placeholder="venue" style="color: #000000"> </div> </td></tr>
						<tr>
		<td class="col" style="color: #000000">Staff Name:</td>
			<td>

 <select name="staff" style="color: #000000" onchange="getUserInfo(this.value)" > 
	<!-- <select name="goods_id" > -->
	<option><strong>--SELECT--</strong></option> 

<?php $a = array() ;
//	  $a['U_name'] = '';
	  	 

$goods_query=mysql_query("select * from staff") or die(mysql_error());
                                while($fetch_goods_id=mysql_fetch_array($goods_query))
                                {
                                  echo '<option value="'.$fetch_goods_id['name'].'">';;
                                    echo $fetch_goods_id['name'].'<br/>'; 
                                    echo ' </option>';
									if(isset($_POST['name']) && $_POST['name']==$fetch_goods_id['name']){
									  $a = $fetch_goods_id;
									  
									
									}
								}

?> 

</select>


</td>
	</tr>

<tr> <td>
				</br>	
				<input type="submit" name="submit" value="Add" id="submit" style="color: #000000" />
 </td><tr>
					
<div align="center">
	<center >
	<table width="900" border="2" cellpadding="2" cellspacing="2" class="displaycontent" style="border:10px solid lightblue;" align="center" >
	<tr>
	    <th bgcolor=lightblue><font color=white size=2>Sno</font></th>
		<th bgcolor=lightblue><font color=white size=2>Event Name</font></th>
		<th bgcolor=lightblue><font color=white size=2>Category</font></td>
		<th bgcolor=lightblue><font color=white size=2>Event Date</font></td>
				<th bgcolor=lightblue><font color=white size=2>Timing</font></td>
								<th bgcolor=lightblue><font color=white size=2>venue</font></td>
																<th bgcolor=lightblue><font color=white size=2>Staff</font></td>
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
		<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['category'];?>" name="up_category" class="required" /></font></td>
				<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['edate'];?>" name="up_edate" class="required" /></font></td>
				<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['eventtime'];?>" name="up_eventtime" class="required" /></font></td>
		<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['venue'];?>" name="up_venue" class="required" /></font></td>
				<td ><font color=#000000 size=2><input type="text" value="<?php echo $cat['staff'];?>" name="up_staff" class="required" /></font></td>
		<td bgcolor=white><font color=#000000 size=2><a href="?stat=<?php echo $cat['id'];?>"><?php echo $cat['status']; ?></a></font></td>		
		<td><font color=#000000 size=2><input type="hidden" value="<?php echo $id; ?>"  name="id"/>
		<input type="submit" value="update" /></font></td>
		<td><font color=#000000 size=2><input type="button" value="cancel" onClick="window.location.href='addevent.php';"/></font></td>
		<td><input type="submit" value="delete" name="delete"/></td>
	</tr>
	<?php }else{	?>
	<tr>
		<td bgcolor=white><font color=#000000 size=2><?php echo $i++; ?></font></td>	
		<td bgcolor=white><font color=#000000 size=2><?php echo $cat['name']; ?></font></td>
		<td bgcolor=white><font color=#000000 size=2><?php echo $cat['category']; ?></font></td>		
		<td bgcolor=white><font color=#000000 size=2><?php echo $cat['edate']; ?></font></td>	
				<td bgcolor=white><font color=#000000 size=2><?php echo $cat['eventtime']; ?></font></td>	
								<td bgcolor=white><font color=#000000 size=2><?php echo $cat['venue']; ?></font></td>	
																<td bgcolor=white><font color=#000000 size=2><?php echo $cat['staff']; ?></font></td>	
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
