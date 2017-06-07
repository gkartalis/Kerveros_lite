<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome!</title>
    <style media="screen">
      input {
        background-color: yellow;
        }
      .container {

      }
    </style>
  </head>
  <body>
    <?php

        // elegxos REFERER
      if(isset($_SERVER['HTTP_REFERER'])) {

    	  $ref = $_SERVER['HTTP_REFERER'];

    		if( $ref != "http://localhost/Kerveros/site2/AuthLogin.php"){
    			header('Location: http://localhost/Kerveros/site1/AccessDenied.html');
    		}
    	}


      @session_start();
      if($_SESSION['AUTH'] == FALSE){
        header('Location: http://localhost/Kerveros/site1/AccessDenied.html');
      }

      $login = $_SESSION['login'];
      $AuthCode = $_SESSION['AuthCode'];
      $fname = $_SESSION['fname'];
      $lname = $_SESSION['lname'];
      $ams = $_SESSION['ams'];
      $keyStatus = $_SESSION['keyStatus'];
      $Auth = $_SESSION['AUTH'];
    ?>
    <h1>Welcome to the Application!</h1>

    <p>
      <?php echo "Eisai o ".$fname." ".$lname." me A.M. : ".$ams ; ?>
    </p>

    <form  name="XXX">
    	<input type="hidden" name="TimeOutTime" />
    </form>
      <div class="container">
        <label for="showClock">Timeout time left </label>
        <input type="text" id="showClock" maxlength="3" size="3" readonly />
      </div>
    <script>
    	setInterval('ShowClock();',1000);
    	document.XXX.TimeOutTime.value=20;

    	function ShowClock()
    	{ //return;
    		if (document.XXX.TimeOutTime.value == 0)
    			location.href="TimeOut.php";
    		else
    			document.XXX.TimeOutTime.value = document.XXX.TimeOutTime.value-1;
                document.getElementById('showClock').value = document.XXX.TimeOutTime.value;
    	}
    </script>

    <?php
          session_destroy();
          session_unset();
    ?>

  </body>
</html>
