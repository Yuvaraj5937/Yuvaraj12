<?php
error_reporting(0);
session_start();
include('config/config.php');
include_once('phpmailer/class.smtp.php');
include_once('phpmailer/class.pop3.php');
include_once('email.class.inc.php');

// Database connection
$con = mysqli_connect('localhost', 'root', '', 'event');
if (!$con) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Fetch order details
if (isset($_GET['select'])) {
    $id = mysqli_real_escape_string($con, $_GET['select']);
    $query = "SELECT * FROM applyod WHERE id='$id'";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Invalid ID or No Record Found.");
    }
}

include('staffheader.php');
?>

<link href="jsDatePick_ltr.min.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
window.onload = function() {
    new JsDatePick({
        useMode: 2,
        target: "Adate",
        dateFormat: "%d-%M-%Y",
        yearsRange: [1984, 1996],
        limitToToday: false,
        weekStartDay: 1
    });
};
</script>

<div class="content">
    <div class="content_resize">
        <form action="" name="Orderupdate_form" id="Orderupdate_form" method="post">
            <h2 align="center">Update Status</h2>
            <table border="0" cellspacing="4" cellpadding="4" bgcolor="Orange" class="displaycontent" width="500" height="350">
                <tr>
                    <td class="col"><b>ID:</b></td>
                    <td><input type="text" name="Iid" value="<?php echo $row['id']; ?>" readonly /></td>
                </tr>
                <tr>
                    <td class="col"><b>Mail:</b></td>
                    <td><input type="text" name="mail_id" value="<?php echo $row['mail_id']; ?>" readonly /></td>
                </tr>
                <tr>
                    <td class="col"><b>Status:</b></td>
                    <td><input type="text" name="Iname" value="" required /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="register" value="Update" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if (isset($_POST['register'])) {
    $status = mysqli_real_escape_string($con, $_POST['Iname']);
    $id = mysqli_real_escape_string($con, $_POST['Iid']);

    // Fetch email details
    $query3 = "SELECT mail_id, Eventname, ODdate FROM applyod WHERE id='$id'";
    $result3 = mysqli_query($con, $query3);
    if ($result3 && mysqli_num_rows($result3) > 0) {
        $student = mysqli_fetch_assoc($result3);
        $student_email = $student['mail_id'];
        $eventname = $student['Eventname'];
        $oddate = $student['ODdate'];
    } else {
        die("Error fetching student details.");
    }

    // Update status
    $query = "UPDATE applyod SET Status='$status' WHERE id='$id'";
    if (mysqli_query($con, $query)) {
        echo 'UPDATED SUCCESSFULLY';

        // Send email if status is "Done"
        if (strtolower($status) == "done") {
            $email = new Email();
            $email->set_from($configVars['my_email']);
            $email->set_from_name("Admin - OD Approval");
            $email->set_subject("Your OD Request is Approved");
            $email->set_message("Dear Student,<br>Your OD request for <b>$eventname</b> on <b>$oddate</b> has been approved.<br><br>Thank you!");

            $email->add_to($student_email);
            $sent_flag = $email->send();

            if ($sent_flag) {
                echo "<br>Email sent successfully!";
            } else {
                echo "<br>Email failed to send!";
            }
        }
    } else {
        echo 'UPDATE FAILED: ' . mysqli_error($con);
    }

    header("location: Viewod.php");
    exit();
}

mysqli_close($con);
include('footer.php');
?>
