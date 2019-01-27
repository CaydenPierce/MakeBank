<?php 

session_start();

$_SESSION['user_id'] = 1;

include "db.php";

if(isset($_POST['hi'])) {
	echo "waaa";

	$art_id = (int)mysqli_real_escape_string($connection, $_POST['hi']);

	$article_seen = "UPDATE Articles SET seen = 1 WHERE article_id = $art_id";
  
    $article_seen_result = mysqli_query($connection, $article_seen);

	  if(!$article_seen_result) {
	    die("failed " . mysqli_error($result));
	  }

	  $user_id = $_SESSION['user_id'];

	 $user_learning = "UPDATE User_tracking SET learning = learning+0.05 WHERE user_id = $user_id";

	 $user_learning_result = mysqli_query($connection, $user_learning);


} else {
	echo "rrr";
}


?>
