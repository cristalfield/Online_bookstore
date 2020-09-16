<script type="text/javascript">
function logout()
{
	var message=window.confirm("Are you sure?");
	if(message==true)
	{
		window.location='../Home/home.php';
	}
	else
	{
		window.location='../login/user.php';
	}
}
</script>
