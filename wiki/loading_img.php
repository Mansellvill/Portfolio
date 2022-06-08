<?php
  require("connect_db.php");
  $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
  foreach ($blacklist as $item)
    if(preg_match("/$item\$/i", $_FILES['somename']['name'])) exit;
  $type = $_FILES['somename']['type'];
  $size = $_FILES['somename']['size'];
  if (($type != "image/jpg") && ($type != "image/jpeg")  && ($type != "image/png")) exit;
  if ($size > 1024000) exit;
  $uploadfile = "images/users/".$_FILES['somename']['name'];
  $res = mysqli_query($connect, "UPDATE `users` SET `user_img` = \"".mysqli_real_escape_string($connect, $uploadfile)."\" WHERE users.user_id=".$_SESSION['log_user']['user_id']);
  move_uploaded_file($_FILES['somename']['tmp_name'], $uploadfile);
  header('Location: /profil.php?id='.$_SESSION['log_user']['user_id']);
  
  
?>
