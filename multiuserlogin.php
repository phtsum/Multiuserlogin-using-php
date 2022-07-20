<!DOCTYPE html>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="multiuserlogin";
$conn=mysqli_connect($servername,$username,$password,$dbname);
echo " ";
if (isset($_POST['Login'])) {
 // code...
	$user=$_POST['user'];
	$password=$_POST['password'];
	$usertype=$_POST['usertype'];
	$query="SELECT * FROM `multi_user_login` WHERE username='".$username."' and password='".$password."' and usertype='".$usertype."'";
	$result=mysqli_query($conn, $query);
	if ($result) {
		// code...
		while ($row=mysqli_fetch_array($result)) {
			// code...
			echo '<script type="text/javascript"> alert("you are logged succcesfully and you are logged in as '.$row['usertype'].'")</script>';
		}
		if (mysqli_num_rows($result)>0) {
			?>
			// code...
			<script type="text/javascript" >window.location.href="admin.php"</script>
			<?php
		}else{
			?>
			<script type="text/javascript" >window.location.href="user.php"</script>
			<?php
		}
		}else{
			echo 'no result';
	}


}



?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>multi user login</title>
	<link rel="stylesheet" type="text/css" href="style ">
</head>
<body>
	<div class="theform">
	<form method="POST">
		<table>
		<tr>
			<td>username:<input type="text" name="username" placeholder="enter your username"></td>
		</tr>
        <tr>
        	<td>password:<input type="password" name="password" placeholder="enter your password"></td>
        </tr>
        <tr>
        	<td>select your user type <select name="select user type">
        		<option>admin</option>
        		<option>user</option>
        	</select></td>
        </tr>
        <tr>
        	<td><input type="submit" name="Login"></td>
        </tr>
        </table>
	</form>
</div>
</body>
</html>