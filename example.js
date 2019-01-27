var request = require('request');
var express = require("express");
var app = express ();

request({url: 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=MSFT&outputsize=compact&apikey=W0D2OJRNWGDETLUS', json: true}, function(err, res, content) {
  		if (err) {
    		throw err;
  		}
  		console.log(content["Time Series (Daily)"]['2019-01-25']['1. open']);
  		//console.log(content["Time Series (Daily)"]['2019-01-25']['1. open']); //same, today's DATE, same
  	
	});