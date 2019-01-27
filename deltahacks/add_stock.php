<?php 

session_start();

include "db.php";

if(isset($_POST['ticker']) && isset($_POST['user_id'])) {
	$ticker = mysqli_real_escape_string($connection, $_POST['ticker']);
	$user_id = (int)mysqli_real_escape_string($connection, $_POST['user_id']);

// get portfolio
	$portfolio_query = "SELECT portfolio_id FROM Portfolio WHERE user_id = $user_id";

	$result = mysqli_query($connection, $portfolio_query);

	if(!$result) {
	die("failed " . mysqli_error($result));
	}

	$row = mysqli_fetch_assoc($result);

	$portfolio_id = $row['portfolio_id'];

//get stock
	$stock_query = "SELECT stock_id FROM Stock WHERE ticker = '$ticker'";

	$result = mysqli_query($connection, $stock_query);

	if(!$result) {
	die("failed " . mysqli_error($result));
	}

	$row = mysqli_fetch_assoc($result);

	$stock_id = $row['stock_id'];

// insert into portfolio holdings

	$buy_query = "INSERT INTO Portfolio_holdings(portfolio_id, stock_id) VALUES ($portfolio_id, $stock_id)";

	$result = mysqli_query($connection, $buy_query);

	if(!$result) {
	die("failed " . mysqli_error($result));
	}	

// get activity

	$activity_update = "UPDATE User_tracking SET activity = activity + 0.02 WHERE user_id = $user_id";

	$result = mysqli_query($connection, $activity_update);

	if(!$result) {
	die("failed " . mysqli_error($result));
	}	


	// get new random stock

	$select_new = "SELECT ticker FROM Stock ORDER BY Rand() LIMIT 1";

$result = mysqli_query($connection, $select_new);

if(!$result) {
die("failed " . mysqli_error($result));
}

$row = mysqli_fetch_assoc($result);

echo $stock_id = $row['ticker'];

} else if (isset($_POST['user_id'])) {
	$select_new = "SELECT ticker FROM Stock ORDER BY Rand() LIMIT 1";

$result = mysqli_query($connection, $select_new);

if(!$result) {
die("failed " . mysqli_error($result));
}

$row = mysqli_fetch_assoc($result);

echo $stock_id = $row['ticker'];
}




?>