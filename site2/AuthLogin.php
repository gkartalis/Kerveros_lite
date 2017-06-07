<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<style>
	div{
		border: 3px solid black;
		margin:   0px;
		padding:  10px;
		position: absolute;
		top:      0px;
		left:     50%;
		-ms-transform: translate(-50%, -00%);
		transform: translate(-50%, -00%);
		background-color:#99ccff;
	}
</style>

</head>
<body>
<?php include("dbcon.php");
			?>

	<div>
		<form action="Authorize.php" name="myForm" method="POST">
			<table>
				<tr><td>login: </td><td><input type="text" value="" id="login"  name="login" /></td></tr>
				<tr><td>passwd: </td><td><input type="password" value="" id="passwd" name="passwd" /></td></tr>
				<tr><td colspan="2" style="text-align:center" ><input type="submit" value="Σύνδεση" id="submit" name="submit" /></td></tr>
			</table>
			<input type="hidden" name="TimeOutTime" />

	</form>
	<script>
		setInterval('ShowClock();',1000);
		document.myForm.TimeOutTime.value=10;

		function ShowClock()
		{ //return;
			if (document.myForm.TimeOutTime.value == 0)
				location.href="http://localhost/Kerveros/site1/timedout.html";
			else
				document.myForm.TimeOutTime.value = document.myForm.TimeOutTime.value-1;
	            document.getElementById('showClock').value = document.myForm.TimeOutTime.value;
		}
	</script>
	</div>
</body>
</html>
