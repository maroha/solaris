<?php
// It is important for any file that includes this file, to have
// check_login_status.php included at its very top.
include_once("php_includes/check_login_status.php");
$envelope = '<img src="images/note_dead.jpg" width="22" height="12" alt="Notes" title="This envelope is for logged in members">';
$loginLink = '<a href="login.php">Log In</a> &nbsp; | &nbsp; <a href="signup.php">Sign Up</a>';
if($user_ok == true) {
	$sql = "SELECT notescheck FROM users WHERE username='$log_username' LIMIT 1";
	$query = mysqli_query($db_conx, $sql);
	$row = mysqli_fetch_row($query);
	$notescheck = $row[0];
	$sql = "SELECT id FROM notifications WHERE username='$log_username' AND date_time > '$notescheck' LIMIT 1";
	$query = mysqli_query($db_conx, $sql);
	$numrows = mysqli_num_rows($query);
    if ($numrows == 0) {
		$envelope = '<a href="notifications.php" title="Your notifications and friend requests"><img src="images/note_still.jpg" width="22" height="12" alt="Notes"></a>';
    } else {
		$envelope = '<a href="notifications.php" title="You have new notifications"><img src="images/set1envelope.gif" width="22" height="12" alt="Notes"></a>';
	}
    $loginLink = '<a href="user.php?u='.$log_username.'">'.$log_username.'</a> &nbsp; | &nbsp; <a href="logout.php">Log Out</a>';
}
?>

<div id="pageTop">
  <div id="pageTopWrap">
    <div id="pageTopLogo">
      <a href="http://www.webintersect.com">
        <img src="images/logo.png" alt="logo" height="90" title="Web Intersect 2.0">
      </a>
    </div>
    <div id="pageTopRest">
      <div id="menu1">
        <div>
          <!--  <a href="#">Sign Up / Log In</a>-->
          <?php echo $envelope; ?> &nbsp; &nbsp; <?php echo $loginLink; ?>
        </div>
      </div>
      <div id="menu2">
        <div>
          <a href="http://www.webintersect.com">
            <img src="images/home.png" alt="home" height="32" title="Home">
          </a>
          <a href="#">Menu_Item_1</a>
          <a href="#">Menu_Item_2</a>
        </div>
      </div>
    </div>
  </div>
</div>