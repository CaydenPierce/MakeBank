var express = require("express");
var app = express ();
var mongoose = require("mongoose");
var User = require("./models/userModel");
var Portfolio = require("./models/portfolioModel");
var Stock = require("./models/stockModel")
mongoose.connect("mongodb://deltahacks:deltahacks1@ds213755.mlab.com:13755/deltahacks",  { useNewUrlParser: true });
app.set("view engine", "ejs")

User.create({name: "stephen"})
User.create({name: "maher"})
var user1 = User.find({name: "stephen"})
var user2 = User.find({name: "maher"})
app.get("/", function(req, res){
    res.render("./index.ejs", {user1: user1, user2: user2})
    console.log(user1)
    console.log(user2)
})

app.listen(3000, function(req, res){
    console.log("server has started!");
})