<?php
error_reporting(0);
session_start();
include('config/config.php');
include_once('phpmailer/class.smtp.php');
include_once('phpmailer/class.pop3.php');
include_once('email.class.inc.php');

if (isset($_GET['select'])) {
    $query2 = "SELECT * FROM event WHERE id='" . mysql_real_escape_string($_GET['select']) . "'";
    $result = mysql_query($query2);
    if (mysql_num_rows($result)) {
        $row = mysql_fetch_assoc($result);
    }
}

include('Userheader.php');
?>

<div align="center">
<script type="text/javascript">	
  $(document).ready(function(){
    $("#Allocatetomanager").validate();
  });
</script>
<div class="content">
    <div class="content_resize">
<form action="eventupdate.php" name="eventupdate_form" id="eventupdate_form" method="post">
<br>
<div align="center">
<h2> Booking/Subscribing Details: </h2>
<table border="0" cellspacing="4" cellspadding="4" bgcolor="Orange" class="displaycontent" width="500" height="350">
    <tr>
        <td class="col"><b>ID:</b></td>
        <td><input type="text" name="CEmail" value="<?php echo $row['id']; ?>" class="required email" readonly /></td>
    </tr>
    <tr>
        <td class="col"><b>Name:</b></td>
        <td><input type="text" name="Routetxt" value="<?php echo $row['name']; ?>" class="required" /></td>
    </tr>
    <tr>
        <td class="col"><b>Category:</b></td>
        <td><input type="text" name="sub" value="<?php echo $row['category']; ?>" class="required" /></td>
    </tr>
    <tr>
        <td class="col"><b>Event Date:</b></td>
        <td><input type="text" name="Userid" value="<?php echo $row['edate']; ?>" class="required" /></td>
    </tr>
    <tr>
        <td class="col"><b>Event Time:</b></td>
        <td><input type="text" name="Managername" value="<?php echo $row['eventtime']; ?>" class="required" /></td>
    </tr>
    <tr>
        <td class="col"><b>From Date:</b></td>
        <td><input type="text" name="Pdate" value="<?php echo date('d/m/Y'); ?>" id="Pdate" class="required" /></td>
    </tr>
    <tr>
        <td class="col"><b>Others:</b></td>
        <td><input type="text" name="others" value="" id="others" class="required" /></td>
    </tr>
    <tr>
        <td class="col"><b>User Mail:</b></td>
        <td><input type="text" name="uname" class="form-control" id="uname" placeholder="User-mail" value="" /></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
            <input type="submit" name="register" value="Register" />
            <input type="reset" value="Reset" />
        </td>
    </tr>
</table>
</form>
</div>
</div>
</div>

<?php
if (isset($_POST['register'])) {
    $id = mysql_real_escape_string($_POST['CEmail']);
    $name = mysql_real_escape_string($_POST['Routetxt']);
    $category = mysql_real_escape_string($_POST['sub']);
    $event_date = mysql_real_escape_string($_POST['Userid']);
    $event_time = mysql_real_escape_string($_POST['Managername']);
    $from_date = mysql_real_escape_string($_POST['Pdate']);
    $others = mysql_real_escape_string($_POST['others']);
    $uname = mysql_real_escape_string($_POST['uname']);

    $query = "INSERT INTO booking VALUES (null, '$id', '$name', '$category', '$event_time', '$event_date', '$from_date', '$others', '$uname')";
    
    if (mysql_query($query)) {
        echo '<script>alert("REGISTERED SUCCESSFULLY");</script>';
        
        // Send Email
        $email = new Email();
        $email->set_from("admin@example.com");
        $email->set_from_name("Event Registration Admin");
        $email->set_subject("Event Booking Confirmation");
        $email->set_message("Dear $uname,<br>Your booking for the event <b>$name</b> on <b>$event_date</b> at <b>$event_time</b> has been Registered successfully.<br>Thank you!");
        
        $email->add_to($uname); // Assuming uname is the email
        $sent_flag = $email->send();

        if ($sent_flag) {
            echo "<script>alert('Email sent successfully!');</script>";
        } else {
            echo "<script>alert('Email failed to send!');</script>";
        }

        echo "<script>window.location.href='Viewbookings.php';</script>";
        exit();
    } else {
        echo '<script>alert("NOT REGISTERED");</script>';
    }
}
include('footer.php');
?>
