<?PHP

$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "phpGuru1!";
$database = "sec";

$db = @mysql_connect($dbserver, $dbuser, $dbpassword);
		if(!$db) { die('Could not connect');}
		
		$query = "SET NAMES utf8";
		
		mysql_query($query);
		
		@mysql_select_db($database, $db) or die ('ΠΡΟΒΛΗΜΑ ΜΕ ΤΗ ΒΑΣΗ');
		
	
		?>