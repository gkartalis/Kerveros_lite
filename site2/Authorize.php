<?php

	include("dbcon.php");

	// elegxos referer
	if(isset($_SERVER['HTTP_REFERER'])) {

	  $ref = $_SERVER['HTTP_REFERER'];

		if( $ref != "http://localhost/Kerveros/site2/AuthLogin.php"){
			header('Location: http://localhost/Kerveros/site1/AccessDenied.html');
		}
	}

		// Dhmiourgia kleidiou

		$ip = $_SERVER['REMOTE_ADDR'];
		$timestamp = time();
		$var = md5($ip . $timestamp);
		$KeyUsed = '0';

		$query2 = " INSERT INTO page_authorization_log (IP, timestamp, AuthCode, KeyUsed) VALUES ('".$ip."', '".$timestamp."', '".$var."','".$KeyUsed."')";
		$result2 = mysql_query($query2);


		$query = "SELECT * FROM `page_authorization_log` WHERE `AuthCode` = '".$var."'";
		$result = mysql_query($query);
		if (!$result) {
	    die('Invalid query: ' . mysql_error());
		}
		$row = mysql_fetch_array($result);

		// elegxos an exei ksanaxrisimopoihthei
		if( ($row['AuthCode'] !== '0') && ($row['KeyUsed']=='0')){
				$query = "UPDATE page_authorization_log SET KeyUsed = '1' WHERE AuthCode = '".$var."'";
				mysql_query($query);
		}else{
			die;
		}
		if(isset($_POST['login']) && isset($_POST['passwd'])){

			$login  = mysql_real_escape_string($_POST['login']);
			$passwd = mysql_real_escape_string($_POST['passwd']);

			$query = " SELECT * FROM `sec_attack` WHERE `login` = '$login' AND `passwd`='$passwd' ;";

			$result = mysql_query($query);
			$row = mysql_fetch_array($result);


		// $query = " SELECT * FROM `services` WHERE `id` = '100' ";
		// $result = $mysql_query($query);
		// if (!$result) {
	  //   die('Invalid query: ' . mysql_error());
		// }
		// $row = mysql_fetch_array($result);
		//
		// $url = $row['AuthUrl'];

		function post_data($url, $post_data){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_POST, 1);
			curl_setopt ($ch, CURLOPT_POSTFIELDS, $post_data);
		 	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
			$content = curl_exec ($ch);
			curl_close($ch);
			return $content;
		}


		$res = post_data( 'http://localhost/Kerveros/site1/Author.php',  array (
			"ip" => $_SERVER['REMOTE_ADDR'],
			"login" => $row['login'],
			"fname" => $row['fname'],
			"lname" => $row['lname'],
			"ams"		=> $row['ams'],
			"AuthCode" => md5($ip . $timestamp),
			"keyStatus" => 1
		));

			if($res = "ola kala"){
					$query = " INSERT INTO service_authorization_log (IP, login, fname, lname, ams, AuthCode, keyStatus)
					VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$row['login']."', '".$row['fname']."','".$row['lname']."', '".$row['ams']."', '".md5($ip . $timestamp)."', 1)";
					mysql_query($query) or die ("something went wrong");

					header("Location: http://localhost/Kerveros/site1/login_4_app.php?AuthCode=$var");
			}


}
?>
