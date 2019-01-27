var request = require('request');
var express = require("express");
var app = express ();
var example = require('./example')
var mongoose = require("mongoose")
var response

mongoose.connect("mongodb://deltahacks:deltahacks1@ds213755.mlab.com:13755/deltahacks",  { useNewUrlParser: true });

app.get("/", function(req, res){
    res.send("hello");
    res.render("./example.js")
})

app.listen(3000, function(req, res){
    console.log("server has started!");
})



