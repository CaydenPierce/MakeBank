var mongoose = require("mongoose");

var stockSchema = new mongoose.Schema({
    peRatio: Number,
    psRatio: Number,
    debt: Number,
    beta: Number,
    roe: Number, 
    freeCashFlows: Number
})

module.exports = mongoose.model("Stock", stockSchema)