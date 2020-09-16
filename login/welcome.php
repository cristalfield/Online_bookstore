<?php
	include('session.php');
	echo "welcome ";
	echo $_SESSION['user'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>logout</title>
</head>
<body>
<form method="post">
	<a href="logout.php"> logout</a>
</form>
</body>
</html>