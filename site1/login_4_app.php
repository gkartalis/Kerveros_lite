<?php
    include ("dbcon.php");
    $var = $_GET['AuthCode'];

    print_r($var);

    $query = "SELECT * FROM `Authentication` WHERE AuthCode = '$var' ";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    if( ( $row['AuthCode'] !== '0' ) && ( $row['keyStatus'] == '1')){
      @session_start();
      
      $_SESSION['login'] = $row['login'];
      $_SESSION['AuthCode'] = $row['AuthCode'];
      $_SESSION['fname'] = $row['fname'];
      $_SESSION['lname'] = $row['lname'];
      $_SESSION['ams'] = $row['ams'];
      $_SESSION['keyStatus'] = $row['keyStatus'];
      $_SESSION['AUTH'] = TRUE;

      $query = " UPDATE `Authentication` SET keyStatus = '0' WHERE AuthCode = '$var' ";
      $result = mysql_query($query);

      header('Location: http://localhost/Kerveros/site1/main_4_app.php');
    }

?>
