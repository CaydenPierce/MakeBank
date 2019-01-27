<?php 

session_start();

$_SESSION['user_id'] = 0;

include "db.php";

?>


<?php 
	
	$csvFile = file('stock_info1');
    $data = [];
    $first = 1;

    foreach ($csvFile as $line) {
    	// if($first == 1) {
    	// 	$first++;
    	// 	continue;
    	// }
        $data[] = str_getcsv($line);
    }

    //echo var_dump($data[1]);

foreach ($data as &$row) {
	$ticker = $row[2];
	$debt = floatval($row[9]);
	$beta = floatval($row[7]);
	$roe = floatval($row[8]);
	$cash = floatval($row[6]);
	$sector = $row[11];

	$stock_query = "INSERT INTO Stock(ticker, debt, beta, return_on_equity, free_cash, sector) VALUES ('$ticker', $debt, $beta, $roe, $cash, '$sector')";

	$stock_result = mysqli_query($connection, $stock_query);

	  if(!$stock_result) {
	    die("failed " . mysqli_error($stock_result));
	  }
}



?>