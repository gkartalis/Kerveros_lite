<!-- -Elegxos IP site2

- Enhmerwsh B.d. authentication (pinakas ){ IP, key , fname, lname , ams, ... keyStatus=1}

-apantaei "ola kala" pros site2 -->

<?php

  if(isset($_SERVER['HTTP_REFERER'])) {

    $ref = $_SERVER['HTTP_REFERER'];

    if( $ref != "http://localhost/Kerveros/site2/Authorize.php"){
      header('Location: http://localhost/Kerveros/site1/AccessDenied.html');
    }
  }


  include("dbcon.php");
  if(isset($_POST) && !empty($_POST)){
    if($_SERVER['REMOTE_ADDR'] == $_POST["ip"]){
      $query = " INSERT INTO Authentication (IP, AuthCode, fname, lname, ams, keyStatus, login)
      VALUES ('".$_POST['ip']."', '".$_POST['AuthCode']."', '".$_POST['fname']."',
      '".$_POST['lname']."','".$_POST['ams']."', '".$_POST['keyStatus']."', '".$_POST['login']."')";
      mysql_query($query) or die("Something went WRONG!");
      echo "ola kala";
    }
    }





    ?>
