<?php ob_start();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<title>Classifields</title>
	<link href="css/style.css" media="all" rel="stylesheet" type="text/css" >
	<script type="text/javascript" src="javascript/jquery-latest.js"></script>
	<script type="text/javascript" src="javascript/jquery.validate.js"></script>
	<script type="text/javascript" src="javascript/validate.js" ></script>


</head>
<body>
<div id="container">
	<div id="wrapper">
		<div id="header">
		<img src="images/logo.jpeg" height="120" width="240" border="0" />	
		<h1>Classified</h1>
		<a href="adds.php" class="add_post">Add You Post Here</a>
		<?php if(isLoggedIn()){ ?>
		<ul class="navigation">		
			<li><a href="index.php">Home</a></li>
			<li><a href="adds_list.php">Adds</a></li>
			<li><a href="myaccount.php">My Account</a></li>
			<li><a href="logout.php">Logout</a></li>
			<li><a href="contactus.php">Contact us</a></li>
		</ul>
		<?php }  else{
 		?>
		<ul class="navigation" >		
			<li><a href="index.php">Home</a></li>
			<li><a href="adds_list.php">Adds</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="contactus.php">Contact us</a></li>
		</ul>

		<?php } ?>
		</div>
		<div id="searchfields">
			<div class="formcontainer">
			<form action="adds_list.php" method="post">
			<select class="search_input  txt_btn" name="cat_id"  style="background:#FFFFFF;">
			<?php
				$query = "select * from category where status=0";
				$result = mysql_query($query) or die(mysql_error());
				while($row = mysql_fetch_assoc($result)){
					$category_list[$row['id']] = $row;
					if($row['id']== $_SESSION['cat_id']){$selected = 'selected="selected"';}else{$selected = '';}
					echo '<option '. $selected.' value="'.$row['id'].'">'.$row['category'].'</option>';
				}
			?>
			</select>
			<input type="text" name="keyword" class="search_input  txt_btn" value="<?php echo $keyword; ?>" />	
			<input type="submit" value="Submit"  class="search_input  sub_btn"/>
			</form>
			</div>
			
		</div>
		<div id="content">
