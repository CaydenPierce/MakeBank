<?php 

session_start();

include "db.php";

?>

<!DOCTYPE html>
<head>
    <title>Invested Stocks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Rubik:300,300i,400,500,700');
    </style>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php"><img src="img/logo.svg" alt="logo" height="56" width="56" class="logo"></a>
                <h1 class="display-4">Financial Advertising Portal</h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto ml-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="index.php">Stocks<span class="sr-only">(current)</span></a>
                     </li>
					 <li class="nav-item active">
                		<a class="nav-link" href="stocks.php">Portfolio</a>
             		 </li>
                     <li class="nav-item">
                        <a class="nav-link" href="articles.php">Articles</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="meetings.html">Meetings</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link disabled" href="#">Log Out</a> 
                     </li>
                  </ul>
                  
               </div>
            </nav>
    <div class="stock-div">
		<div class="container-pos">
		<h2 class="stock-header">Stocks You've Invested In</h2>
        <h4 class="pos-4">Technology</h4>

        <?php 

        $get_stocks = "SELECT DISTINCT ticker FROM Stock INNER JOIN Portfolio_holdings on Stock.stock_id = Portfolio_holdings.stock_id INNER JOIN Portfolio on Portfolio.portfolio_id = Portfolio_holdings.portfolio_id WHERE user_id = Portfolio.user_id AND sector = 'technology'";


            $result = mysqli_query($connection, $get_stocks);

            if(!$result) {
            die("failed " . mysqli_error($result));
            }

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<a href=# class='stock-anchors'>";
            echo $row['ticker'];
            echo "</a><br>";
          }

        ?>

        <h4 class="pos-4">Services</h4>

        <?php 

        $get_stocks = "SELECT DISTINCT ticker FROM Stock INNER JOIN Portfolio_holdings on Stock.stock_id = Portfolio_holdings.stock_id INNER JOIN Portfolio on Portfolio.portfolio_id = Portfolio_holdings.portfolio_id WHERE user_id = Portfolio.user_id AND sector = 'services'";


            $result = mysqli_query($connection, $get_stocks);

            if(!$result) {
            die("failed " . mysqli_error($result));
            }

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<a href=# class='stock-anchors'>";
            echo $row['ticker'];
            echo "</a><br>";
          }

        ?>


        <h4 class="pos-4">Finance</h4>

    <?php
        $get_stocks = "SELECT DISTINCT ticker FROM Stock INNER JOIN Portfolio_holdings on Stock.stock_id = Portfolio_holdings.stock_id INNER JOIN Portfolio on Portfolio.portfolio_id = Portfolio_holdings.portfolio_id WHERE user_id = Portfolio.user_id AND sector = 'Financial'";


            $result = mysqli_query($connection, $get_stocks);

            if(!$result) {
            die("failed " . mysqli_error($result));
            }

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<a href=# class='stock-anchors'>";
            echo $row['ticker'];
            echo "</a><br>";
          }

        ?>

        <h4 class="pos-4">Healthcare</h4>

    <?php
        $get_stocks = "SELECT DISTINCT ticker FROM Stock INNER JOIN Portfolio_holdings on Stock.stock_id = Portfolio_holdings.stock_id INNER JOIN Portfolio on Portfolio.portfolio_id = Portfolio_holdings.portfolio_id WHERE user_id = Portfolio.user_id AND sector = 'Healthcare'";


            $result = mysqli_query($connection, $get_stocks);

            if(!$result) {
            die("failed " . mysqli_error($result));
            }

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<a href=# class='stock-anchors'>";
            echo $row['ticker'];
            echo "</a><br>";
          }

        ?>



        <h4 class="pos-4">Basic Materials</h4>

        <?php
        $get_stocks = "SELECT DISTINCT ticker FROM Stock INNER JOIN Portfolio_holdings on Stock.stock_id = Portfolio_holdings.stock_id INNER JOIN Portfolio on Portfolio.portfolio_id = Portfolio_holdings.portfolio_id WHERE user_id = Portfolio.user_id AND sector = 'Basic Materials'";


            $result = mysqli_query($connection, $get_stocks);

            if(!$result) {
            die("failed " . mysqli_error($result));
            }

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<a href=# class='stock-anchors'>";
            echo $row['ticker'];
            echo "</a><br>";
          }

        ?>
        <!-- <h4 class="pos-4">Technology</h4>
        <a href="#" class="stock-anchors">ADBE - Adobe Systems Inc</a><br>
        <a href="#" class="stock-anchors">AMD - Advanced Micro Devices</a>

        <h4 class="pos-4">Energy</h4>


        <a href="#" class="stock-anchors">APA - Apache Corporation</a><br>
        <a href="#" class="stock-anchors">BHGE - Baker Hughes, a GE Company</a><br>
        <a href="#" class="stock-anchors">COG - Cabot Oil and Gas</a>
        <h4 class="pos-4">Finance</h4>
        <a href="#" class="stock-anchors">DFS - Discover Financial Services</a>
        <h4 class="pos-4">Manufacturing</h4>
        <a href="#" class="stock-anchors">HOG - Harley Davidson</a>
        <h4 class="pos-4">Agriculture</h4>
        <p class="pos-5"><em>No Stocks in Agriculture Sector</em></p> -->



		<br>
		<br>
		</div>
    </div>
	
	<div class="row fixed-bottom">
          <div class="text-center col-lg-6 offset-lg-3">
         &nbsp;
          </div>
       </div>
</body>