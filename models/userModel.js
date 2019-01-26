var mongoose = require("mongoose");

var userSchema = new mongoose.Schema({
    name: String,
    email: String,
    country: String,
    gender: String,
    age: Number,
    location: String,
    occupation: String
})

module.exports = mongoose.model("User", userSchema);