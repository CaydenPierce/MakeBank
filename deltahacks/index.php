<?php 

session_start();

$_SESSION['user_id'] = 1;

include "db.php";

?>

<!DOCTYPE html>
<head>
    <title>Personal Portfolio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Rubik:300,300i,400,500,500i,700');
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
                     <li class="nav-item active">
                        <a class="nav-link" href="index.php">Stocks<span class="sr-only">(current)</span></a>
                     </li>
					 <li class="nav-item">
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
    <div class="container first-section">
		<div class="row first-one">
			<img src="img/portrait.PNG" class="portrait" width="80" height="80" alt="portrait">
			<p class="user-name">Alexander Aatrovich</p>
		</div>
        <div class="row">
			
			<div class="col-4 rank">
				<div class="card lvl-card">
					<div class="group-wrap">
						<div id="progress-bar">
							<p class="lvl">Lv. 1&nbsp;&nbsp;</p> <p class="learning-title" style="display:inline">Beginner Investor</p>
							<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="70"
									aria-valuemin="0" aria-valuemax="100">
									<span class="sr-only">70% Complete</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
            <div class="col-8 invested">
                <div class="container pos-1">
                    <div class="row">
                        <!-- <div class="box">
                            <div class="stats-header">Amount Invested</div>	
                            <p class="color-num">$616.67</p>
                        </div>
                        <div class="box">
                            <div class="stats-header">Current Portfolio Value</div>
                            <p class="color-num">$727.87</p>
                        </div> -->
                        <div class="box">
                            <div class="stats-header">Gain/Loss</div>
                            <p class="color-sh">+<!-- $112.20 --></p>
                        </div>
                    </div>
                </div>
            </div>
			
        </div>
    </div>

<?

$stock_query = "SELECT ticker FROM Stock ORDER BY Rand() LIMIT 1";

$result = mysqli_query($connection, $stock_query);

if(!$result) {
die("failed " . mysqli_error($result));
}

$row = mysqli_fetch_assoc($result);

?>


    <div class="container" style="margin-bottom: 100px;">
        <div style="display:inline;">
        	<h2 id="ticker"><?php echo $row['ticker']; ?></h2>
            <img class="graph-image" id="stock_img" src="img/Illumina, Inc..png" alt="stock-chart" width="1000" height="500" style="margin-left: 65px">
        </div>
            <!-- <select>   
                <option value="AAPL">AAPL</option>
				<option value="AAPL">ABBA</option>
				<option value="AAPL">BBAB</option>
            </select> -->
            <div style="text-align: center">
                <div class="container pos-2">
                    <div class="row">
                        <div class="col" style="text-align: right">
                            <button id="buy-button">Buy</button>
                        </div>
                        <div class="col" style="text-align: left">
                            <button id="sell-button">Sell</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
	<div class="row fixed-bottom">
          <div class="text-center col-lg-6 offset-lg-3">
         &nbsp;
          </div>
       </div>
</body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.0.0.js"></script>

<script type="text/javascript">

	var user_id = <?php echo $_SESSION['user_id']; ?>

	var hi = 1

$("#buy-button").click(function(){

	var ticker = $("#ticker").html();

	console.log(ticker)

	var buy_data = {};
	buy_data.user_id = user_id;
	buy_data.ticker = ticker;

  $.ajax({
	url: 'add_stock.php',
	type: 'POST',
	data: buy_data,
	success: function(data) {
		console.log(data)
		var ticker = data;
		$("#ticker").html(ticker);
		if(hi == 1) {
			$("#stock_img").attr("src", "img/Hasbro, Inc..png");
			hi = 2;
		} else if(hi == 2){
			$("#stock_img").attr("src", "img/Verisign, Inc..png");
			hi = 3;
		} else {
			$("#stock_img").attr("src", "img/Marriott International, Inc..png");
			hi = 1;
		}

	}
});
});

$("#sell-button").click(function(){
	var sell_data = {};
	sell_data.user_id = user_id;

  $.ajax({
	url: 'add_stock.php',
	type: 'POST',
	data: sell_data,
	success: function(data) {
		var ticker = data;
		$("#ticker").html(ticker);
		if(hi == 1) {
			$("#stock_img").attr("src", "img/Hasbro, Inc..png");
			hi = 2;
		} else if(hi == 2){
			$("#stock_img").attr("src", "img/Verisign, Inc..png");
			hi = 3;
		} else {
			$("#stock_img").attr("src", "img/Marriott International, Inc..png");
			hi = 1;
		}
	}
});
});


</script>














