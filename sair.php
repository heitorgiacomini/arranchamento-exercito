<?php
  session_start();    
  unset($_POST['']);
  $_POST = array();
  $_SESSION["status"] = "";
  $_SESSION["posto"] = "";
  $_SESSION["login"] = "";
  $_SESSION["user_id"] = "";
  session_destroy();
  echo "<meta http-equiv='refresh' content='0; url=index.php'>";
  exit();
?>