var express = require("express");
var app = express ();
var mongoose = require("mongoose")
mongoose.connect("mongodb://deltahacks:deltahacks1@ds213755.mlab.com:13755/deltahacks",  { useNewUrlParser: true });

app.get("/", function(req, res){
    res.send("hello");
})

app.listen(3000, function(req, res){
    console.log("server has started!");
})